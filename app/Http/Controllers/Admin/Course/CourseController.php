<?php

namespace App\Http\Controllers\Admin\Course;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Course\Requests\StoreRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
         
        $cou=Course::latest()->paginate(3);
        return view('Admin.course.index',compact('cou'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = getAllCategories();
        return view('Admin.course.create',compact('categories'));
        
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



        Course::create([
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'weeks'=>$request->weeks,
            'description'=>$request->description,
            'icon'=>$my_icon,
             //  'video'=>$my_video,
            


        ]);

        return redirect()->route('course.index')->with('success',' Data inserted successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
          return view('Admin.course.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Course $course)
    {
        $course->update($request->except('icon'));
        if($request->hasfile('icon')){
         $icon=$request->file('icon');
        $my_icon=rand().'.'.$icon->getClientOriginalExtension();
        $icon->move(public_path('upload'),$my_icon);
        $course->update([
         "icon"=>$my_icon
        ]);
        }
        else{
        
            $content->update($request->all());
          }
         
     return redirect(route('course.index'))->with('success','Data will be updated');
 }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index')->with('error',' Data Deleted successfuly :)');

    }
}
