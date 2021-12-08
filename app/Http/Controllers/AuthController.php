<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {

    }

    public function login(LoginRequest $request)
    {
        $params = $request->validated();

        return response()->ok($params);
    }
}
