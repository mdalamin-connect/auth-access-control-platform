<?php

namespace App\Models;

use App\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{   
    protected $fillable = [
        'user_id', 'activity_type','ip_address',
    ];

    public $timestamps = true; // Include timestamps


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
