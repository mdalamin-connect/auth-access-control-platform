<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionDetail extends Model
{
    use HasFactory;


    public function requisition()
{
    return $this->belongsTo(Requisition::class,'requisition_id');
}

public function project(){

    return $this->belongsTo(Project::class,'project_id');

}

public function product(){

    return $this->belongsTo(Product::class,'product_id');

}

public function uom(){
    return $this->belongsTo(Uom::class,'uom_id');
}


}
