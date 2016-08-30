<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Post;
use App\Tag;
use App\Image;
use App\Category;
use Auth;
use Config;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts= Post::Search($request->title)->orderBy('id','DESC')->where('user_id',Auth::user()->id)->paginate(5);
        $posts->each(function($posts){
            $posts->category;
            $posts->images;
            $posts->tags;
            $posts->user;
        });
        return view('admin.posts.index')
        ->with('posts',$posts);
    }
    public function all(Request $request)
    {
        $posts= Post::Search($request->title)->orderBy('id','DESC')->paginate(5);
        $posts->each(function($posts){
            $posts->category;
            $posts->images;
            $posts->tags;
            $posts->user;
        });
        return view('admin.posts.all')
        ->with('posts',$posts);
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
                $posts = Post::orderBy('id','DESC')->paginate(4);
                return view('admin.posts.create')
                ->with('posts',$posts)
                ->with('categories',$categories)
                ->with('tags',$tags);
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
        $post = new Post($request->except('images','category_id','tags'));
        $post->user_id = \Auth::user()->id;
       //associate category with post
        $category = Category::find($request['category_id']);
        $post->category()->associate($category);
        $post->save();  
        //associate all tags for the post
        $post->tags()->sync($request->tags);
        $picture = '';      
        //Process Form Images
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach($files as $file){
                //image  data
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').'_'.$filename;
                //make images sliders
                $image=\Image::make($file->getRealPath()); //Call image library installed.
                $destinationPath = public_path().'/img/posts/';
                $image->resize(1300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save($destinationPath.'slider_'.$picture);
                //make images thumbnails
                $image2=\Image::make($file->getRealPath()); //Call immage library installed.
                $thumbPath = public_path().'/img/posts/thumbs/';
                $image2->resize(null, 230, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image2->save($thumbPath.'thumb_'.$picture);
                //save image information on the db.
                $imageDb = new Image();
                $imageDb->name = $picture;
                $imageDb->post()->associate($post);
                $imageDb->save();
            }
        }else{
           return redirect()->back();
        }
        Flash::success("Post <strong>".$post->title."</strong> was created.");
        return redirect()->route('admin.posts.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.posts.show')->with('Post',$post);
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
            $post = Post::find($id);
            $categories = Category::orderBy('name','DESC')->lists('name','id');
            $tags = Tag::orderBy('name','DESC')->lists('name','id');
            $images = new Image();
            $post->images->each(function($post){
                $post->images;
            });
            $myTags = $post->tags->lists('id')->ToArray(); //give me a array with only the tags id.
            return View('admin.posts.edit')->with('post',$post)->with('categories',$categories)->with('tags',$tags)->with('myTags',$myTags);            
        }else{
            return redirect()->route('admin.posts.index');
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
        $post =Post::find($id);
        if($request->featured){
            $post->featured = 'true';
        }else{
            $post->featured = 'false';
        }
        $post->fill($request->all());
        $post->user_id = \Auth::user()->id;
        $post->save();
        $post->tags()->sync($request->tags);      
        Flash::success("Post <strong>".$post->id."</strong> was updated.");
        return redirect()->route('admin.posts.index');
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
            $post = Post::find($id);
            $post->delete();
            Flash::error("Post <strong>".$post->name."</strong> was deleted.");
            return redirect()->route('admin.posts.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }
    }
    
    public function approve($id)
    {
        if(Auth::user()->type == 'admin'){
            $post = Post::find($id);
            $post->status='approved';
            $post->save();
            Flash::success("Post <strong>".$post->title."</strong> was approved.");
            return redirect()->route('admin.posts.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }
    }
    public function suspend($id)
    {
        if(Auth::user()->type == 'admin'){
            $post = Post::find($id);
            $post->status='suspended';
            $post->save();
            Flash::warning("Post <strong>".$post->title."</strong> was suspended.");
            return redirect()->route('admin.posts.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }
    }
}
