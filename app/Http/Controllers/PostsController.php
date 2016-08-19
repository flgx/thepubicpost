<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
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
        $posts= Post::Search($request->title)->orderBy('id','DESC')->paginate(5);
        $posts->each(function($posts){
            $posts->category;
            $posts->user;
        });
        return view('admin.posts.index')
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
            if(Auth::user()->type == 'admin'){
                $categories = Category::orderBy('name','ASC')->lists('name','id');
                $tags =Tag::orderBy('name','ASC')->lists('name','id');
                $posts = Post::orderBy('id','DESC')->paginate(4);

                return view('admin.posts.create')
                ->with('posts',$posts)
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if($request->file('image')){
            $file = $request->file('image');
            $imagename = 'img_'. time() . '.' . $file->getClientOriginalExtension();
            $path = public_path(). '/images/posts/';
            $file->move($path,$imagename);            
        }
        $post = new Post($request->all());
        $post->user_id = \Auth::user()->id;
        $post->save();

        $post->tags()->sync($request->tags);

        $image = new Image();
        $image->name = $imagename;
        $image->post()->associate($post); // Associate the recent post id with the image.
        $image->save();
        Flash::success("Post <strong>".$post->name."</strong> was created.");
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

        return view('admin.posts.show')->with('post',$post);
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

            $myTags = $post->tags->lists('id')->ToArray(); //give me a array with only the tags id.
            return View('admin.posts.edit')->with('post',$post)->with('categories',$categories)->with('tags',$tags)->with('myTags',$myTags);            
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
        $post =Post::find($id);
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
}
