<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Application\Authentication\AuthenticationInterface;

class AuthController extends Controller
{  
    private $authService;
    public function __construct(AuthenticationInterface $authService)
    {
        $this->authService = $authService;
    }     
    /**
     * login
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $login = $request->get('email','');
        $password = $request->get('password','');
        $token = $this->authService->login($login,$password);
        if ($token) {
            $user = $this->authService->user();
            return response()->json(['user' => $user, 'token' => $token], 200);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    public function logout()
    {
        try {
            $this->authService->logout();
            return response()->json(['success' => true], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => 'An error occured.'], 401);
        }
        
    }
}
