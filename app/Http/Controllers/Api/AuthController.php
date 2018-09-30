<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * AuthController class.
 * @package App\Http\Controllers\Api
 */
class AuthController extends Controller
{
    /**
     * Login to the sytem.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $credentials =   $this->validate($request, [
            'email'    => 'email|required|exists:users',
            'password' => 'required|min:5'
        ]);

        if (auth()->attempt($credentials)) {
            $user          = auth()->user();
            $user['token'] = $user->createToken(config('app.name'))->accessToken;

            return response()->json($user);
        } else {
            return response()->json(['success' => 'false', 'message' => 'Authentication failed'], 401);
        }
    }
}
