<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id', // Add purchase_id to fillable fields
        'product_id',
        'qty',
        'price',
        'uom_id',
        'vat',
        'discount',
        // Add other fillable fields if any
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class,'purchase_id');
    }

    public function project()
    
    {
        return $this->belongsTo(Project::class,'project_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class,'uom_id');
    }
}
