@extends('admin.course.main.coursemaster')
@section('title','Course List')
@section('body')
<div class='container'>
    <div class="row mb-3">
        <div class="col-lg-6">

            <a href="{{route('category.index')}}" class="btn btn-secondary btn-lg">Back to Category index</a>
        </div>
        <br>
        <div class="col-lg-6 d-flex justify-content-lg-end align-items-center">

            <a href="{{route('course.create')}}" class="btn btn-danger btn-lg">+ Add New Course</a>

        </div> 
    </div>

    {{-- success flash sms--}}

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif
    {{-- end success flash message --}}


    {{-- delete flash sms--}}

    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
    @endif

    {{-- end delete flash message --}}
</div>
{{--this is table portion--}}

<table class=" table table-bordered text-white bg-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Icon</th>
            <th> Title</th>
            <th> Description</th>
            <th>Weeks</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cou as $course)
        <tr>
            <td>{{$course->id}}</td>
            <td>

                <img src="{{asset('storage/'.$course->icon)}}" alt="" id="indexicon" class="rounded-circle">

            </td>
            <td>{{$course->title}}</td>
            <td>{{$course->description}}</td>
            <td>{{$course->weeks}}</td>


            {{--edit button link--}}
            <td>
                <a href="{{route('course.edit',$course->id)}}" class="btn btn-success">Edit</a>
            </td>
            {{-- edit link end --}}

            {{-- link for delete --}}
            <td>
                <form action="{{route('course.destroy',$course->id)}}" method="post">

                    @csrf
                    @method('DELETE')

                    <input type="submit" value="DELETE" class="btn btn-danger">

                </form>
                {{-- end delete --}}
            </td>
        </tr>

        @endforeach
    </tbody>
</table>


{{--end table--}}

<div class="d-flex justify-content-center align-items-center">
    <div>{{$cou->links()}}</div>
</div>
</div>


@endsection
