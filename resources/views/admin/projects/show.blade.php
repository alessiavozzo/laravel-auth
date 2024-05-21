@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card w-50 mx-auto">
            <img class="card-img-top" src="{{ $project->project_image }}" alt="{{ $project->title }}" />
            <div class="card-body">
                <h4 class="card-title text-center">{{ $project->title }}</h4>
                <p class="card-text"><strong>ID: </strong>{{ $project->id }}</p>
                <p class="card-text"><strong>SLUG: </strong>{{ $project->slug }}</p>
                <p class="card-text"><strong>PROJECT LINK: </strong>{{ $project->project_link }}</p>
                <p class="card-text"><strong>GITHUB LINK: </strong>{{ $project->github_link }}</p>
                <p class="card-text"><strong>DESCRIPTION: </strong>{{ $project->description }}</p>
                {{-- <p class="card-text"><strong>TOOLS: </strong>{{ $project->tools }}</p> --}}
                <p class="card-text"><strong>CREATION DATE: </strong>{{ $project->creation_date }}</p>
            </div>
        </div>
    </div>
@endsection
