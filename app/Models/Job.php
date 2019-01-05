<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "jobs";
    protected $guarded = [];

    public function getJobType()
    {
        return $this->belongsTo(JobType::class, 'job_type', 'id');
    }


    /**
     * A Job belongs to a user / Company
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->hasMany(JobCategory::class);
    }
}
