@extends('Layouts.app')

@section('content')
<div>
    @if($student->courses->isEmpty())

    <p>No courses enrolled.</p>
    @else
    <table>
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
                <td>{{$course->pivot->}}</td>
                <td>{{$course->pivot->date_exam}}</td>
                <td>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <a href="{{ route('enroll', $student->id) }}">Add Course</a>
</div>
@endsection