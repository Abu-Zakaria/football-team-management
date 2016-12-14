<?php

namespace App\Http\Controllers\Manager;

use App\Stadium;
use Illuminate\Http\Request;
use App\UseCases\ImageUpload;
use App\Http\Controllers\Controller;
class ManageStadiumController extends Controller
{

    public function index()
    {
        $stadiums = Stadium::all();

        return view('manager.stadiums', compact('stadiums'));
    }


    public function create()
    {
        return view('manager.add.stadium');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|min:3',
            'seats' => 'required|min:3',
            'photo' => 'required',
        ]);


        $stadium = new Stadium;

        $pic_name = time() . $_FILES['photo']['name'];

        $stadium->name = $request->name;
        $stadium->seats = $request->seats;
        $construction = ($request->construction)? true : false;
        $stadium->under_construction = $construction;
        $stadium->picture = $pic_name;

        $stadium->save();

        ImageUpload::perform('photo', 'uploads/manager/stadium', $pic_name);

        return redirect('/manage/stadiums');
    }


    public function show(Stadium $stadium)
    {
        return view('manager.view.stadium', compact('stadium'));
    }


    public function edit(Stadium $stadium)
    {
        return view('manager.update.stadium', compact('stadium'));
    }


    public function update(Request $request, Stadium $stadium)
    {
        $this->validate($request, [
           'name'   => 'required',
           'seats'  => 'required|min:3|max:255',
        ]);

        $stadiums = Stadium::where('name', '!=', $stadium->name)->where('name', $request->name)->get();

        if (count($stadiums))
        {
            return back()->with('info', 'That Name Has Already Been Used On Other Stadium!');
        }

        $pic_name = null;

        if ( $_FILES['photo']['name'] )
        {
            $pic_name = time() . $_FILES['photo']['name'];
            ImageUpload::perform('photo', 'uploads/manager/stadium', $pic_name);
        }

        $stadium->update([
            'name'   => $request->name,
            'seats'  => $request->seats,
            'description' => $request->description,
        ]);

        if ($pic_name)
        {
            $stadium->update([
                'picture' => $pic_name,
            ]);
        }

        return redirect('/manage/view/stadium/' . $stadium->id);

    }


    public function destroy($id)
    {
        //
    }
}
