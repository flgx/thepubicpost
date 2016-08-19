<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\PhotoPost;
use App\Tag;
use App\Image;
use App\Category;
use App\PhotoPhotoPost;
use Auth;
use Config;
class PhotoPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $photoposts= PhotoPost::Search($request->title)->orderBy('id','DESC')->paginate(5);
        $photoposts->each(function($photoposts){
            $photoposts->category;
            $photoposts->user;
        });
        return view('admin.photoposts.index')
        ->with('photoposts',$photoposts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == 'admin'){
            $categories = Category::orderBy('name','ASC')->lists('name','id');
            $tags =Tag::orderBy('name','ASC')->lists('name','id');
            $photoposts = PhotoPost::orderBy('id','DESC')->paginate(4);

            return view('admin.photoposts.create')
            ->with('photoposts',$photoposts)
            ->with('categories',$categories)
            ->with('tags',$tags);                
        }else{
            return redirect()->route('admin.dashboard.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoPostRequest $request)
    {
        if($request->file('image')){
            $file = $request->file('image');
            $imagename = 'img_'. time() . '.' . $file->getClientOriginalExtension();
            $path = public_path(). '/images/photoposts/';
            $file->move($path,$imagename);            
        }
        $post = new PhotoPost($request->all());
        $post->user_id = \Auth::user()->id;
        $post->save();

        $post->tags()->sync($request->tags);

        $image = new Image();
        $image->name = $imagename;
        $image->post()->associate($post); // Associate the recent post id with the image.
        $image->save();
        Flash::success("PhotoPost <strong>".$post->name."</strong> was created.");
        return redirect()->route('admin.photoposts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PhotoPost::find($id);

        return view('admin.photoposts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {          
        if(Auth::user()->type == 'admin'){
            $post = PhotoPost::find($id);
            $categories = Category::orderBy('name','DESC')->lists('name','id');
            $tags = Tag::orderBy('name','DESC')->lists('name','id');

            $myTags = $post->tags->lists('id')->ToArray(); //give me a array with only the tags id.
            return View('admin.photoposts.edit')->with('post',$post)->with('categories',$categories)->with('tags',$tags)->with('myTags',$myTags);            
        }else{
            return redirect()->route('admin.dashboard.index');
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
        $post =PhotoPost::find($id);
        $post->fill($request->all());
        $post->user_id = \Auth::user()->id;
        $post->save();

        $post->tags()->sync($request->tags);

      
        Flash::success("PhotoPost <strong>".$post->id."</strong> was updated.");
        return redirect()->route('admin.photoposts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->type == 'admin'){
            $post = PhotoPost::find($id);
            $post->delete();
            Flash::error("PhotoPost <strong>".$post->name."</strong> was deleted.");
            return redirect()->route('admin.photoposts.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }

    }
}
