<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Condition;
use Illuminate\Support\Facades\Auth;


class ConditionController extends Controller
{
    public function index() {
        $conditions = auth()->user()->conditions;

        return response()->json([
            'success' => true,
            'data' => $conditions
        ]);
    }

    public function show($id) {
        $condition = auth()->user()->conditions()->find($id);

        if(!$condition) {
            return response()->json([
                'success' => false,
                'data' => 'Condition with id'.$id.'not found'
            ],400);
        }

        return response()->json([
            'success' => true,
            'data' => $condition->toArray(),
        ],400);
    }

    public function store(Request $request) {
        $valid = validator($request->only('start', 'diagnosis', 'hospital', 'comment', 'icon','conditionsdata_id'), [
            'start' => 'required|date',
            'diagnosis' => 'required|date',
            'hospital' => 'required|string|max:191',
            'comment' => 'required',
            'icon' => 'required',
            'conditionsdata_id' => 'required|integer',
        ]);

        if ($valid->fails()) {
            $jsonError=response()->json($valid->errors()->all(), 400);
            return \Response::json($jsonError);
        }

        $data = request()->only('start', 'diagnosis', 'hospital', 'comment', 'icon','conditionsdata_id');

        $condition = Condition::create([
            'start' => $data['start'],
            'diagnosis' => $data['diagnosis'],
            'hospital' => $data['hospital'],
            'comment' => $data['comment'],
            'icon' => $data['icon'],
            'conditionsdata_id' => $data['conditionsdata_id'],
            'user_id' => Auth::user()->id,
        ]);

        if($condition) {
            return response()->json([
                'success' => true,
                'data' => $condition->toArray(),
            ],200);
        }else {
            return response()->json([
                'success' => false,
                'data' => 'Condition could not be found',
            ], 500);
        }
    }

    public function update(Request $request, $id) {
        $condition = auth()->user()->conditions()->find($id);
        
        if(!$condition) {
            return response()->json([
                'success' => false,
                'data' => 'Condition with id'.$id.'not found',
            ], 500);
        }
        
        $updated = $condition->fill($request->all())->save();
        
        if($updated) {
            return response()->json([
                'success' => true,
                'data' => 'Condition updated successfully',
            ],200);
        }else {
            return response()->json([
                'success' => false,
                'data' => 'Condition could not be updated',
            ],500);
        }
    }
    
    public function destroy($id) {
        $condition = auth()->user()->conditions()->find($id);
        
        if(!$condition) {
            return response()->json([
                'success' => false,
                'message' => 'Condition with id'.$id.'not found',
            ],200);
        }

        if($condition->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Condition deleted successfully',
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Condition could not be deleted',   
            ], 500);
        }
    }
}