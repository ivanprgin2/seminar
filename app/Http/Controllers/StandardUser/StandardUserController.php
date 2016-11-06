<?php

namespace App\Http\Controllers\StandardUser;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\vpopmail_add_domain_ex;


class StandardUserController extends Controller
{
    public function getUserProtected()
    {
        return view('protected.standardUser.userPage');
    }
}
