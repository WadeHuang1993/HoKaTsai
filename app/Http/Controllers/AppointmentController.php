<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\TeamMember;
use App\Services\SeoService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class AppointmentController extends Controller
{
    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }

    // 顯示預約表單
    public function showForm()
    {
        $teamMembers = TeamMember::orderBy('name')->get();

        // 只撈出有填寫 可預約時間的心理師
        $teamMembers = $teamMembers->filter(function ($teamMember) {
            return false === empty($teamMember->available_times);
        });

        $seoData = $this->seoService->getAppointmentSeoData();

        return view('appointment.form', compact('teamMembers', 'seoData'));
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

        // 傳送通知到 slack
        $this->sendNewAppointmentNotify();

        // 這裡可依需求儲存資料或寄信，暫時只顯示感謝訊息
        return redirect()->route('appointment.form')->with('success', '您的預約資料已送出，服務人員將盡快與您聯繫！');
    }

    /**
     * @return void
     */
    public function sendNewAppointmentNotify(): void
    {
        // 只有正式機才送通知
        if (false === App::environment('production')) {
            return;
        }

        $adminUrl = route('admin.appointments.index');
        $message = "「好家在心理諮商所」網站有新預約，<{$adminUrl}|前往管理後台查看>";

        $slackChannel = 'https://hooks.slack.com/services/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';
        Http::post($slackChannel, [
            'text' => $message,
        ]);
    }
}
