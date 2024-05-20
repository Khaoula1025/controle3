<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll Student in Course</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <form action="{{ route('enroll') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <label for="course">Course</label>
            <select name="course_id" id="courses">
                <!-- Options will be populated dynamically -->
            </select>
        </div>
        <div>
            <label for="note">Note</label>
            <input type="number" name="note">
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" name="exam_date">
        </div>
        <button type="submit">Attach</button>
    </form>

    <script>
        $(document).ready(function() {
            $.get("/api/courses", function(data) {
                var select = $("#courses");
                select.empty(); // Remove current options
                $.each(data.courses, function(key, value) {
                    select.append("<option value='" + key + "'>" + value + "</option>");
                });
            });
        });
    </script>
</body>

</html>