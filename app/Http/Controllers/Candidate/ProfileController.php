<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProfileAddressRequest;
use App\Http\Requests\ProfilePasswordRequest;
use App\Http\Requests\ProfileImageRequest;
use App\Models\Address;
use App\Models\User;
use App\Models\ProfileCandidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        if (Auth::user()->id != $id) {
            abort(404);
        }

        $user = User::find(Auth::user()->id);

        if (isset($user->profileCandidate->birthday)) {
            $user->profileCandidate->birthday = format_date($user->profileCandidate->birthday);
        }

        if (isset($user->profileCandidate->cpf)) {
            $user->profileCandidate->cpf = format_cpf_cnpj($user->profileCandidate->cpf);
        }
        return view('panel.candidate.candidateHome', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        $id = Auth::user()->id;
        //cpf teste 353.008.720-32
        DB::beginTransaction();
        try {
            if (!$user = User::find($id)) {
                return redirect()
                    ->route('candidate.profile', $id);
            }

            $user_all = $request->only('name', 'username', 'email');

            if (!$user->update($user_all)) {
                return redirect()
                    ->route('candidate.profile', $id)
                    ->with('warning', 'Não foi possível editar os dados.[cód. 1]');
            };

            $profile = ProfileCandidate::where('users_id', $id)->first();

            if ($profile) {
                $profile_all = $request->only('cpf', 'phone', 'birthday');
                $profile_all['cpf'] = format_cpf_cnpj_db($profile_all['cpf']);

                if (isset($profile_all['birthday'])) {
                    $profile_all['birthday'] = format_date_db($profile_all['birthday']);
                }

                if (!$profile->update($profile_all)) {
                    DB::rollBack();
                    return redirect()
                        ->route('candidate.profile', $id)
                        ->with('warning', 'Não foi possível editar os dados.[cód. 2]');
                }
                DB::commit();
                return redirect()
                    ->route('candidate.profile', $id)
                    ->with('message', 'Dados editados com sucesso.');
            } else {
                $profile_all['users_id'] = $id;
                $profile_all['cpf'] = format_cpf_cnpj_db($request->cpf);
                $profile_all['birthday'] = format_date_db($request->birthday);
                $profile_all['phone'] = $request->phone;

                if (!ProfileCandidate::create($profile_all)) {
                    DB::rollBack();
                    return redirect()
                        ->route('candidate.profile', $id)
                        ->with('warning', 'Não foi possível editar os dados.[cód. 3]');
                }
                DB::commit();
                return redirect()
                    ->route('candidate.profile', $id)
                    ->with('message', 'Dados editados com sucesso.');
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()
                ->route('candidate.profile', $id)
                ->with('warning', 'Não foi possível editar os dados.[cód. 4]' . $e);
        }
    }

    public function updateAddress(ProfileAddressRequest $request)
    {
        $id = Auth::user()->id;
        //cep teste 71.909-540
        try {
            $address = Address::where('users_id', $id)->first();
            if ($address) {
                if (!$address->users_id = $id) {
                    return redirect()
                        ->route('candidate.profile', $id);
                }

                $address_all = $request->except('_token');

                if (!$address->update($address_all)) {
                    DB::rollBack();
                    return redirect()
                        ->route('candidate.profile', $id)
                        ->with('warning', 'Não foi possível editar os dados.[cód. 2]');
                }

                DB::commit();
                return redirect()
                    ->route('candidate.profile', $id)
                    ->with('message', 'Dados editados com sucesso.');
            } else {
                $address_all['users_id'] = $id;
                $address_all['zip_code'] = $request->zip_code;
                $address_all['address'] = $request->address;
                $address_all['number'] = $request->number;
                $address_all['complement'] = $request->complement;
                $address_all['neighborhood'] = $request->neighborhood;
                $address_all['city'] = $request->city;
                $address_all['state'] = $request->state;

                if (!Address::create($address_all)) {
                    DB::rollBack();
                    return redirect()
                        ->route('candidate.profile', $id)
                        ->with('warning', 'Não foi possível editar os dados.[cód. 3]');
                }
                DB::commit();
                return redirect()
                    ->route('candidate.profile', $id)
                    ->with('message', 'Dados editados com sucesso.');
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()
                ->route('candidate.profile', $id)
                ->with('warning', 'Não foi possível editar os dados.[cód. 4]' . $e);
        }
    }

    public function updateAbout(Request $request)
    {
        $id = Auth::user()->id;

        if (!$user = User::find($id)) {
            return redirect()
                ->route('candidate.profile', $id);
        }

        $profile = ProfileCandidate::where('users_id', $id)->first();
        $profile_all = $request->only('description');

        if (!$profile->update($profile_all)) {
            return redirect()
                ->route('candidate.profile', $id)
                ->with('warning', 'Não foi possível editar os dados.[cód. 1]');
        };

        return redirect()
            ->route('candidate.profile', $id)
            ->with('message', 'Dados editados com sucesso.');
    }

    public function updateImage(ProfileImageRequest $request)
    {
        $id = Auth::user()->id;
        $profile = ProfileCandidate::where('users_id', $id)->first();

        if (!$profile) {
            return redirect()
                ->route('candidate.profile', $id)
                ->with('warning', 'Por favor preencha seus dados pessoais para poder editar sua foto.');
        }

        if (isset($profile->image)) {
            $image_old = $profile->image;
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $filename = md5(rand(0, 99)) . '.' . $request->image->extension();

            if (!$request->file('image')->storeAs('profile/' . $id, $filename)) {
                return redirect()
                    ->route('candidate.profile', $id)
                    ->with('warning', 'Algo ocorreu e não foi possível atualizar a imagem. Tente novamente.[Cód. 1]');
            };

            $profile_image = ['image' => $filename];

            if (!$profile->update($profile_image)) {
                if (!$request->file('image')->storeAs('profile/' . $id, $filename)) {
                    return redirect()
                        ->route('candidate.profile', $id)
                        ->with('warning', 'Algo ocorreu e não foi possível atualizar a imagem. Tente novamente.[Cód. 2]');
                };
            }

            session(['image' => $filename]);

            if (isset($image_old)) {
                unlink('storage/profile/' . $id . '/' . $image_old);
            }

            return redirect()
                ->route('candidate.profile', $id)
                ->with('message', 'Imagem atualizada com sucesso.');
        }

        return redirect()
            ->route('candidate.profile', $id)
            ->with('warning', 'Por favor, selecione um arquivo válido');
    }

    public function updatePassword(ProfilePasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);

        if (!$request->password === $request->password_confirmation) {
            return redirect()
                ->route('candidate.profile', $user->id)
                ->with('warning', 'As senhas digitadas devem ser iguais.');
        };

        if ($user->update([
            'password' => Hash::make($request['password']),
        ])) {
            return redirect()
                ->route('candidate.profile', $user->id)
                ->with('message', 'Senha alterada com sucesso.');
        };
    }
}
