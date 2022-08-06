<?php

namespace App\Http\Controllers\Admin\Content\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             "course_id"=>"required",
             "title"=>"required",
              "description"=>"required",
              "weeks"=>"required",
              "days"=>"required",
               //"icon"=>"required",


        ];
    }
} 
