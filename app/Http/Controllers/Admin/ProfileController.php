<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilePasswordRequest;
use App\Http\Requests\ProfileImageRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Models\ProfileAdm;
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

        if (isset($user->profileAdm->birthday)) {
            $user->profileAdm->birthday = format_date($user->profileAdm->birthday);
        }

        if (isset($user->profileAdm->cpf)) {
            $user->profileAdm->cpf = format_cpf_cnpj($user->profileAdm->cpf);
        }
        return view('panel.admin.home', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        $id = Auth::user()->id;
        //cpf teste 353.008.720-32
        DB::beginTransaction();
        try {
            if (!$user = User::find($id)) {
                return redirect()
                    ->route('admin.profile', $id);
            }

            $user_all = $request->only('name', 'username', 'email');

            if (!$user->update($user_all)) {
                return redirect()
                    ->route('admin.profile', $id)
                    ->with('warning', 'Não foi possível editar os dados.[cód. 1]');
            };

            $profile = ProfileAdm::where('users_id', $id)->first();

            if ($profile) {
                $profile_all = $request->only('cpf', 'birthday', 'phone');
                $profile_all['cpf'] = format_cpf_cnpj_db($profile_all['cpf']);
                if ($profile_all['birthday']) {
                    $profile_all['birthday'] = format_date_db($profile_all['birthday']);
                }

                if (!$profile->update($profile_all)) {
                    DB::rollBack();
                    return redirect()
                        ->route('admin.profile', $id)
                        ->with('warning', 'Não foi possível editar os dados.[cód. 2]');
                }
                DB::commit();
                return redirect()
                    ->route('admin.profile', $id)
                    ->with('message', 'Dados editados com sucesso.');
            } else {
                $profile_all['users_id'] = $id;
                $profile_all['cpf'] = format_cpf_cnpj_db($request->cpf);
                $profile_all['birthday'] = format_date_db($request->birthday);
                $profile_all['phone'] = $request->phone;

                if (!ProfileAdm::create($profile_all)) {
                    DB::rollBack();
                    return redirect()
                        ->route('admin.profile', $id)
                        ->with('warning', 'Não foi possível editar os dados.[cód. 3]');
                }
                DB::commit();
                return redirect()
                    ->route('admin.profile', $id)
                    ->with('message', 'Dados editados com sucesso.');
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()
                ->route('admin.profile', $id)
                ->with('warning', 'Não foi possível editar os dados.[cód. 4]' . $e);
        }
    }

    public function updateImage(ProfileImageRequest $request)
    {
        $id = Auth::user()->id;
        $profile = ProfileAdm::where('users_id', $id)->first();

        if ($profile->image) {
            $image_old = $profile->image;
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $filename = md5(rand(0, 99)) . '.' . $request->image->extension();

            if (!$request->file('image')->storeAs('profile/' . $id, $filename)) {
                return redirect()
                    ->route('admin.profile', $id)
                    ->with('warning', 'Algo ocorreu e não foi possível atualizar a imagem. Tente novamente.[Cód. 1]');
            };

            $profile_image = ['image' => $filename];

            if (!$profile->update($profile_image)) {
                if (!$request->file('image')->storeAs('profile/' . $id, $filename)) {
                    return redirect()
                        ->route('admin.profile', $id)
                        ->with('warning', 'Algo ocorreu e não foi possível atualizar a imagem. Tente novamente.[Cód. 2]');
                };
            }

            session(['image' => $filename]);

            if (isset($image_old)) {
                unlink('storage/profile/' . $id . '/' . $image_old);
            }

            return redirect()
                ->route('admin.profile', $id)
                ->with('message', 'Imagem atualizada com sucesso.');
        } else {
            return redirect()
                ->route('admin.profile', $id)
                ->with('warning', 'Por favor, selecione um arquivo válido');
        }
    }

    public function updatePassword(ProfilePasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);

        if (!$request->password === $request->password_confirmation) {
            return redirect()
                ->route('admin.profile', $user->id)
                ->with('warning', 'As senhas digitadas devem ser iguais.');
        };

        if ($user->update([
            'password' => Hash::make($request['password']),
        ])) {
            return redirect()
                ->route('admin.profile', $user->id)
                ->with('message', 'Senha alterada com sucesso.');
        };
    }
}
