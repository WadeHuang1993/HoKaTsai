<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    // 顯示預約表單
    public function showForm()
    {
        return view('appointment.form');
    }

    // 處理預約表單送出
    public function submitForm(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:30',
            'counselor' => 'required|string',
            'time' => 'required|string|max:100',
            'topics' => 'nullable|array',
            'topics.*' => 'string',
            'topic_other' => 'nullable|string|max:255',
            'contact_time' => 'nullable|string|max:100',
        ]);

        $topics = $request->topics;
        if ($request->topic_other) {
            $topics[] = $request->topic_other;
        }
        // topics 欄位存陣列
        $data['topics'] = $topics;
        Appointment::create($data);

        // 這裡可依需求儲存資料或寄信，暫時只顯示感謝訊息
        return redirect()->route('appointment.form')->with('success', '您的預約資料已送出，服務人員將盡快與您聯繫！');
    }
}
