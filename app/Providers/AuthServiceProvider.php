<?php

namespace App\Providers;

use App\Models\UserModel;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->viaRequest('api', function (Request $request) {
            if (!$request->header('Authorization')) {
                return null;
            }

            $authorization = $request->header('Authorization');
            $token = str_replace('Bearer ','',$authorization);
            $userData = JWT::decode($token, env('JWT_KEY'), ['HS256']);

            return UserModel::where('email', $userData->email)->first();
        });
    }
}
