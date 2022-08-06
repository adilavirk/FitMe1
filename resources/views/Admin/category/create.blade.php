@extends('admin.category.main.categorymaster')
@section('title','Add New Category')

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

    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">

        @csrf
        <br>
        <div class="form-group">
            <label for=" ">Type:</label>
            <input type="text" name="type" id=" " class="form-control" placeholder="Enter type" value="{{old('type')}}">
        </div>
       <br>
        <div class="form-group">
            <label for=" ">Upload Icon:</label>
            <input type="file" name="icon" id=" " class="form-control">
          
        </div>

        <br>
        <input type="submit" value="Submit Form" class="btn btn-info btn-lg">
    </form>
</div>

@endsection
