@extends('layouts.admin')

@section('content')
    <div class="container">

        <h2>New project</h2>

        <form action="{{ route('admin.projects.store') }}" method="post">
            @csrf

            {{-- title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="titleHelper" placeholder="title" value="{{ old('title') }}" />
                <small id="titleHelper" class="form-text text-muted">Write the project title</small>
            </div>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- slug --}}
            {{-- lo slug lo genero dietro le quinte, non devo inserirlo io --}}

            {{-- project image --}}
            <div class="mb-3">
                <label for="project_image" class="form-label">project_image</label>
                <input type="text" class="form-control @error('project_image') is-invalid @enderror" name="project_image"
                    id="project_image" aria-describedby="project_imageHelper" placeholder="project_image"
                    value="{{ old('project_image') }}" />
                <small id="project_imageHelper" class="form-text text-muted">Add a link to project image</small>
            </div>
            @error('project_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- tools --}}
            <div class="mb-3">
                <label for="tools" class="form-label">tools</label>
                <input type="text" class="form-control @error('tools') is-invalid @enderror" name="tools"
                    id="tools" aria-describedby="toolsHelper" placeholder="tools" value="{{ old('tools') }}" />
                <small id="toolsHelper" class="form-text text-muted">Write the tools you used for the project</small>
            </div>
            @error('tools')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- creation date --}}
            <div class="mb-3">
                <label for="creation_date" class="form-label">creation_date</label>
                <input type="date" class="form-control @error('creation_date') is-invalid @enderror" name="creation_date"
                    id="creation_date" aria-describedby="creation_dateHelper" placeholder="creation_date"
                    value="{{ old('creation_date') }}" />
                <small id="creation_dateHelper" class="form-text text-muted">Add the date the project was created</small>
            </div>
            @error('creation_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            {{-- description --}}
            <div class="mb-3">
                <label for="description" class="form-label @error('description') is-invalid @enderror">description</label>
                <textarea class="form-control" name="description" id="description" rows="8">{{ old('description') }}</textarea>
            </div>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit">Add project</button>


        </form>
    </div>
@endsection
