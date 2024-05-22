<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(5);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        if($request->has('project_image')){
            $img_path = Storage::put('uploads', $val_data['project_image']);
            $val_data['project_image'] = $img_path;
        }

        Project::create($val_data);
        return to_route('admin.projects.index')->with('message', "Project created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        if($request->has('project_image')){
            if($project->project_image){
                Storage::delete($project->project_image);
            }
            $img_path = Storage::put('uploads', $val_data['project_image']);
            $val_data['project_image'] = $img_path;
        }

        $project->update($val_data);
        return to_route('admin.projects.index')->with('message', "Project $project->title updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('message', "Project $project->title deleted successfully");
    }
}
