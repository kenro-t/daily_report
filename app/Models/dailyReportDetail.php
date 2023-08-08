<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReportDetail extends Model
{
    use HasFactory;
    // public $incrementing = false;

    // protected $fillable = ['project_title','detail','daily_report_id'];
    protected $fillable = ['project_title','detail'];

    // public function dailyReport()
    // {
    //     return $this->belongs_to('App\Models\DailyReport');
    // }
}
