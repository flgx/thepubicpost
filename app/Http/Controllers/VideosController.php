<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Tag;
use App\Image;
use App\Category;
use App\Video;
use Auth;
use Config;
class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)     
    {
        $videos= Video::Search($request->title)->orderBy('id','DESC')->where('user_id',Auth::user()->id)->paginate(5);
        $videos->each(function($videos){
            $videos->category;
            $videos->images;
            $videos->tags;
            $videos->user;
        });
        return view('admin.videos.index')
        ->with('videos',$videos);
    }
    public function all(Request $request)
    {
        $videos= Video::Search($request->title)->orderBy('id','DESC')->paginate(5);
        $videos->each(function($videos){
            $videos->category;
            $videos->images;
            $videos->tags;
            $videos->user;
        });
        return view('admin.videos.all')
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
            $categories = Category::orderBy('name','ASC')->lists('name','id');
            $tags =Tag::orderBy('name','ASC')->lists('name','id');
            $videos = Video::orderBy('id','DESC')->paginate(4);
            return view('admin.videos.create')
            ->with('videos',$videos)
            ->with('categories',$categories)
            ->with('tags',$tags);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new Video($request->except('images','category_id','tags'));

        $video->user_id = \Auth::user()->id;
       //associate category with video
        $category = Category::find($request['category_id']);
        $video->category()->associate($category);
        $video->save();  

        //associate all tags for the video
        $video->tags()->sync($request->tags);
        $picture = '';
        Flash::success("Video <strong>".$video->title."</strong> was created.");
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
        $video = Video::find($id);
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
            $video = Video::find($id);
            $categories = Category::orderBy('name','DESC')->lists('name','id');
            $tags = Tag::orderBy('name','DESC')->lists('name','id');
            $myTags = $video->tags->lists('id')->ToArray(); //give me a array with only the tags id.
            return View('admin.videos.edit')->with('video',$video)->with('categories',$categories)->with('tags',$tags)->with('myTags',$myTags);            
        }else{
            return redirect()->route('admin.videos.index');
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
        $video =Video::find($id);
        if($request->featured){
            $video->featured = 'true';
        }else{
            $video->featured = 'false';
        }
        $video->fill($request->all());
        $video->user_id = \Auth::user()->id;
        $video->save();
        $video->tags()->sync($request->tags);      
        Flash::success("Video <strong>".$video->id."</strong> was updated.");
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
            $video = Video::find($id);
            $video->delete();
            Flash::error("Video <strong>".$video->name."</strong> was deleted.");
            return redirect()->route('admin.videos.index');            
        }else{
            return redirect()->route('admin.video.index');
        }
    }

    public function approve($id)
    {
        if(Auth::user()->type == 'admin'){
            $video = Video::find($id);
            $video->status='approved';
            $video->save();
            Flash::success("Video <strong>".$video->title."</strong> was approved.");
            return redirect()->route('admin.videos.index');            
        }else{
            return redirect()->route('admin.videos.index');
        }
    }
    public function suspend($id)
    {
        if(Auth::user()->type == 'admin'){
            $video = Video::find($id);
            $video->status='suspended';
            $video->save();
            Flash::warning("Video <strong>".$video->title."</strong> was suspended.");
            return redirect()->route('admin.videos.index');            
        }else{
            return redirect()->route('admin.videos.index');
        }
    }
}
