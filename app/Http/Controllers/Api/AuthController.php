<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api
 * @OA\Info(
 *     version="0.0.2",
 *     title="Laravel com Android - Parte I",
 *     description="API Financeira",
 * @OA\Contact(email="cperbony@gmail.com")
 * )
 */
class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     * @OA\Post(
     *     path="api/login",
     *     summary="Login User",
     *     description="Returns Token JWT",
     *     @OA\Response(response=200, description="Successfull operation")
     * )
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        $token = \JWTAuth::attempt($credentials);

        return $this->responseToken($token);
    }

    private function responseToken($token)
    {
        return $token ? ['token' => $token] :
            response()->json([
                'error' => \Lang::get('auth.failed')
            ], 400);
    }

    public function logout()
    {
        \Auth::guard('api')->logout();
        return response()->json([], 204); //No-content
    }

    public function refresh()
    {
        $token = \Auth::guard('api')->refresh();
        return ['token' => $token]; //No-content
    }
}
