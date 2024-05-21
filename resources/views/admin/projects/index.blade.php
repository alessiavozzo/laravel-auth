@extends('layouts.admin')

@section('content')
    <section id="all_projects">

        <div class="projects_header bg-dark py-2">
            <div class="container d-flex justify-content-between align-items-center">
                <h1 class="text-light">My Projects</h1>
                <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Add new project</a>
            </div>
        </div>

        <div class="container py-5">
            {{-- @dd($projects) --}}

            @include('admin.partials.session-messages')
            <div class="table-responsive rounded">
                <table class="table table-light table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">SLUG</th>
                            <th scope="col">PROJECT IMAGE</th>
                            {{-- <th scope="col">TOOLS</th> --}}
                            <th scope="col">PROJECT LINK</th>
                            <th scope="col">GITHUB LINK</th>
                            <th scope="col">CREATION DATE</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($projects as $project)
                            <tr class="align-middle">
                                <td scope="row">{{ $project->id }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->slug }}</td>
                                <td>
                                    <img width="100" src="{{ $project->project_image }}" alt="{{ $project->title }}">
                                </td>
                                {{-- <td>{{ $project->tools }}</td> --}}
                                <td><a href="{{ $project->project_link }}">Project link</a></td>
                                <td><a href="{{ $project->github_link }}">Github link</a></td>
                                <td>{{ $project->creation_date }}</td>
                                <td style="width: 15%">
                                    <a class="btn btn-primary" href="{{ route('admin.projects.show', $project) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project) }}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $project->id }}">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>

                                    @include('admin.partials.modal-delete')

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

    </section>
@endsection
