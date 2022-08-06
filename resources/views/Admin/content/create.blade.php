@extends('admin.content.main.contentmaster')
@section('title','Add New Contnet')

@section('body')
<div class="container">

    <a href="{{route('content.index')}}" class="btn btn-outline-warning btn-lg">Back to Content List</a>

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

    <form action="{{route('content.store')}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label for="">Course:</label>
            <select class="form-control courseList" name="course_id">
                <option value="">Select Course</option>
                @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for=" ">Title:</label>
            <input type="text" name="title" id=" " class="form-control" placeholder="Enter title" value="{{old('title')}}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea type="text" name="description" rows="4" cols="143" id=" " class="form-contol" placeholder="Enter Description" value="{{old('description')}}"></textarea>
        </div>

        <div class="form-group">
            <label for="weeks">Weeks:</label>
            <select name="weeks" id="weeks" class="form-control weekList" value="{{old('weeks')}}">
                <option>--Select Weeks--</option>
        </div>

        </select>
        <label for="">Days</label>
        <select class="form-control" name="days" value="{{old('days')}}">
            <option value="">Select Day</option>
            <option value="1">Monday</option>
            <option value="2">Tuesday</option>
            <option value="3">Wednesday</option>
            <option value="4">Thursday</option>
            <option value="5">Friday</option>
            <option value="6">Saturday</option>
            <option value="7">Sunady</option>
        </select>
</div>
<div class="form-group">Upload Images:</div>
<input type="file" id=" " class="form-control" name="images[]" multiple>
<br>
<div class="form-group">
    <label for=" ">Upload Icon:</label>
    <input type="file" name="icon" class="form-control">
</div>
<br>
<input type="submit" value="Submit Form" class="btn btn-info btn-lg">

</form>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.courseList').on('change', function() {
            let course_id = $(this).children('option:selected').val();
            loadAllWeeks(course_id);
        });

        function loadAllWeeks(cid) {
            $.ajax({
                url: "{{route('content.getAllWeeksOfSingleCourse')}}"
                , type: "GET"
                , data: {
                    "course_id": cid
                }
                , success: function(data) {

                    // console.log('success')


                    $('.weekList').html(data);

                },

                error: function(data) {

                    console.log('error');
                }
            });
        }


    });

</script>
@endsection
