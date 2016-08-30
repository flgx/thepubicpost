<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Photo;
use App\Tag;
use App\Image;
use App\Category;
use Auth;
use Config;
class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $photos = Photo::Search($request->title)->orderBy('id','DESC')->where('user_id',Auth::user()->id)->paginate(5);
        $photos->each(function($photos){
            $photos->category;
            $photos->images;
            $photos->tags;
            $photos->user;
        });
        return view('admin.photos.index')
        ->with('photos',$photos);
    }
    public function all(Request $request)
    {
        $photos= Photo::Search($request->title)->orderBy('id','DESC')->paginate(5);
        $photos->each(function($photos){
            $photos->category;
            $photos->images;
            $photos->tags;
            $photos->user;
        });
        return view('admin.photos.all')
        ->with('photos',$photos);
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
            $photo = Photo::orderBy('id','DESC')->paginate(4);
            return view('admin.photos.create')
            ->with('photo',$photo)
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

        $photo = new Photo($request->except('images','category_id','tags'));
        $photo->user_id = \Auth::user()->id;
       //associate category with photo
        $category = Category::find($request['category_id']);
        $photo->category()->associate($category);
        $photo->save();  

        //associate all tags for the photo
        $photo->tags()->sync($request->tags);
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
                $destinationPath = public_path().'/img/photos/';
                $image->resize(1300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save($destinationPath.'photo_'.$picture);
                
                //make images thumbnails
                $image2=\Image::make($file->getRealPath()); //Call immage library installed.
                $thumbPath = public_path().'/img/photos/thumbs/';
                $image2->resize(null, 230, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image2->save($thumbPath.'thumb_'.$picture);
                //save image information on the db.
                $imageDb = new Image();
                $imageDb->name = $picture;


                $imageDb->photo()->associate($photo);

                $imageDb->save();
                
            }
        }else{
            return redirect('admin/photos');
        }
        Flash::success("Photo <strong>".$photo->title."</strong> was created.");
        return redirect()->route('admin.photos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);
        return view('admin.photos.show')->with('Photo',$photo);
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
            $photo = Photo::find($id);
            $categories = Category::orderBy('name','DESC')->lists('name','id');
            $tags = Tag::orderBy('name','DESC')->lists('name','id');
            $images = new Image();
            $photo->images->each(function($photo){
                $photo->images;
            });
            $myTags = $photo->tags->lists('id')->ToArray(); //give me a array with only the tags id.
            return View('admin.photos.edit')->with('photo',$photo)->with('categories',$categories)->with('tags',$tags)->with('myTags',$myTags);            
        }else{
            return redirect()->route('admin.photos.index');
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
        $photo =Photo::find($id);

        if($request->featured){
            $photo->featured = 'true';
        }else{
            $photo->featured = 'false';
        }
        
        $photo->fill($request->all());
        $photo->user_id = \Auth::user()->id;
        $photo->save();
        $photo->tags()->sync($request->tags);
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
                $destinationPath = public_path().'/img/photos/';
                $image->resize(1300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save($destinationPath.'photo_'.$picture);
                
                //make images thumbnails
                $image2=\Image::make($file->getRealPath()); //Call immage library installed.
                $thumbPath = public_path().'/img/photos/thumbs/';
                $image2->resize(null, 230, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $image2->save($thumbPath.'thumb_'.$picture);
                //save image information on the db.
                $imageDb = new Image();
                $imageDb->name = $picture;


                $imageDb->photo()->associate($photo);

                $imageDb->save();
                
            }
        }else{
            return redirect('admin/photos');
        }      
        Flash::success("Photo <strong>".$photo->id."</strong> was updated.");
        return redirect()->back();
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
            $photo = Photo::find($id);
            $photo->delete();
            Flash::error("Photo <strong>".$photo->title."</strong> was deleted.");
            return redirect()->route('admin.photos.index');            
        }else{
            return redirect()->route('admin.photos.index');
        }

    }
    public function approve($id)
    {
        if(Auth::user()->type == 'admin'){
            $photo = Photopost::find($id);
            $photo->status='approved';
            $photo->save();
            Flash::success("Photopost <strong>".$photo->title."</strong> was approved.");
            return redirect()->route('admin.photos.index');            
        }else{
            return redirect()->route('admin.photos.index');
        }
    }
    public function suspend($id)
    {
        if(Auth::user()->type == 'admin'){
            $photo = Photopost::find($id);
            $photo->status='suspended';
            $photo->save();
            Flash::warning("Photopost <strong>".$photo->title."</strong> was suspended.");
            return redirect()->route('admin.photos.index');            
        }else{
            return redirect()->route('admin.photos.index');
        }
    }
}
