<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class StatusController extends Controller
{
    public function status_update($id){
        $category=DB::table('categorys')
                    ->select('status')
                    ->where('id','=',$id)
                    ->first();
                    
        //check status
        if($category->status=='1'){

          $status='0';
        } else{
            $status='1';
        }
        //update category status
         $values= array('status'=>$status);
         DB::table('categorys')->where('id',$id)->update($values);
         session()->flash('msg','Category status has been updated');
         return redirect()->back();




    }
}
