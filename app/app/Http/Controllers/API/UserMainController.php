<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Application\UserMain\UserMainInterface;
use Illuminate\Support\Facades\Validator;
class UserMainController extends Controller
{  
    private $userService;
    public function __construct(UserMainInterface $userService)
    {
        $this->userService = $userService;
    } 
    /**
     * register
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails() && !$request->get('id')) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $params = $request->all(); // todo => not use directly params.
        $user = $this->userService->register($params);

        return response()->json(['user' => $user, 'message' => 'Registration successful'], 201);
    }  
}