<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;
use Auth;
use App\Http\Requests;
use App\User;
use App\Image;
use Laracasts\Flash\Flash;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate(4);

        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        Flash::success('User: '.$user->name.' was created!');
        return redirect()->route('admin.users.index');

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
       if(Auth::user()->id == $id || Auth::user()->type == 'admin')
        {

           $user = User::find($id);
           return view('admin.users.edit')->with('user',$user);

        }
       else{

            return redirect('/');
       }
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

        $user->name = $request->name;
        $user->email = $request->email;
        $picture_profile = '';
        $picture_real_id = '';

        if ($request->hasFile('profile_image') && $request->file('profile_image') != NULL) {     
            $file_profile = $request->file('profile_image');           
            //image data
            $filename_profile = $file_profile->getClientOriginalName();
            $extension_profile = $file_profile->getClientOriginalExtension();
            $picture_profile = date('His').'_'.$filename_profile;
            //optimize images and store image
            $image_profile=\Image::make($file_profile->getRealPath()); //Call image library installed.
            $destinationPath_profile = public_path().'/img/users/profile/';
            $image_profile->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
            });
            $image_profile->save($destinationPath_profile.'profile_'.$picture_profile);
            //save image information on the db.
            $user->profile_image = $picture_profile;        
        }

        if ($request->hasFile('real_id') && $request->file('real_id') != NULL) {
            $file_real_id = $request->file('real_id');            
            //image data
            $filename_real_id = $file_real_id->getClientOriginalName();
            $extension_real_id = $file_real_id->getClientOriginalExtension();
            $picture_real_id = date('His').'_'.$filename_real_id;
            //optimize images and store image
            $image_real_id=\Image::make($file_real_id->getRealPath()); //Call image library installed.
            $destinationPath_real_id = public_path().'/img/users/real_id/';
            $image_real_id->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
            });
            $image_real_id->save($destinationPath_real_id.'real_id_'.$picture_real_id);
            //save image information on the db.
            $user->real_id = $picture_real_id;
        }

        $user->save();
        Flash::success('The user was updated.');
        return back()->withInput();

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
        Flash::error('The user: "<strong>'.$user->name.'"</strong> was deleted.');
        return redirect()->route('admin.users.index');
    }
}
