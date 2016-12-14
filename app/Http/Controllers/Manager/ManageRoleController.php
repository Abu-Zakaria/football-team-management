<?php

namespace App\Http\Controllers\Manager;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageRoleController extends Controller
{
    public function index()
    {
    	$roles = Role::all();

    	return view('manager.add.roll', compact('roles'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|unique:roles',
    	]);

    	$role = new Role;

    	$name = strtoupper($request->name);

    	$role->name = $name;

    	$role->save();

    	return redirect('/manage/add/role');
    }

}