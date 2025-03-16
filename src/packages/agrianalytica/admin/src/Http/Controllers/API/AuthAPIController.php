<?php
namespace Agrianalytica\Admin\Http\Controllers\API;

use Agrianalytica\Admin\Models\LandManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Agrianalytica\Admin\Models\Employee;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthAPIController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!$token = Auth::guard('employee_api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        Auth::guard('employee_api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('employee_api')->refresh());
    }

    public function me()
    {
        return response()->json(Auth::guard('employee_api')->user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('employee_api')->factory()->getTTL() * 60
        ]);
    }

    public function clients() {
        return response()->json(LandManager::all());
    }
}
