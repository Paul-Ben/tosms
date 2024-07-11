@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Applications</div>

                    <div class="card-body">
                        <a href="{{route('application.create')}}" class="btn btn-primary mb-3">Add Application</a>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Application ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($applications as $application)
                                    <tr>
                                        <td>{{ $application->applicationId }}</td>
                                        <td>{{ $application->firstname.' '.$application->middlename.' '.$application->lastname }}</td>
                                        <td>{{ $application->email }}</td>
                                        <td>{{ $application->phone }}</td>
                                        <td>{{ $application->gender }}</td>
                                        <td>
                                           
                                            <form action="{{ route('application.destroy', $application) }}"
                                                method="POST">
                                                <a href="{{ route('application.show', $application) }}"
                                                    class="btn btn-primary">View</a>
                                                <a href="{{ route('application.edit', $application) }}"
                                                    class="btn btn-warning">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <h3>No applications yet.</h3>
                                @endempty
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

