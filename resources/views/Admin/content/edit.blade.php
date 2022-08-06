@extends('admin.content.main.contentmaster')

@section('title',' Edit Content')

@section('body')

<div class="container">
    <a href="{{route('content.index')}}" class="btn btn-outline-warning btn-lg">Back to Content List</a>
    <br><br><br>
    <div class="row mb-4">
        <p>icon:</p>
        <form action=" " method="">
            @csrf
            @method('DELETE')
            <button class="btn text-danger" value="{{$content->id}}" >X</button>
            {{-- <input type="text" value="{{$content->id}}" class="contentID">
            <input type="text" value="{{$icon->id}}" class="iconID"> --}}
            <img src="{{url('icon/',$content->icon)}}" class="img-responsive" style="max-height:100px;max-width:100px" alt="" alt="">
        </form>
    </div>

    <div class="row mb-4">
        @if(count($content->images)>0)
        <p>Images:</p>
        @foreach($content->images as $img)
        <form action="" method="">
            @csrf
            @method('DELETE')
           <button class="btn text-danger" value="{{$content->id}}" image_id="{{$img->id}}" class="imageDeleteButton">X</button>
            <input type="text" value="{{$content->id}}" class="contentID">
            <input type="text" value="{{$img->id}}" class="imageID">
            <img src="{{url('images/',$img->image)}}" class="img-responsive" style="max-height:100px;max-width:100px" alt="">
        </form>
        @endforeach
        @endif
    </div>
    </form>
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
            <form action="" method="" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Course:</label>
                    <input type="hidden" value="{{isset($content->course_id) ? $content->course_id : '-1'}}" class="courseID">
                    <select name="course_id" class="form-control courseList">
                        <option value="{{$content->course_id}}">{{$content->title}}</option>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for=" title">Title:</label>
                    <input type="text" name="title" id=" " class="form-control" value="{{$content->title}}">
                </div>
                <div class="form-group">
                    <label for=" ">Description:</label>
                    <input type="text" name="description" id=" " class="form-control" placeholder="Enter Description" value="{{$content->description}}">
                </div>
                <div class="form-group">
                    <label for="">Weeks:</label>
                    <select name="weeks" class="form-control">
                        <option value="{{isset($content) ? $content->weeks : ''}}">{{isset($content) ? $content->weeks : 'Select'}}</option>
                        <optgroup label="weeks" class="weekList">

                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Days</label>
                    <select class="form-control" name="days" value="{{$content->id}}">

                        <option value="1" {{($content->days==1)? 'selected':''}}>Monday</option>
                        <option value="2" {{($content->days==2)? 'selected':''}}>Tuesday</option>
                        <option value="3" {{($content->days==3)? 'selected':''}}>Wednesday</option>
                        <option value="4" {{($content->days==4)? 'selected':''}}>Thursday</option>
                        <option value="5" {{($content->days==5)? 'selected':''}}>Friday</option>
                        <option value="6" {{($content->days==6)? 'selected':''}}>Saturday</option>
                        <option value="7" {{($content->days==7)? 'selected':''}}>Sunady</option>
                    </select>
                </div>
                <div>
                    <label class="m-2">Icon Image</label>
                    <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="icon">
                    <input type="hidden" name="icon" value="{{$content->icon}}">
                </div>
                <div>
                    <label class="m-2">Images</label>
                    <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>
                    <input type="hidden" name="images[]" value="{{$content->images}}">
                    <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                </div>



        </div>

    </div>
</div>








{{-- <div class="form-group">

                    <input type="hidden" name="my_icon" value="{{$content->icon}}">

<br>
<input type="submit" value="Submit Form" class="btn btn-info btn-lg"> --}}

{{-- < class="col-lg-6 bg--dark">
        < class="d-flex justify-content-center">

            <div>
                <h2 class="text-center text-white"> profile Icon</h2>
                <img src="{{url('upload/',$content->icon)}}" alt="" id="editicon" class="rounded">

</div> --}}

@endsection
@section('scripts')

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let courseID = $('.courseID').val();
        if (courseID != -1) {
            loadAllWeeks(courseID);
        }

        $('.courseList').on('change', function() {
            let course_id = $(this).children('option:selected').val();
            loadAllWeeks(course_id);
        });
        function loadAllWeeks(cid) {
            $.ajax({
                url: "{{route('content.editAllWeeksOfSingleCourse')}}"
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

        {{-- $('.iconDeleteButton').on('click',function(){

              let content_id = $(this).attr('content_id');
              let icon_id = $(this).attr('icon_id');
              alert(content_id);
              alert(icon_id);
        }); --}}
        $('.imageDeleteButton').on('click',function(){

              let content_id = $(this).attr('content_id');
              let image_id = $(this).attr('image_id');
             // alert(content_id);
              //alert(image_id);
        });


    });

</script>
@endsection
