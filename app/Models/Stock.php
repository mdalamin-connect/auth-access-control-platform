<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'product_id',
        'qty',
        'uom_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function uom(){
        return $this->belongsTo(Uom::class,'uom_id');
    }
    public function transactionType(){
        return $this->belongsTo(TransactionType::class,'transaction_type_id');
    }

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
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
}

