@extends('/layouts.app_course')
@section('title','Course Page Form')
@section('content')


    <div class="container mt-4">
        <div class="col-md-12">
            <h1>Update Course</h1>

            <div align="right">
                <a href="{{route('home')}}">
                    <button class="btn btn-success">Back</button>
                </a>
            </div>
            <br>

        @if(session()->has('status'))                              <!-- alert message -->
            <div class="alert alert-success">{{session('status')}}</div>
        @endif

        @if($errors->any())      <!-- errors message -->
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
            @endif

            <form action="{{route('courseUpdatePost',['id'=>$course->id])}}" method="post"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <input class="form-control" value="{{$course->course_title}}" type="text" name="course_title"
                           placeholder="Title">
                </div>

                <div class="mb-3">
                    <input class="form-control" value="{{$course->course_content}}" type="text" name="course_content"
                           placeholder="Content">
                </div>
                <div class="mb-3">
                    <input class="form-control" value="{{$course->course_must}}" type="number" name="course_must"
                           placeholder="Must">
                </div>
                <button class="btn btn-primary" type="submit">Update Course</button>

            </form>

        </div>
    </div>



@endsection
