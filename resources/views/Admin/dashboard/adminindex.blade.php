@extends('admin.category.main.categorymaster')
@section('title','Add New Category')

@section('body')
<div class='container'>
    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="{{route('admin.dashboard')}}" class="btn btn-warning btn-lg">Dashboard</a>
        </div>
        <div class="col-lg-12 d-flex justify-content-lg-end align-items-center">

            <a href="{{route('category.index')}}" class="btn btn-outline-light btn-lg">+ Add New Category</a>
        </div>
           <br><br><br>
         <div class="col-lg-12 d-flex justify-content-lg-end align-items-center">

            <a href="{{route('course.create')}}" class="btn btn-outline-light btn-lg">+ Add New Course</a>

        </div>
          <br><br><br>
        <div class="col-lg-12 d-flex justify-content-lg-end align-items-center">

            <a href="{{route('content.create')}}" class="btn btn-outline-light btn-lg">+ Add New Content</a>

        </div>
        
    </div>
    @endsection