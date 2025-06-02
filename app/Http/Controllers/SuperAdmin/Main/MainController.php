<?php

namespace App\Http\Controllers\SuperAdmin\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
        $admins = User::where('role_id', User::ADMIN_ROLE_ID)->count();
        $dataEntryOperators = User::where('role_id', User::DATA_ENTRY_ROLE_ID)->count();

        return view('superAdmin.dashboard', compact('admins', 'dataEntryOperators'));
    }
}
