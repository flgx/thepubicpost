<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Tag;
use App\Image;
use App\Category;
use App\VideoPost;
use Auth;
use Config;
class VideoPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $videoposts= VideoPost::Search($request->title)->orderBy('id','DESC')->paginate(5);
        $videoposts->each(function($videoposts){
            $videoposts->category;
            $videoposts->images;
            $videoposts->tags;
            $videoposts->user;
        });
        return view('admin.videoposts.index')
        ->with('videoposts',$videoposts);
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
            $videoposts = VideoPost::orderBy('id','DESC')->paginate(4);
            return view('admin.videoposts.create')
            ->with('videoposts',$videoposts)
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
        $videpost = new VideoPost($request->except('images','category_id','tags'));
        $videpost->user_id = \Auth::user()->id;
       //associate category with videpost
        $category = Category::find($request['category_id']);
        $videpost->category()->associate($category);
        $videpost->save();  

        //associate all tags for the videpost
        $videpost->tags()->sync($request->tags);
        $picture = '';

      
        //Process Form Images
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach($files as $file){
                //image data
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').'_'.$filename;
                //make images sliders
                $image=\Image::make($file->getRealPath()); //Call image library installed.
                $destinationPath = public_path().'/img/videposts/';
                $image->resize(1300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save($destinationPath.'slider_'.$picture);
                //make images thumbnails
                $image2=\Image::make($file->getRealPath()); //Call immage library installed.
                $thumbPath = public_path().'/img/videposts/thumbs/';
                $image2->resize(null, 230, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image2->save($thumbPath.'thumb_'.$picture);
                //save image information on the db.
                $imageDb = new Image();
                $imageDb->name = $picture;
                $imageDb->videpost()->associate($videpost);
                $imageDb->save();
            }
        }else{
            return redirect()->back();
        }
        Flash::success("VideoPost <strong>".$videpost->title."</strong> was created.");
        return redirect()->route('admin.videposts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $videopost = VideoPost::find($id);
        return view('admin.videoposts.show')->with('VideoPost',$videopost);
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
            $videopost = VideoPost::find($id);
            $categories = Category::orderBy('name','DESC')->lists('name','id');
            $tags = Tag::orderBy('name','DESC')->lists('name','id');
            $images = new Image();
            $videopost->images->each(function($videopost){
                $videopost->images;
            });
            $myTags = $videopost->tags->lists('id')->ToArray(); //give me a array with only the tags id.
            return View('admin.videoposts.edit')->with('videopost',$videopost)->with('categories',$categories)->with('tags',$tags)->with('myTags',$myTags);            
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
        $videopost =VideoPost::find($id);
        $videopost->fill($request->all());
        $videopost->user_id = \Auth::user()->id;
        $videopost->save();
        $videopost->tags()->sync($request->tags);      
        Flash::success("VideoPost <strong>".$videopost->id."</strong> was updated.");
        return redirect()->route('admin.videoposts.index');
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
            $videopost = VideoPost::find($id);
            $videopost->delete();
            Flash::error("VideoPost <strong>".$videopost->name."</strong> was deleted.");
            return redirect()->route('admin.videoposts.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }
    }
}
