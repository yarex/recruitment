<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGroup extends Model
{
    public $timestamps = false;

    //
    public function campaigns()
    {
        return $this->hasMany('App\Models\ProjectGroupCampaign');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
}
