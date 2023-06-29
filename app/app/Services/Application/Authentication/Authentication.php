<?php

namespace App\Services\Application\Authentication;
use Illuminate\Support\Facades\Auth;
/**
 * Summary of Authentication
 */
class Authentication  implements AuthenticationInterface
{
    /**
     * Summary of login
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function login(string $login, string $password) : ?string {
        return Auth::attempt([
            'email' => $login,
            'password' => $password
        ]);
    }

    /**
     * Summary of user
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user(){
        return Auth::user();
    }

    public function logout()
    {
        return Auth::logout();
    }
}
