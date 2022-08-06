@extends('admin.category.main.categorymaster')

@section('title',' Edit Category')

@section('body')

<div class="container">

    <a href="{{route('category.index')}}" class="btn btn-outline-warning btn-lg">Back to Category List</a>

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
            <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for=" ">Type:</label>
                    <input type="text" name="type" id=" " class="form-control" placeholder="Enter type" value="{{$category->type}}">
                </div>
                


                <div class="form-group">
                    <label for=" ">Upload Icon:</label>
                    <input type="file" name="icon" id=" " class="form-control" value="{{$category->icon}}">

                </div>
                <div class="form-group">

                    <input type="hidden" name="my_icon" value="{{$category->icon}}">
                </div>

                <br>
                <input type="submit" value="Submit Form" class="btn btn-info btn-lg">

            </form>
        </div>
        <div class="col-lg-6 bg--dark">
            <div class="d-flex justify-content-center">

                <div>
                    <h2 class="text-center text-white"> profile Icon</h2>
                    <img src="{{url('upload/',$category->icon)}}" alt="" id="editicon" class="rounded">

                </div>
            </div>

        </div>

    </div>







    @endsection
