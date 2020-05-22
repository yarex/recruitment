<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Project;
use \App\Models\ProjectGroup;
use \App\Models\ProjectGroupCampaign;

class ProjectController extends Controller
{
    // READ
    public function index()
    {
        $projects = Project::paginate(20);

        return view('projects_list', [
            'projects' => $projects
        ]);
    }

    public function show($id) {
        $campaign = ProjectGroupCampaign::findOrFail($id);
        
        return view('show_campaign', [
            'campaign' => $campaign
        ]);
    }


    // CREATE
    public function create()
    {
        return view('create_campaign');
    }

    public function store(Request $req)
    {
        
    }
    

    // UPDATE
    public function edit($id)
    {
        $campaign = ProjectGroupCampaign::findOrFail($id);
        
        return view('edit_campaign', [
            'campaign' => $campaign
        ]);
    }

    public function update($id, Request $req)
    {
        $campaign = ProjectGroupCampaign::findOrFail($id);
        $campaign->name = $req->campaign_name;
        $campaign->date_start = $req->date_start;

        $group = ProjectGroup::findOrFail($campaign->group->id);
        $group->name = $req->group_name;

        $project = Project::findOrFail($campaign->group->project->id);
        $project->name = $req->project_name;
        $project->website = $req->website;
        $project->active = $req->active;
        
        $campaign->save();
        $group->save();
        $project->save();

        return redirect('/projects');
    }


    // DELETE
    public function destroy($id)
    {
        $campaign = ProjectGroupCampaign::findOrFail($id);
        $campaign->delete();

        return redirect('/projects');
    }

    
}
