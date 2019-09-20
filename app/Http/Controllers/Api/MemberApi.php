<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberApi extends Controller
{
    public function getMember()
    {
        return load_member_data_table(get_member(Auth::id()));
    }
}
