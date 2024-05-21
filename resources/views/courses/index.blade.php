@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Students</h1>
    <ul>
        @foreach($students as $student)
        <li><a href="{{ route('students.show', $student->id) }}">{{ $student->first_name }} {{ $student->last_name }}</a></li>
        @endforeach
    </ul>
</div>
@endsection