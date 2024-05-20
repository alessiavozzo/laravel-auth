@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- @dd($projects) --}}
        <h1>My Projects</h1>

        <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Add new project</a>

        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">SLUG</th>
                        <th scope="col">PROJECT IMAGE</th>
                        <th scope="col">TOOLS</th>
                        <th scope="col">CREATION DATE</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>
                                <img width="150" src="{{ $project->project_image }}" alt="{{ $project->title }}">
                            </td>
                            <td>{{ $project->tools }}</td>
                            <td>{{ $project->creation_date }}</td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}">View</a>
                                <a href="{{ route('admin.projects.edit', $project) }}">Edit</a>


                            </td>
                        </tr>

                    @empty

                        <tr class="">
                            <td scope="row" colspan="6">No projects found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $projects->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
