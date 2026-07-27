<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id', 
        // other fillable fields...
    ];
public function supplier() {
    return $this->belongsTo(Supplier::class);
}

public function purchaseDetails() {
    return $this->hasMany(PurchaseDetail::class, 'purchase_id');
}



    public function project(){

        return $this->belongsTo(Project::class,'project_id');
    }
    public function product(){

        return $this->belongsTo(Product::class,'product_id');
    }
    protected static function booted()
    {
        static::deleted(function($deletedSaleRow){

            $deletedSaleRow->purchaseDetails()->delete();
        });
    }

    public function detailpurchases()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
