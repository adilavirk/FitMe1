@extends('admin.category.main.categorymaster')
@section('title','Category List')
@section('body')
<div class='container'>
    <div class="row mb-3">
        <div class="col-lg-6">
            <a href="{{route('admin.index')}}" class="btn btn-outline-light btn-lg">Back to admin index</a>
        </div>

        <div class="col-lg-6 d-flex justify-content-lg-end align-items-center">

            <a href="{{route('category.create')}}" class="btn btn-outline-light btn-lg">+ Add New Category</a>

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
            <th> Type</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cat as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>

                <img src="{{url('upload/',$category->icon)}}" alt="" id="indexicon" class="rounded-circle">

            </td>
            <td>{{$category->type}}</td>

            {{--edit button link--}}
            <td>
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-success">Edit</a>
            </td>
            {{-- edit link end --}}

            {{-- link for delete --}}
            <td>
                <form action="{{route('category.destroy',$category->id)}}" method="post">

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
    <div>{{$cat->links()}}</div>
</div>
</div>


@endsection
