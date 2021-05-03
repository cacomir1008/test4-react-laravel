<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conditiondata;

class ConditionController extends Controller
{
    public function index(){

        return view('conditions.mypage');
    }

    public function create() {
        $conditiondatas = Conditiondata::all();
        return view('conditions.create', compact('conditiondatas'));
    }
}
