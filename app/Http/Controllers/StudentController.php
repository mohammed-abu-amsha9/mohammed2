<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    public function login(Request $request)
    {
        $response = Http::post('https://quiztoxml.ucas.edu.ps/api/login', [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        $data = $response->json();

        // إذا فشل
        if ($data['success'] == false) {
            return response()->json([
                'message' => $data['message']
            ]);
        }

        // إذا نجح
        $student = new Student();

        $student->student_no = $data['data']['user_id'];
        $student->student_name   = $data['data']['user_ar_name'];
        $student->token          = $data['Token'];

        $student->save();

        return response()->json([
            'message' => 'تم تسجيل الدخول وتخزين البيانات بنجاح',
            'data' => $data,
        ]);
    }

    public function student_login(Request $request)
    {
        $response = Http::post('https://quiztoxml.ucas.edu.ps/api/get-table', [
            'student_no' => $request->user_id,
            'token' => $request->token,
        ]);

        return  $response->json();
    }
}
