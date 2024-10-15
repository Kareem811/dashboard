<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function registerstudent(Request $request)
    {
        $student = Student::create([
            'student_name' => $request->student_name,
            'student_national_id' => $request->student_national_id,
            'student_email' => $request->student_email,
            'student_password' => $request->student_password,
            'student_mobile_number' => $request->student_mobile_number,
            'student_education' => $request->student_education,
            'student_college' => $request->student_college,
            'student_university' => $request->student_university,
            'student_graduation_year' => $request->student_graduation_year,
            'student_linkedin' => $request->student_linkedin,
            'student_college_id' => $request->student_college_id,
            'student_address' => $request->student_address,
            "student_gender" => $request->student_gender,
            'student_lead_owner' => $request->student_lead_owner
        ]);
        return response()->json(['message' => "student added succesfully"], 201);
    }
    public function studentlogin(Request $request)
    {
        $cred = $request->only('student_email', 'student_password');
        if (!Auth::attempt($cred)) {
            return response()->json(["Message" => "Invalid Student"]);
        }
        $student = Auth::user();
        $studentToken = $student->createToken()->plainTextToken;
        return response()->json(["message" => "student logged successfully", 'token' => $studentToken], 201);
    }
    public function studentlogout(Request $request)
    {
        $data = $request->user();
        $data->currentAccessToken()->delete();
        return response()->json(['message' => 'student Logged out successfully']);
    }

    public function student(Request $request)
    {
        return response()->json($request->user());
    }
}
