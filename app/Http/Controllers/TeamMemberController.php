<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Services\SeoService;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    protected $seoService;

    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }

    public function show($id)
    {
        $member = TeamMember::findOrFail($id);
        $seoData = $this->seoService->getTeamMemberDetailSeoData($member);
        
        return view('team.show', compact('member', 'seoData'));
    }
} 