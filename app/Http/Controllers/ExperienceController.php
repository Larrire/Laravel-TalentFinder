<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experience;

class ExperienceController extends Controller
{
    public function getById($id){
        $experience = Experience::find($id);
        echo json_encode($experience);
    }

    public function store(Request $request){
        $newExperience = new Experience;
        $newExperience->user_id = $request->user()['id'];
        $newExperience->company_name = $request->company_name;
        $newExperience->occupation = $request->occupation;
        $newExperience->date_start = $request->date_start;
        $newExperience->date_end = $request->date_end;
        $experience->current_job = $request->current_job;
        $newExperience->description = $request->description;
        $newExperience->save();
    }

    public function update(Request $request){
        $experience = Experience::find($request->id);
        $experience->company_name = $request->company_name;
        $experience->occupation = $request->occupation;
        $experience->date_start = $request->date_start;
        $experience->date_end = $request->date_end;
        $experience->current_job = $request->current_job;
        $experience->description = $request->description;
        $experience->save();
    }

    public function delete($id){
        $experience = Experience::find($id);
        $experience->delete();
    }
}
