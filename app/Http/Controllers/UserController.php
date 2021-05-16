<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_skill;

class UserController extends Controller
{
    private $template_data;

    public function default_template_data($request){
        $this->template_data['user_name'] = explode(' ', $request->user()['name'])[0];
        $this->template_data['user_email'] = $request->user()['email'];
        $this->template_data['user_type'] = $request->user()['user_type'];
        $this->template_data['user_id'] = $request->user()['id'];
    }

    public function getUserInfo(Request $request){
        $userInfo = User::find($request->user()->id);
        echo json_encode($userInfo);
    }

    public function updateUserInfo(Request $request){
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'description' => ['string', 'nullable'],
        ]);

        $user = User::find($request->user()->id);
        $user->name = $request->name ?? '';
        $user->email = $request->email ?? '';
        $user->description = $request->description ?? '';
        $user->save();
        echo json_encode($user);
    }

    public function home(Request $request){
        $this->template_data['active_link'] = 'home';
        $this->template_data['users'] = User::all();
        
        $this->default_template_data($request);
        return view('user.home', $this->template_data);
    }

    public function profile(Request $request){
        $this->template_data['active_link'] = 'profile';
        $this->template_data['experiences'] = User::find($request->user()->id)->experiences()->get();
        $this->template_data['skills'] = User::find($request->user()->id)->skills()->get();
        $this->template_data['social_medias'] = User::find($request->user()->id)->social_medias()->get();
        
        $this->default_template_data($request);
        return view('user.edit-profile', $this->template_data);
    }

    public function view_profile(Request $request){
        $user_id = $request->query->get('user');

        $this->template_data['active_link'] = 'search';
        $this->template_data['profile_data'] = User::find($user_id);
        $this->template_data['experiences'] = User::find($user_id)->experiences()->get();
        $this->template_data['skills'] = User::find($user_id)->skills()->get();
        $this->template_data['social_medias'] = User::find($user_id)->social_medias()->get();
        
        $this->default_template_data($request);
        return view('user.view-profile', $this->template_data);
    }

    public function search(Request $request){
        $this->template_data['active_link'] = 'search';
        $this->default_template_data($request);
        return view('search.search', $this->template_data);
    }
}
