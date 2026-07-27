<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UseProductDetail extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function task(){
        return $this->belongsTo(Task::class,'task_id');
    }
    public function uom(){
        return $this->belongsTo(Uom::class,'uom_id');
    }
    public function useProduct() {
    return $this->belongsTo(UseProduct::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
