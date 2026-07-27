<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    public function purchase(){

        return $this->hasMany(Purchase::class,'project_id');
    }

    public function requisitions(){
        return $this->hasMany(RequisitionDetail::class,'project_id');
    }

    public function purchaseDetails(){
        return $this->hasMany(PurchaseDetail::class,'project_id');
    }

    public function stock(){
        return $this->hasMany(Project::class,'project_id');
    }

    public function useProductDetails(){
        return $this->hasMany(UseProductDetail::class,'project_id');
    }
    
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

// Enable automatic timestamp handling
protected $guarded = ['id'];
protected $casts = [
    'descriptions' => 'string', 
];

}
