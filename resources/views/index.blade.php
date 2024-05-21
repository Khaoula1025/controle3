@extends('Layouts.app')

@section('content')
<div class="container mt-5">
    <h1>All Students</h1>
    <div class="card shadow-sm my-3">
        <div class="card-header bg-primary text-white">
            Student Details
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                @foreach($students as $student)
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birthday</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->birthDate }}</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            <a href="#" class="btn btn-warning btn-sm">Update</a>
                            <a href="/{{$student->id}}" class="btn btn-warning btn-sm">Courses</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection