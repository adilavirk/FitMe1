<?php

namespace App\Http\Controllers\Admin\Category;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Category\Requests\StoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
         
        $cat=Category::latest()->paginate(3);
        return view('Admin.category.index',compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Admin.category.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
         $icon=$request->file('icon');
         $my_icon=rand().'.'.$icon->getClientOriginalExtension();
         $icon->move(public_path('upload'),$my_icon);



        Category::create([
              
            'type'=>$request->type,
            'icon'=>$my_icon,


        ]);
         return redirect()->route('category.index')->with('success','Adila Virk  data inserted successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
          return view('Admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Category $category)
    {
        $category->update($request->except('icon'));
        if($request->hasfile('icon')){
         $icon=$request->file('icon');
        $my_icon=rand().'.'.$icon->getClientOriginalExtension();
        $icon->move(public_path('upload'),$my_icon);
        $category->update([
         "icon"=>$my_icon
        ]);
        }else{
        
       $category->update($request->all());
     }
     return redirect(route('category.index'))->with('success','Data will be updated');
 }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('error','Adila Virk  data Deleted successfuly :)');

    }
}
