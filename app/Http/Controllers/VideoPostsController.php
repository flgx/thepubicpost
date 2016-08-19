<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request ;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\VideoPost;
use App\Tag;
use App\Image;
use App\Category;
use Auth;
use Config;
class VideoPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $videos= VideoPost::Search($request->title)->orderBy('id','DESC')->paginate(5);
        $videos->each(function($videos){
            $videos->category;
            $videos->user;
        });
        return view('admin.videos.index')
        ->with('videos',$videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            if(Auth::user()->type == 'admin'){
                $categories = Category::orderBy('name','ASC')->lists('name','id');
                $tags =Tag::orderBy('name','ASC')->lists('name','id');
                $videos = VideoPost::orderBy('id','DESC')->paginate(4);

                return view('admin.videos.create')
                ->with('videos',$videos)
                ->with('categories',$categories)
                ->with('tags',$tags);                
            }else{
                return redirect()->route('admin.dashboard.index');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request   $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('image')){
            $file = $request->file('image');
            $imagename = 'img_'. time() . '.' . $file->getClientOriginalExtension();
            $path = public_path(). '/images/videos/';
            $file->move($path,$imagename);            
        }
        $video = new VideoPost($request->all());
        $video->user_id = \Auth::user()->id;
        $video->save();

        $video->tags()->sync($request->tags);

        $image = new Image();
        $image->name = $imagename;
        $image->video()->associate($video); // Associate the recent video id with the image.
        $image->save();
        Flash::success("VideoPost <strong>".$video->name."</strong> was created.");
        return redirect()->route('admin.videos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = VideoPost::find($id);

        return view('admin.videos.show')->with('video',$video);
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
            $video = VideoPost::find($id);
            $categories = Category::orderBy('name','DESC')->lists('name','id');
            $tags = Tag::orderBy('name','DESC')->lists('name','id');

            $myTags = $video->tags->lists('id')->ToArray(); //give me a array with only the tags id.
            return View('admin.videos.edit')->with('video',$video)->with('categories',$categories)->with('tags',$tags)->with('myTags',$myTags);            
        }else{
            return redirect()->route('admin.dashboard.index');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request   $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
    {
        $video =VideoPost::find($id);
        $video->fill($request->all());
        $video->user_id = \Auth::user()->id;
        $video->save();

        $video->tags()->sync($request->tags);

      
        Flash::success("VideoPost <strong>".$video->id."</strong> was updated.");
        return redirect()->route('admin.videos.index');
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
            $video = VideoPost::find($id);
            $video->delete();
            Flash::error("VideoPost <strong>".$video->name."</strong> was deleted.");
            return redirect()->route('admin.videos.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }

    }
}
