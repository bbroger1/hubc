<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileEmployerRequest;
use App\Http\Requests\ProfileEmployerAddressRequest;
use App\Http\Requests\ProfilePasswordRequest;
use App\Models\Address;
use App\Models\User;
use App\Models\ProfileEmployer;
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

        return view('panel.employer.employerHome', compact('user'));
    }

    public function update(ProfileEmployerRequest $request)
    {
        $id = Auth::user()->id;
        //cnpj teste 32.732.034/0001-67
        DB::beginTransaction();
        try {
            if (!$user = User::find($id)) {
                return redirect()
                    ->route('employer.profile', $id);
            }

            $user_all = $request->only('name', 'username', 'email', 'representative_name');

            if (!$user->update($user_all)) {
                return redirect()
                    ->route('employer.profile', $id)
                    ->with('warning', 'Não foi possível editar os dados.[cód. 1]');
            };

            $profile = ProfileEmployer::where('users_id', $id)->first();

            if ($profile) {
                $profile_all = $request->only('cnpj', 'phone');
                if (!$profile->update($profile_all)) {
                    DB::rollBack();
                    return redirect()
                        ->route('employer.profile', $id)
                        ->with('warning', 'Não foi possível editar os dados.[cód. 2]');
                }
                DB::commit();
                return redirect()
                    ->route('employer.profile', $id)
                    ->with('message', 'Dados editados com sucesso.');
            } else {
                $profile_all['users_id'] = $id;
                $profile_all['cnpj'] = $request->cnpj;
                $profile_all['phone'] = $request->phone;

                if (!ProfileEmployer::create($profile_all)) {
                    DB::rollBack();
                    return redirect()
                        ->route('employer.profile', $id)
                        ->with('warning', 'Não foi possível editar os dados.[cód. 3]');
                }
                DB::commit();
                return redirect()
                    ->route('employer.profile', $id)
                    ->with('message', 'Dados editados com sucesso.');
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()
                ->route('employer.profile', $id)
                ->with('warning', 'Não foi possível editar os dados.[cód. 4]' . $e);
        }
    }

    public function updateAddress(ProfileEmployerAddressRequest $request)
    {
        $id = Auth::user()->id;
        //cep teste 71.909-540
        try {
            $address = Address::where('users_id', $id)->first();
            if ($address) {
                if (!$address->users_id = $id) {
                    return redirect()
                        ->route('employer.profile', $id);
                }

                $address_all = $request->except('_token');

                if (!$address->update($address_all)) {
                    DB::rollBack();
                    return redirect()
                        ->route('employer.profile', $id)
                        ->with('warning', 'Não foi possível editar os dados.[cód. 2]');
                }

                DB::commit();
                return redirect()
                    ->route('employer.profile', $id)
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
                        ->route('employer.profile', $id)
                        ->with('warning', 'Não foi possível editar os dados.[cód. 3]');
                }
                DB::commit();
                return redirect()
                    ->route('employer.profile', $id)
                    ->with('message', 'Dados editados com sucesso.');
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()
                ->route('employer.profile', $id)
                ->with('warning', 'Não foi possível editar os dados.[cód. 4]' . $e);
        }
    }

    public function updateAbout(Request $request)
    {
        $id = Auth::user()->id;

        if (!$user = User::find($id)) {
            return redirect()
                ->route('employer.profile', $id);
        }

        $profile = ProfileEmployer::where('users_id', $id)->first();
        $profile_all = $request->only('description');

        if (!$profile->update($profile_all)) {
            return redirect()
                ->route('employer.profile', $id)
                ->with('warning', 'Não foi possível editar os dados.[cód. 1]');
        };

        return redirect()
            ->route('employer.profile', $id)
            ->with('message', 'Dados editados com sucesso.');
    }

    public function updateImage(Request $request)
    {
        $id = Auth::user()->id;
        $profile = ProfileEmployer::where('users_id', $id)->first();
        if ($profile->image) {
            $image_old = $profile->image;
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $ext = $request->image->extension();
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                return redirect()
                    ->route('employer.profile', $id)
                    ->with('warning', 'A extensão do arquivo deve ser JPG, JPEG ou PNG');
            }
            $filename = md5(rand(0, 99)) . '.' . $request->image->extension();

            if (!$request->file('image')->storeAs('profile/' . $id, $filename)) {
                return redirect()
                    ->route('employer.profile', $id)
                    ->with('warning', 'Algo ocorreu e não foi possível atualizar a imagem. Tente novamente.[Cód. 1]');
            };

            $profile_image = ['image' => $filename];

            if (!$profile->update($profile_image)) {
                if (!$request->file('image')->storeAs('profile/' . $id, $filename)) {
                    return redirect()
                        ->route('employer.profile', $id)
                        ->with('warning', 'Algo ocorreu e não foi possível atualizar a imagem. Tente novamente.[Cód. 2]');
                };
            }

            session(['image' => $filename]);

            if (isset($image_old)) {
                unlink('storage/profile/' . $id . '/' . $image_old);
            }

            return redirect()
                ->route('employer.profile', $id)
                ->with('message', 'Imagem atualizada com sucesso.');
        } else {
            return redirect()
                ->route('employer.profile', $id)
                ->with('warning', 'Por favor, selecione um arquivo válido');
        }
    }

    public function updatePassword(ProfilePasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);

        if (!$request->password === $request->password_confirmation) {
            return redirect()
                ->route('employer.profile', $user->id)
                ->with('warning', 'As senhas digitadas devem ser iguais.');
        };

        if ($user->update([
            'password' => Hash::make($request['password']),
        ])) {
            return redirect()
                ->route('employer.profile', $user->id)
                ->with('message', 'Senha alterada com sucesso.');
        };
    }
}
