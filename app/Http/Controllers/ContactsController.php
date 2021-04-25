<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function list(Request $request){
        $data['search'] = $request->search;
        return view('contacts.list', $data);
    }

    public function create(){
        return view('contacts.create');
    }

    public function store(){
        
    }

    public function edit($id){
        return view('contacts.edit');
    }

    public function update(){
        
    }

    public function delete($id){
        
    }

    public function search_page($id){
        
    }
}
