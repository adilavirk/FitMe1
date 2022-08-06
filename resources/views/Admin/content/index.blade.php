@extends('admin.content.main.contentmaster')
@section('title','Content List')
@section('body')
<div class='container'>
    <div class="row mb-3">
        <div class="col-lg-6">

            <a href="{{route('course.index')}}" class="btn btn-outline-light btn-lg">Back to Course index</a>
        </div>
        <br>
        <div class="col-lg-6 d-flex justify-content-lg-end align-items-center">

            <a href="{{route('content.create')}}" class="btn btn-outline-light btn-lg">+ Add New Content</a>

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
            {{--<th>video</th>--}}
            <th> Title</th>
            <th> Description</th>
            <th>Weeks</th>
            <th>Days</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        @foreach($con as $content)
        <tr>
            <td>{{$content->id}}</td>
            <td>

                <img src="{{url('icon/',$content->icon)}}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
            </td>
            <td>{{$content->title}}</td>
            <td>{{$content->description}}</td>
            <td>{{$content->weeks}}</td>
            <td>{{$content->days}}</td>


            {{--edit button link--}}
            <td>
                <a href="{{route('content.edit',$content->id)}}" class="btn btn-success">Edit</a>
            </td>
            {{-- edit link end --}}

            {{-- link for delete --}}
            <td>
                <form action="{{route('content.destroy',$content->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE" class="btn btn-danger">

                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{--end table--}}

<div class="d-flex justify-content-center align-items-center">
    <div>{{$con->links()}}</div>
</div>
</div>


@endsection
