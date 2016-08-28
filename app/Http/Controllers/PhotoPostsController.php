<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\PhotoPost;
use App\Tag;
use App\Image;
use App\Category;
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
            $photoposts->images;
            $photoposts->tags;
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
        if(Auth::check()){
            $categories = Category::orderBy('name','ASC')->lists('name','id');
            $tags =Tag::orderBy('name','ASC')->lists('name','id');
            $photoposts = PhotoPost::orderBy('id','DESC')->paginate(4);
            return view('admin.photoposts.create')
            ->with('photoposts',$photoposts)
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
        $photopost = new PhotoPost($request->except('images','category_id','tags'));
        $photopost->user_id = \Auth::user()->id;
       //associate category with photopost
        $category = Category::find($request['category_id']);
        $photopost->category()->associate($category);
        $photopost->save();

        //associate all tags for the photopost
        $photopost->tags()->sync($request->tags);
    
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
                $destinationPath = public_path().'/img/photoposts/';
                $image->resize(1300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save($destinationPath.'slider_'.$picture);
                //make images thumbnails
                $image2=\Image::make($file->getRealPath()); //Call immage library installed.
                $thumbPath = public_path().'/img/photoposts/thumbs/';
                $image2->resize(null, 230, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image2->save($thumbPath.'thumb_'.$picture);
                //save image information on the db.
                $imageDb = new Image();
                $imageDb->name = $picture;
                $imageDb->photopost()->associate($photopost);
                $imageDb->save();
            }
        }

        Flash::success("PhotoPost <strong>".$photopost->title."</strong> was created.");
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
        $photopost = PhotoPost::find($id);
        return view('admin.photoposts.show')->with('PhotoPost',$photopost);
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
            $photopost = PhotoPost::find($id);
            $categories = Category::orderBy('name','DESC')->lists('name','id');
            $tags = Tag::orderBy('name','DESC')->lists('name','id');
            $images = new Image();
            $photopost->images->each(function($photopost){
                $photopost->images;
            });
            $myTags = $photopost->tags->lists('id')->ToArray(); //give me a array with only the tags id.
            return View('admin.photoposts.edit')->with('photopost',$photopost)->with('categories',$categories)->with('tags',$tags)->with('myTags',$myTags);            
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
        $photopost =PhotoPost::find($id);
        $photopost->fill($request->all());
        $photopost->user_id = \Auth::user()->id;
        $photopost->save();
        $photopost->tags()->sync($request->tags);      
        Flash::success("PhotoPost <strong>".$photopost->id."</strong> was updated.");
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
            $photopost = PhotoPost::find($id);
            $photopost->delete();
            Flash::error("PhotoPost <strong>".$photopost->title."</strong> was deleted.");
            return redirect()->route('admin.photoposts.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }

    }
    public function approve($id)
    {
        if(Auth::user()->type == 'admin'){
            $photopost = Photopost::find($id);
            $photopost->status='approved';
            $photopost->save();
            Flash::success("Photopost <strong>".$photopost->title."</strong> was approved.");
            return redirect()->route('admin.photoposts.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }
    }
    public function suspend($id)
    {
        if(Auth::user()->type == 'admin'){
            $photopost = Photopost::find($id);
            $photopost->status='suspended';
            $photopost->save();
            Flash::warning("Photopost <strong>".$photopost->title."</strong> was suspended.");
            return redirect()->route('admin.photoposts.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }
    }
}
