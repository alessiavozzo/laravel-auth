@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- @dd($projects) --}}
        <h1>My Projects</h1>

        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('message') }}
            </div>
        @endif

        <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Add new project</a>

        <div class="table-responsive">
            <table class="table table-light">
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
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>
                                <img width="100" src="{{ $project->project_image }}" alt="{{ $project->title }}">
                            </td>
                            {{-- <td>{{ $project->tools }}</td> --}}
                            <td>{{ $project->project_link }}</td>
                            <td>{{ $project->github_link }}</td>
                            <td>{{ $project->creation_date }}</td>
                            <td>
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

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $project->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                {{-- title --}}
                                                <h5 class="modal-title" id="modalTitleId-{{ $project->id }}">
                                                    You are deleting {{ $project->title }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            {{-- body - longer msg --}}
                                            <div class="modal-body">You are about to delete this record. Do you want to
                                                proceed?</div>

                                            {{-- buttons --}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>

                                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

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
