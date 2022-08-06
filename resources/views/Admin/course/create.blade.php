@extends('admin.course.main.coursemaster')
@section('title','Add New Course')

@section('body')
<div class="container">

    <a href="{{route('course.index')}}" class="btn btn-outline-warning btn-lg">Back to Course List</a>
    {{-- error bag sms--}}
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>

    </div>

    @endif
    {{--end error sms--}}


    <div class="col-md-12">
        <form action="{{route('course.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for=" ">Category:</label>
                <select class="form-control" name="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->type}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for=" ">Title:</label>
                <input type="text" name="title" id=" " class="form-control" placeholder="Enter title" value="{{old('title')}}">
            </div>


            <div class="form-group">
            <label for="weeks">Weeks:</label>
            <input  name="weeks" id="weeks " class="form-control "/>
        </div>

             <div class="form-group">
                <label for="description">Description:</label> 
                <textarea type="text" name="description" rows="3" cols="143" id=" " class="form-contol" placeholder="Enter Description" value="{{old('description')}}"></textarea>
            </div> 
            <div class="form-group">

                <label for=" ">Upload Icon:</label>

                <input type="file" name="icon" id=" " class="form-control">
            </div>

            
            <input type="submit" value="Submit Form" class="btn btn-info btn-lg">
    
    </form>
</div>


</div>

@endsection
