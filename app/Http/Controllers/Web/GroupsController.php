<?php

namespace App\Http\Controllers\Web;

use App\Group;
use App\GroupMember;
use App\GroupNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.create.group');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:20',
            'info' => 'required|min:5|max:255',
        ]);

        $group = new Group;

        $group->name = $request->name;
        $group->info = $request->info;
        $group->admin = Auth::user()->id;

        $group->save();

        return redirect('/fanclubs');
    }

    public function joinRequest(Request $request, Group $group)
    {
        $member = new GroupMember;

        $member->group_id = $group->id;
        $member->user_id  = Auth::user()->id;

        $member->save();

        $user = Auth::user()->last_name;

        $notification =  new GroupNotification;

        $notification->info = "'$user' sent a request to join your group... group-name : '$group->name'";
        $notification->group_id = $group->id;
        $notification->admin    = $group->admin;

        $notification->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $notifications = $group->notifications;

        return view('web.view.group', compact('group', 'notifications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
