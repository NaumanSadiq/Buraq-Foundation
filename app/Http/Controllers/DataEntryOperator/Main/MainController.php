<?php

namespace App\Http\Controllers\DataEntryOperator\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
        return view('dataEntryOperator.dashboard');
    }
}
