@extends('layout.app')

@section('content')

<div class="table mt-5">
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Program</th>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$student['id']}}</td>
                    <td>{{$student['name']}}</td>
                    <td>{{$student['program']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@include('posts.test')