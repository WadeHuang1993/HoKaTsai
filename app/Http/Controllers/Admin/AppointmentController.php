<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::orderBy('_id', 'desc')->paginate(30);
        return view('admin.appointments.index', compact('appointments'));
    }

    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = $request->input('status', 'pending');
        $appointment->save();
        return response()->json([
            'success' => true,
            'message' => '預約狀態已更新'
        ]);
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('admin.appointments.index')->with('success', '預約已刪除');
    }
}
