@extends('Layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Courses Enrolled
                </div>
                <button class='btn btn-primary'><a class='text-white' href="{{ route('enroll.form', $student->id) }}">Add Course</a> </button>

                <div class="card-body">
                    @if($student->courses->isEmpty())
                    <p class="text-muted">No courses enrolled.</p>
                    @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Note</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($student->courses as $course)
                            <tr>
                                <td>{{$course->id}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->pivot->note_exam}}</td>
                                <td>{{$course->pivot->date_exam}}</td>
                                <td>
                                    <form action="{{ route('destroy', ['id' => $student->id, 'course_id' => $course->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary btn-sm">Detach</button>
                                    </form>
                                    <button class="btn btn-primary btn-sm"><a href="{{route('edit',['id'=>$student->id,'course_id'=>$course->id])}}" class="text-white">Update</a></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection