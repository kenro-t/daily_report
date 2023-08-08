<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    use HasFactory;
    // fillableでDB更新時に登録したいデータのホワイトリストが設定できる
    protected $fillable = ['posted_date','user_id'];
    // guardedでDB更新時に登録したくないデータのブラックリストが設定できる
    // protected $guarded = ['name'];

    public function dailyReportDetails()
    {
        return $this->hasMany('App\Models\DailyReportDetail');
    }

    public function dailyReportDetailEdit()
    {
        return $this->hasOne('App\Models\DailyReportDetail');
    }
}
