<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = new User();
        $users = User::all();
        return view('users.index', ["users" => $users]);
    }
    //users only
    public function users()
    {
        $users = new User();
        $users = DB::table('users')
        ->select()
        ->where('userType', 0)->get();
        return view('users.user', ["users" => $users]);
    }
    //admins only
    public function admins()
    {
        $users = new User();
        $users = DB::table('users')
        ->select()
        ->where('userType', 1)->get();
        return view('users.user', ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:9', 'min:8']
        ]);
        $hasFile = $request->hasFile('profile_pic') && $request->profile_pic->isValid();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        if ($request->userType == 0) {
            $user->music_preferences = $request->music_preferences;
        } else {
            $user->music_preferences = 0;
        }
        $user->userType = $request->userType;
        if ($hasFile) {
            $file = $request->file('profile_pic');
            $filename = $file->getClientOriginalName();
            $request->profile_pic->storeAs('profilePics', $filename);
            $user->profile_picture = $filename;
        }
        if ($user->save()) {
            return  redirect('/users');
        }else{
            return view ('users.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = new User();
        $user = User::find($id);
        if($user!=null){
            return view('users.edit',["user"=>$user]);
        }else{
            return redirect('/users');
        }
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:9', 'min:8']
        ]);
        $user = User::find($id);
        $hasFile = $request->hasFile('profile_pic') && $request->profile_pic->isValid();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        if ($request->userType == 0) {
            $user->music_preferences = $request->music_preferences;
        } else {
            $user->music_preferences = 0;
        }
        $user->userType = $request->userType;
        if ($hasFile) {
            $file = $request->file('profile_pic');
            $filename = $file->getClientOriginalName();
            $request->profile_pic->storeAs('profilePics', $filename);
            $user->profile_picture = $filename;
        }
        if ($user->save()) {
            return  redirect('/users');
        }else{
            return  route('users.show',$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users');
    }
}
