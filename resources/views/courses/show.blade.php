@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $student->first_name }} {{ $student->last_name }}</h1>
    <p>Birth Date: {{ $student->birth_date }}</p>
    <h2>Courses</h2>
    <ul>
        @foreach($student->courses as $course)
        <li>{{ $course->title }} - Note: {{ $course->pivot->note }} - Date: {{ $course->pivot->date_exam }}</li>
        @endforeach
    </ul>
</div>
@endsection