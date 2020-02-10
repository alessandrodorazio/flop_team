<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use App\Http\Responser;
use App\Models\User\StaffPermissions;
use App\University;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if (User::where('email', $request->email)->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => trans('auth.email_already_used')
            ]);
        }
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
            'name' => $request->name,
            'surname' => $request->surname
        ]);

        if($request->university_id && $request->type != 1) {
            $user->university_id = $request->university_id;
        } elseif($request->faculty_id) {
            $user->faculty_id = $request->faculty_id;
        }
        $user->save();

        $token = auth('api')->login($user);

        return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            $token = JWTAuth::attempt($credentials);
            if (!$token) {
                return response()->json(
                    [
                        'error' => (object) [
                            'email' => null,
                            'password' => trans('auth.failed')
                        ]
                    ],
                    200
                );
            }
        } catch (JWTException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => trans('auth.token_not_created')
                ],
                400
            );
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        if (auth()->user()) {
            try {
                auth()->logout();
            } catch (JWTException $e) {
                return response()->json([
                    'success' => false,
                    'message' => trans('auth.logout_failed')
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => trans('auth.logout_success')
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => trans('auth.user_is_not_logged_in')
        ]);
    }

    protected function respondWithToken($token)
    {
        $response = [
            'success' => true,
            'access_token' => $token,
        ];
        return response()->json($response);
    }

    public static function me()
    {
        $response = [
            'success' => true,
            'message' => trans('auth.user_info'),
            'user' => auth()->user()
        ];

        return $response;
    }

    public function access_token()
    {
        $token = JWTAuth::getToken();
        $new_token = JWTAuth::refresh($token);
        return $this->respondWithToken($new_token);
    }
}
