<?php

namespace App\Http\Controllers\backEnd;

use PragmaRX\Countries\Package\Countries;


use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $con = Countries::all();

        // dd( $con->where('name.common', 'Brazil'));
        $users = User::all();
        return view('backEnd.users.userShow', ["users" => $users, "country" => $con]);
        // return view("posts.userProfile",["posts"=>$posts, "user"=>$user]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $con = Countries::all();

        $users = User::all();
        return view('backEnd.users.userCreate', ["user" => $users, "country" => $con]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd();
        $request->validate([

            'name' => "required |min:5| max:60",
            'email' => 'required|email |unique:users',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'country' => 'required',
            'password' => 'required|confirmed|min:6',
            'image' => 'image',


        ]);

        $user = new User();
        $name = request("name");
        $email = request("email");
        $phone = request("phone");
        $password = request("password");
        $country = request("country");
        $role = request("role");
        if($request['image']!="")
        {
            $image = $request['image']->store("images", "public");

        }
        else {
            $image = $request['image'];
        }
        
       
       
        
        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->password = Hash::make($password);
        $user->country = $country;
        $user->role = $role;
        $user->profile_photo_path = $image;
        $user->save();
        session()->flash('success', 'User Create Successfully');
        return redirect("admin/users");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $con = Countries::all();
        return view('backEnd.users.userEdit', ['user' => $user, "country" => $con]);
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


        $request->validate([

            'name' => "required |min:5| max:60",
            'email'  =>  'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'country' => 'required',
            'password' => 'required|confirmed|min:6',
            'image' => 'image',



        ]);

        $name = request("name");
        $email = request("email");
        $phone = request("phone");
        $password = request("password");
        $country = request("country");
        $role = request("role");
        if($request['image']!="")
        {
            $image = $request['image']->store("images", "public");

        }
        else{
             $image = $request['image'];
        }
       
       


        $user->update([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'country' => $country,
            'password' => Hash::make($password),
            'role' => $role,
            'profile_photo_path' => $image

        ]);
        session()->flash('success', 'User Update Successfully');

        return redirect("/admin/users");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //     ? dd("jjjo" ) :dd("notfound");
        if($user->profile_photo_path!=""){
        if (file_exists(public_path() . "/storage" . '/' . $user->profile_photo_path)) {

            unlink(public_path() . "/storage" . '/' . $user->profile_photo_path);
        }}
        $user->delete();
        return back();
    }
}
