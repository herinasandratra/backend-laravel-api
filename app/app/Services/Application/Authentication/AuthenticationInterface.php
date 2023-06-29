<?php
// app/Contracts/ExampleInterface.php
namespace App\Services\Application\Authentication;

interface AuthenticationInterface
{    
    /**
     * login
     *
     * @param  string $login
     * @param  string $password
     * @return string
     */
    public function login(string $login,string $password) :?string;    
    /**
     * user
     *
     * @return mixed
     */
    public function user();
    
    /**
     * logout
     *
     * @return mixed
     */
    public function logout();
}
