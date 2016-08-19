<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EbookRequest;
use Laracasts\Flash\Flash;
use willvincent\Feeds\Facades\FeedsFacade;
use App\Ebook;
use App\Tag;
use App\Image;
use App\Category;
use App\Ebook;
use Auth;
use Config;
class EbooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ebooks= Ebook::Search($request->title)->orderBy('id','DESC')->paginate(5);
        $ebooks->each(function($ebooks){
            $ebooks->category;
            $ebooks->user;
        });
        return view('admin.ebooks.index')
        ->with('ebooks',$ebooks);
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
                $ebooks = Ebook::orderBy('id','DESC')->paginate(4);

                return view('admin.ebooks.create')
                ->with('ebooks',$ebooks)
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
    public function store(EbookRequest $request)
    {
        if($request->file('image')){
            $file = $request->file('image');
            $imagename = 'img_'. time() . '.' . $file->getClientOriginalExtension();
            $path = public_path(). '/images/ebooks/';
            $file->move($path,$imagename);            
        }
        $Ebook = new Ebook($request->all());
        $Ebook->user_id = \Auth::user()->id;
        $Ebook->save();

        $Ebook->tags()->sync($request->tags);

        $image = new Image();
        $image->name = $imagename;
        $image->Ebook()->associate($Ebook); // Associate the recent Ebook id with the image.
        $image->save();
        Flash::success("Ebook <strong>".$Ebook->name."</strong> was created.");
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
        $Ebook = Ebook::find($id);

        return view('admin.ebooks.show')->with('Ebook',$Ebook);
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
            $Ebook = Ebook::find($id);
            $categories = Category::orderBy('name','DESC')->lists('name','id');
            $tags = Tag::orderBy('name','DESC')->lists('name','id');

            $myTags = $Ebook->tags->lists('id')->ToArray(); //give me a array with only the tags id.
            return View('admin.ebooks.edit')->with('Ebook',$Ebook)->with('categories',$categories)->with('tags',$tags)->with('myTags',$myTags);            
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
        $Ebook =Ebook::find($id);
        $Ebook->fill($request->all());
        $Ebook->user_id = \Auth::user()->id;
        $Ebook->save();

        $Ebook->tags()->sync($request->tags);

      
        Flash::success("Ebook <strong>".$Ebook->id."</strong> was updated.");
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
            $Ebook = Ebook::find($id);
            $Ebook->delete();
            Flash::error("Ebook <strong>".$Ebook->name."</strong> was deleted.");
            return redirect()->route('admin.ebooks.index');            
        }else{
            return redirect()->route('admin.dashboard.index');
        }

    }
}
