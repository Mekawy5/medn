<?php

namespace App\Http\Controllers;

use App\Http\Requests\usersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view ('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('name','id')->all();

        return view ('admin.users.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(usersRequest $request)
    {

        if(trim($request->password == '')){ //if the user entered no password
            $input = $request->except('password');//get all inputs data except the password so not include the password in the update process
        }
        else{
            $input = $request->all(); //get all the form data and put in variable $input
        }



        if($file = $request->file('photo_id')){ //if the file input 'photo_id' isn't empty put the image in $file

            $name = time() . $file->getClientOriginalName();// create a $name have the img name with date to deal with duplicate
            $file->move('images',$name); //move the image to folder 'images' and give it the name we created
            $photo = Photo::create(['file'=>$name]);//insert a photo in db , but the name we created in the file field in the DB

            $input['photo_id'] = $photo->id; // in the form data of the user put the id of the inserted image in the 'photo_id'

        }

        $input['password'] = bcrypt($request->password); //encrypt the pass from the requested form and but it in the input which will be inserted in the user table


        if(User::where('email','=',$input['email'])->exists()){
            Session::flash('email_exists','ERROR , This Email is already exists ...');
        }
        else{
            User::create($input); // create a user with the data modified '$input' not the data from form '$request'
            Session::flash('user_created','User have been Created ...');
        }

        return  redirect('admin/users');
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
    public function edit($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::lists('name','id')->all();

        return view ('admin.users.edit',compact('user','roles'));
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

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'is_active' => 'required',
        ]);

        $user = User::findOrFail($id);
        if(trim($request->password == '')){
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
        }

        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $input['password'] = bcrypt($request->password);
        $user->update($input);
        Session::flash('user_updated','User have been Updated ...');
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

       if($user->exists()){


           if($user->photo_id != ''){
               if(file_exists(public_path().$user->photo->file)){
                   unlink(public_path().$user->photo->file);
               }
           }

           $user->delete();
           Session::flash('user_deleted','User have been deleted ...');
           return redirect('admin/users');
       }
        else{
            return redirect(404);
        }

    }
}
