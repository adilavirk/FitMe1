@extends('admin.course.main.coursemaster')

@section('title',' Edit Category')

@section('body')

<div class="container">

    <a href="{{route('course.index')}}" class="btn btn-outline-warning btn-lg">Back to Course List</a>

    <br>
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

    <div class="row">
        <div class="col-lg-6">
            <form action="{{route('course.update',$course->id)}}" method="post" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for=" ">Title:</label>
                    <input type="text" name="title" id=" " class="form-control" placeholder="Enter title" value="{{$course->title}}">
                </div>
                
                <div class="form-group">
                    <label for=" ">Description:</label>
                     <input type="text" name="description" id=" " class="form-control" placeholder="Enter Description" value="{{$course->description}}">
                 </div>
                  <div class="form-group">
                       <label for=" ">Weeks:</label>
                        <input type="text" name="weeks" id=" " class="form-control" placeholder="Enter Time Duration" value="{{$course->weeks}}">
                  </div>

                
                   <div class="form-group">
            <label for=" ">Upload Icon:</label>
            <input type="file" name="icon" id=" " class="form-control">
        </div>

        <br>
        <input type="submit" value="Submit Form" class="btn btn-info btn-lg">

                
            </form>
        </div>
         <div class="col-lg-6 bg--dark">
            <div class="d-flex justify-content-center">

                <div>
                    <h2 class="text-center text-white"> profile Icon</h2>
                    {{-- <img src="{{url('upload/',$course->icon)}}" alt="" id="editicon" class="rounded"> --}}
                     <img src="{{asset('storage/'.$course->icon)}}" alt="" id="editicon" class="rounded-circle">


                </div>

    </div>







    @endsection
