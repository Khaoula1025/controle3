@extends('Layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Course</h1>
    <form action="{{ route('update', ['id' => $student->id, 'course_id' => $course->id]) }}" method="POST" class="mb-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <select name="course_id" id="courses" class="form-select">
                @foreach($courses as $courseItem)
                <option value="{{ $courseItem->id }}" {{ $courseItem->id == $course->id ? 'selected' : '' }}>
                    {{ $courseItem->title }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="note_exam" class="form-label">Note</label>
            <input type="number" name="note_exam" class="form-control" value="{{ $course->pivot->note_exam }}">
        </div>
        <div class="mb-3">
            <label for="date_exam" class="form-label">Date</label>
            <input type="date" name="date_exam" class="form-control" value="{{ $course->pivot->date_exam }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection