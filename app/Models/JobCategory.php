<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $table = "job_categories";
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
