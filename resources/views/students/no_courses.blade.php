@extends('Layouts.app')
@section('content')

<div>
    <h1>hello {{$student->first_name}}</h1>
    <p>you are not enrolled in any course yet </p>
    <a href="{{ route('enroll.form', $student->id) }}">Add Course</a>
</div>