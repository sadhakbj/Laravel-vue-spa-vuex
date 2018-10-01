<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\User;

/**
 * Undocumented class.
 * @package category
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
            'email'    => 'required|email|exists:users',
            'password' => 'required|min:5'
        ]);

        if (auth()->attempt($credentials)) {
            $user          = auth()->user();
            $user['token'] = $this->generateTokenForUser($user);

            return response()->json($user);
        } else {
            return response()->json(['success' => 'false', 'message' => 'Authentication failed'], 401);
        }
    }

    /**
     * Register user.
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        $userData =   $this->validate($request, [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'password'              => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        try {
            $user          = app(User::class)->create($userData);
            $user['token'] = $this->generateTokenForUser($user);
        } catch (Exception $exception) {
            logger()->error($exception);

            return response()->json([
                'success' => false,
                'message' => 'Unable to create new user.'
            ]);
        }

        return response()->json($user);
    }

    /**
     * Generate the token for the user.
     *
     * @param User $user
     * @return string
     */
    private function generateTokenForUser($user):string
    {
        return $user->createToken(config('app.name'))->accessToken;
    }
}
