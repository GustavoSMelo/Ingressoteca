<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use DomainException;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{
    public function generateToken(Request $request)
    {
        try {
            $password = $request->input('password');
            $email = $request->input('email');

            $user = UserModel::where('email', $email)->first();

            if (is_null($email) || !Hash::check($password, $user->password)) {
                return response()->json([
                    'Error to make login'
                ], 400);
            }

            $token = JWT::encode(['email' => $user->email], env('JWT_KEY'));

            return response($token);
        } catch (Exception $err) {
            return response('Error to make login', 400);
        }
    }
}
