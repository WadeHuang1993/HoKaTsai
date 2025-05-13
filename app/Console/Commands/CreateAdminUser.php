<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'CreateAdminUser';
    protected $description = '建立一個預設的 AdminUser 管理員帳號';

    public function handle()
    {
        $email = $this->ask('請輸入管理員 Email');
        $password = $this->secret('請輸入密碼');

        if (AdminUser::where('email', $email)->exists()) {
            $this->error('此 Email 已存在，請使用其他 Email。');
            return 1;
        }

        AdminUser::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('管理員帳號建立成功！');
        return 0;
    }
} 