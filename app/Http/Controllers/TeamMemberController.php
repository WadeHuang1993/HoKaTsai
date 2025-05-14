<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function show($id)
    {
        $member = TeamMember::findOrFail($id);
        return view('team.show', compact('member'));
    }
} 