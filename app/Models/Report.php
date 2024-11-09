<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_type',
        'generated_at',
        'generated_by',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);

    }
}
