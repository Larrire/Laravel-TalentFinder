<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function user_skills(Request $request){
        $skills = User::find($request->user()->id)->skills()->get();
        echo json_encode($skills);
    }
}
