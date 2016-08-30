<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Ebook;
use App\Tag;
use App\Image;
use App\Category;
use Auth;
use Config;
class EbooksController extends Controller
{
    /**
     * Give me ebooks order by id DESC.
     *
     * @return \Illuminate\Http\Response
     */
    /**

    
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ebooks= Ebook::Search($request->title)->orderBy('id','DESC')->where('user_id',Auth::user()->id)->paginate(2);
        $sortType = 'desc';
        $ebooks->each(function($ebooks){
            $ebooks->category;
            $ebooks->images;
            $ebooks->tags;
            $ebooks->user;
        });
        return view('admin.ebooks.index')
        ->with('ebooks',$ebooks)->with('sortType',$sortType);
    }
    public function all(Request $request)
    {
        $ebooks= Ebook::Search($request->title)->orderBy('id','DESC')->paginate(2);
        $sortType = 'desc';
        $ebooks->each(function($ebooks){
            $ebooks->category;
            $ebooks->images;
            $ebooks->tags;
            $ebooks->user;
        });
        return view('admin.ebooks.all')
        ->with('ebooks',$ebooks)->with('sortType',$sortType);
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
            $ebooks = Ebook::orderBy('id','DESC')->paginate(4);
            return view('admin.ebooks.create')
            ->with('ebooks',$ebooks)
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
        $ebook = new Ebook($request->except('images','category_id','tags'));
        $ebook->user_id = \Auth::user()->id;
       //associate category with ebook
        $category = Category::find($request['category_id']);
        $ebook->category()->associate($category);
        $ebook->save();  

        //associate all tags for the ebook
        $ebook->tags()->sync($request->tags);
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
                $destinationPath = public_path().'/img/ebooks/';
                $image->resize(1300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save($destinationPath.'ebook_'.$picture);
                
                //make images thumbnails
                $image2=\Image::make($file->getRealPath()); //Call immage library installed.
                $thumbPath = public_path().'/img/ebooks/thumbs/';
                $image2->resize(null, 230, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image2->save($thumbPath.'thumb_'.$picture);
                //save image information on the db.
                $imageDb = new Image();
                $imageDb->name = $picture;
                $imageDb->ebook()->associate($ebook);
                $imageDb->save();
            }
        }else{
            return redirect()->back();
        }
        Flash::success("Ebook <strong>".$ebook->title."</strong> was created.");
        return redirect()->route('admin.ebooks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ebook = Ebook::find($id);
        return view('admin.ebooks.show')->with('Ebook',$ebook);
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
            $ebook = Ebook::find($id);
            $categories = Category::orderBy('name','DESC')->lists('name','id');
            $tags = Tag::orderBy('name','DESC')->lists('name','id');
            $images = new Image();
            $ebook->images->each(function($ebook){
                $ebook->images;
            });
            $myTags = $ebook->tags->lists('id')->ToArray(); //give me a array with only the tags id.
            return View('admin.ebooks.edit')->with('ebook',$ebook)->with('categories',$categories)->with('tags',$tags)->with('myTags',$myTags);            
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
        $ebook =Ebook::find($id);
        if($request->featured){
            $ebook->featured = 'true';
        }else{
            $ebook->featured = 'false';
        }
        $ebook->fill($request->all());
        $ebook->user_id = \Auth::user()->id;
        $ebook->save();
        $ebook->tags()->sync($request->tags);      
        Flash::success("Ebook <strong>".$ebook->id."</strong> was updated.");
        return redirect()->route('admin.ebooks.index');
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
            $ebook = Ebook::find($id);
            $ebook->delete();
            Flash::error("Ebook <strong>".$ebook->title."</strong> was deleted.");
            return redirect()->route('admin.ebooks.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }
    }
    public function approve($id)
    {
        if(Auth::user()->type == 'admin'){
            $ebook = Ebook::find($id);
            $ebook->status='approved';
            $ebook->save();
            Flash::success("Ebook <strong>".$ebook->title."</strong> was approved.");
            return redirect()->route('admin.ebooks.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }
    }
    public function suspend($id)
    {
        if(Auth::user()->type == 'admin'){
            $ebook = Ebook::find($id);
            $ebook->status='suspended';
            $ebook->save();
            Flash::warning("Ebook <strong>".$ebook->title."</strong> was suspended.");
            return redirect()->route('admin.ebooks.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }
    }
}
