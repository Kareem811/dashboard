<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function registerinstructor(Request $request)
    {
        Instructor::create([
            'instructor_name' => $request->instructor_name,
            'instructor_national_id' => $request->instructor_national_id,
            'instructor_email' => $request->instructor_email,
            'instructor_password' => $request->instructor_password,
            'instructor_phone' => $request->instructor_phone,
            'instructor_age' => $request->instructor_age,
            'instructor_role' => $request->instructor_role,
            'instructor_status' => $request->instructor_role,
            "instructor_address" => $request->instructor_address,
            "instructor_gender" => $request->instructor_gender,
        ]);
        return response()->json(['message' => "instructor added successfully"], 201);
    }
    public function instructorlogin(Request $request)
    {
        $cred = $request->only('instructor_email', 'instructor_password');
        if (!Auth::attempt($cred)) {
            return response()->json(['msg' => 'invalid instructor'], 201);
        }
        $instructor = Auth::user();
        $instructorToken = $instructor->createToken()->plainTextToken;
        return response()->json(['msg' => 'instructor logged successfully', 'token' => $instructorToken], 201);
    }
    public function instructorlogout(Request $request)
    {
        $data = $request->user();
        $data->currentAccessToken()->delete();
        return response()->json(['message' => 'instructor Logged out successfully']);
    }

    public function instructor(Request $request)
    {
        return response()->json($request->user());
    }
}
