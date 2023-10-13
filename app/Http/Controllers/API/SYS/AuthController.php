<?php

namespace App\Http\Controllers\API\SYS;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\SYS\sys_roles_permisos;
use App\Models\SYS\sys_usuarios;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'generateResetToken', 'updatePassword']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | string',
            'password' => 'required | string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json([
                'error' => true,
                'mensaje' => 'Credenciales Inválidas',
            ], 401);
        } else if (auth()->user()->activo == 0) {
            return response()->json([
                'error' => true,
                'mensaje' => 'Usuario Inactivo',
            ], 401);
        }

        auth()->user()->ultimoLogin = Carbon::now();
        auth()->user()->save();

        $roleId = auth()->user()->id_rol;
        $permissions = sys_roles_permisos::where('id_rol', $roleId)->get();

        return response()->json([
            'error' => false,
            'mensaje' => 'Bienvenido al sistema',
            'data' => [
                'token' => $token,
                'tipoToken' => 'Bearer',
                'usuario' => auth()->user(),
                'permisos' => $permissions
            ]
        ], 200);
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function me()
    {
        return response()->json([
            'error' => false,
            'mensaje' => '',
            'data' => auth()->user()
        ], 200);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'error' => false,
            'mensaje' => 'Cierre de Sesión Exitoso'
        ], 200);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        auth()->invalidate();

        return response()->json([
            'error' => false,
            'mensaje' => 'Nuevo Token generado',
            'data' => [
                'token' => auth()->fromUser(auth()->user()),
                'tipoToken' => 'Bearer',
            ]
        ], 200);
    }

    /**
     * Generates a token to reset a user password and send an email
     * 
     * @param Request  $request
     * @return \Response
     */
    public function generateResetToken(Request $request)
    {
        $request->validate([
            'email' => 'required | string  | email'
        ]);

        $user = sys_usuarios::firstWhere('email', $request->email);

        if (empty($user)) {
            return response()->json([
                'error' => true,
                'mensaje' => 'Usuario inexistente'
            ], 404);
        }

        $token = md5($user->id_usuario . $user->email . time());

        Mail::to($user->email)->send(new ResetPasswordMail($token, 'Mail'));

        $user->tiempoTokenContraseña = date('H:i:s');
        $user->tokenCambiarContraseña = $token;
        $user->save();

        return response()->json([
            'error' => false,
            'mensaje' => 'Correo enviado'
        ], 200);
    }

    /**
     * Validates the token to reset Password and updates password
     * 
     * @param Request  $request
     * @return \Response
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required | string',
            'token' => 'required | string'
        ]);

        $user = sys_usuarios::firstWhere('tokenCambiarContraseña', $request->token);

        if (empty($user)) {
            return response()->json([
                'error' => true,
                'mensaje' => 'El tiempo ha expirado'
            ], 401);
        } else if (!empty($user->tiempoTokenContraseña) && !empty($user->tiempoTokenContraseña)) {
            if (Carbon::now()->diffInMinutes(Carbon::parse($user->tiempoTokenContraseña)) > 60) {
                return response()->json([
                    'error' => true,
                    'mensaje' => 'El tiempo ha expirado'
                ], 401);
            }
        }

        $user->password  = Hash::make($request->input('password'));
        $user->tokenCambiarContraseña = null;
        $user->tiempoTokenContraseña = null;
        $user->save();

        return response()->json([
            'error' => false,
            'mensaje' => 'Contraseña cambiada con éxito'
        ], 200);
    }
}
