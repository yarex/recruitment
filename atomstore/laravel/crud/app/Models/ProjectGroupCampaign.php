<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGroupCampaign extends Model
{
    public $timestamps = false;

    //
    public function group()
    {
        return $this->belongsTo('App\Models\ProjectGroup', 'project_group_id');
    }
    
}
