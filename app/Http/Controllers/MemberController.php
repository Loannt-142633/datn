<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input as Input;
use File;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->sortBy(['school', 'organization', 'name']);
        return view('member.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        $user->level = $request->level;
        $user->save();

        return redirect()->route('member.index')->with(['msg' => 'Add new member successfull']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $tasks = DB::table('tasks')->where('user_id', $id)->get();
        return view('member.show', compact('user','tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('member.edit', compact('user'));
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
        $user = User::find($id);

        if (Input::hasFile('avatar')) {
            $oldFile = $user->avatar;
            File::Delete($oldFile);
            $file = Input::file('avatar');
            $uploadFolder = config('custom.path_avatar');
            $filename = str_random(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . $uploadFolder, $filename);
        } else {
            $filename = $user->avatar;
        }

        if ($_POST['password'] && $_POST['password_confirmation']) {
            if ($_POST['password'] == $_POST['password_confirmation']) {
                $new_password = bcrypt($_POST['password']);
            } else {
                return redirect()->back()->with(['status' => 'Confirm password incorrectly']);
            }
            
        } else {
            $new_password = $user->password;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->school = $request->school;
        $user->organization = $request->organization;
        $user->course = $request->course;
        $user->avatar = $filename;
        $user->password = $new_password;
        $user->save();
        return redirect()->route('member.show', ['id' => $id])->with(['msg' => 'Update profile successfull']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with(['msg' => 'The member has been deleted']);
    }
}
