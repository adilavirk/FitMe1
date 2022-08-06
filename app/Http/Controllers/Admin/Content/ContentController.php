<?php

namespace App\Http\Controllers\Admin\Content;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Image;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Content\Requests\StoreRequest;
use Illuminate\Support\Facades\File;


class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
         
        $con=Content::latest()->paginate(2);
        return view('Admin.content.index',compact('con'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        //Helper Function
          $courses = getAllCourses();
        //  $content=Content::all();
         return view('Admin.content.create',compact('courses'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {    
         if($request->hasFile('icon'))
          
         $file=$request->file('icon');
         $imageName=rand().'.'.$file->getClientOriginalExtension();
         $file->move(public_path('icon'),$imageName);


          $content=new Content([

            
                'course_id'=>$request->course_id,
                'title'=>$request->title,
                'days'=>$request->days,
                'weeks'=>$request->weeks,
                'description'=>$request->description,
               'icon'=>$imageName,
          ]);
          $content->save();

        // $icon=$request->file('icon');
        //  $content->icon=rand().'.'.$icon->getClientOriginalExtension();
        //  $icon->move(public_path('upload'),$content->icon);






        // Content::create([
        //     'course_id'=>$request->course_id,
        //     'title'=>$request->title,
        //     'days'=>$request->days,
        //     'weeks'=>$request->weeks,
        //     'description'=>$request->description,
        //    'icon'=>$content->icon,
        //      //  'video'=>$my_video,


        // ]);
        // return redirect()->route('content.index')->with('success',' Content inserted successfuly');


        //  $video=$request->file('video');
        //  $my_video=rand().'.'.$video->getClientOriginalExtension();
        //  $video->move(public_path('upload'),$my_video);
    

        if($request->hasFile('images')){

                 $files=$request->file('images');

                 foreach($files as $file){
                    $imageName=rand().'.'.$file->getClientOriginalExtension();
                    $request['content_id']=$content->id;
                    $request['image']=$imageName;
                    $file->move(public_path('images'),$imageName);
                    Image::create($request->all());

                      
                 }
        }
        return redirect()->route('content.index')->with('success',' Content inserted successfuly');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit( Content  $content)
    {
        
      
          $courses = getAllCourses();
         return view('Admin.content.edit',compact('courses','content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     * 
     * 

     */
    public function editAllWeeksOfSingleCourse(Request $request){


        $course = Course::where('id',$request->course_id)->first();
        $dataToSend = "";
        $i =1;
        while($i <= $course->weeks){
    
            $dataToSend = $dataToSend . "<option value= '$i'>Week $i</option>";
    
              $i++;
        }
              return $dataToSend;
    }
    public function update(StoreRequest $request, Content $content)
    {    
        $content->update($request->except('icon'));
             if($request->hasfile('icon')){
          $icon=$request->file('icon');
            $content->icon=rand().'.'.$icon->getClientOriginalExtension();
            $icon->move(public_path('upload'),$content->icon);
            $content->update([
             "icon"=>$content->icon
            ]);
            }else{
            
           $content->update($request->all());
         }
    
        $content->update($request->except('images'));
            if($request->hasfile('images'))
             $files = $request->file('images');
             foreach ($files as $file){
                $imageName=rand().'.'.$file->getClientOriginalExtension();
                $request['content_id']=$content->id;
                $request['image']=$imageName;
                $file->move(public_path('images'),$imageName);
                Image::create($request->all());
        
            }
            return redirect(route('content.index'))->with('success','Content will be updated');
         }


 public function getAllWeeksOfSingleCourse(Request $request){


    $course = Course::where('id',$request->course_id)->first();
    $dataToSend = "";
    $i =1;
    while($i <= $course->weeks){

        $dataToSend = $dataToSend . "<option value= '$i'>Week $i</option>";

          $i++;
    }
          return $dataToSend;
}
    
    public function destroy(Content $content)
    {
               $content->delete();

               return redirect()->route('content.index')->with('error',' Content Deleted successfuly :)');

    }

  //   public function deleteContentImages($img_id,Request $request){

  //      // $images=Image::where('id',$request->content_id)->first();
  //       $images=Image::find($img_id);

  //       if($images!=null){

  //       $images->delete();

  //       return redirect()->route('content.index')->with('error',' Image Deleted successfuly :)');
        
  //       }
       
  //       return redirect()->route('content.index')->with('error',' Wrong ID!!');
      
  //  }
//    public function deleteContentIcon(Content $content){


    
   
//     //   $icon = Content::find($id);

//     //   $icon->delete();



//      $destination = 'icon/'.$content->icon;
//      if(File::exists($destination)){

//          File::delete($destination);
//      }

//     //   $icon->delete();
//       return redirect()->route('content.index')->with('error',' Icon Deleted successfuly :)');
        
// }
  public function deleteImage(Request $request,$image_id){

      $data=Image::where('image_id',$request->image_id)->first();
      $data->delete();
  }
}