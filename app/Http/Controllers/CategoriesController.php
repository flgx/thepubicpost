<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Category;
use Auth;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->type == 'admin'){
            $categories = Category::orderBy('id','DESC')->paginate(4);

            return view('admin.categories.index')->with('categories',$categories);
        }else{
            return redirect()->route('admin.dashboard.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == 'admin'){
            return view('admin.categories.create');
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
    public function store(Request $request)
    {
        $category = new Category($request->all());
        $category->save();
        Flash::success("Category <strong>".$category->name."</strong> was created.");
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $category = Category::find($id);
            return View('admin.categories.edit')->with('category',$category);
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
        $category = Category::find($id);
        $category->fill($request->all());
        $category->save();
        Flash::success("Category was updated.");
        return redirect()->route('admin.categories.index');
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
        $category = Category::find($id);
        $category->delete();
        Flash::error("Category <strong>".$category->name."</strong> was deleted.");
        return redirect()->route('admin.categories.index');
        }else{
            return redirect()->route('admin.dashboard.index');
        }
    }
}
