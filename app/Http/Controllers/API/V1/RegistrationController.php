<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\V1\RegisterRequest;

class RegistrationController extends Controller
{
    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        // Since validation is handled automatically by RegisterRequest, you don't need fails() or Validator::make()
        $data = $request->validated(); // This will contain validated data

        // Proceed with creating the user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // Return a response
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ], 201);
    }
}
