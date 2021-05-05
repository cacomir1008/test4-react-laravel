<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conditiondata;
use App\Condition;
use App\User;
use App\Http\Requests\ConditionRequest;
use Illuminate\Support\Facades\Auth;


class ConditionController extends Controller
{
    // マイページ
    public function index(){

        return view('conditions.index');
    }

    // Condition情報入力フォーム
    public function create() {
        $conditiondatas = Conditiondata::all();
        return view('conditions.create', compact('conditiondatas'));
    }

    // Condition情報保存
    public function store(ConditionRequest $request, Condition $condition) {
        $condition->start = $request->start;
        $condition->diagnosis = $request->diagnosis;
        $condition->hospital = $request->hospital;
        $condition->others = $request->others;
        $condition->comment = $request->comment;
        $condition->icon = $request->icon;
        $condition->conditiondata_name = $request->conditiondata_name;
        $condition->conditiondata_id = $request->conditiondata_id;
        $condition->user_id = $request->user_id;
        $condition->user_name = $request->user_name;
        $condition->save();
        return redirect()->route('conditions.index');
    }

    // 全てのユーザー情報、Condition情報抽出API
    public function  allinfo() {
        $users = User::all();
        // $conditions = Condition::all();

        $conditions = Condition::select()
       ->join('users','users.id','=','conditions.user_id')
       ->get(); 

        return response()->json([
            'conditions' => $conditions->toArray(),
        ]);
    }


    // ログインユーザーのCondition情報抽出API
    public function show($id) {
        $condition = auth()->user()->conditions()->find($id);

        if(!$condition) {
            return response()->json([
                'success' => false,
                'data' => '該当のデータは見つかりませんでした'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $condition->toArray(),
        ]);
    }

}
