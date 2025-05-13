<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = AdminUser::orderBy('_id', 'desc')->paginate(20);
        return view('admin.admin_users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.admin_users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:admin_users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $data['password'] = Hash::make($data['password']);
        AdminUser::create($data);
        return redirect()->route('admin.admin-users.index')->with('success', '管理員帳號已新增');
    }

    public function edit(AdminUser $admin_user)
    {
        return view('admin.admin_users.edit', compact('admin_user'));
    }

    public function update(Request $request, AdminUser $admin_user)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:admin_users,email,' . $admin_user->_id . ',_id',
            'password' => 'nullable|min:6|confirmed',
        ]);
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $admin_user->update($data);
        return redirect()->route('admin.admin-users.index')->with('success', '管理員帳號已更新');
    }

    public function destroy(AdminUser $admin_user)
    {
        $admin_user->forceDelete();
        return redirect()->route('admin.admin-users.index')->with('success', '管理員帳號已刪除');
    }
}
