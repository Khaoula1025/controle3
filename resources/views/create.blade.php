@extends('Layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Enroll Student</h1>
    <form action="{{ route('enroll', ['id' => $student_id]) }}" method="POST" class="mb-3">
        @csrf
        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <select name="course_id" id="courses" class="form-select">
                <!-- Options will be populated dynamically -->
            </select>
        </div>
        <div class="mb-3">
            <label for="note_exam" class="form-label">Note</label>
            <input type="number" name="note_exam" class="form-control">
        </div>
        <div class="mb-3">
            <label for="date_exam" class="form-label">Date</label>
            <input type="date" name="date_exam" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">attach</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.get("/api/courses", function(data) {
            var select = $("#courses");
            select.empty(); // Remove current options
            $.each(data, function(index, course) {
                select.append("<option value='" + course.id + "'>" + course.title + "</option>");
            });
            console.log(data);
        });
    });
</script>
@endsection