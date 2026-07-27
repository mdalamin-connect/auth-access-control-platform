<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;

    public function details()
{
    return $this->hasMany(RequisitionDetail::class);
}

public function requisitionItems(){
        return $this->hasMany(RequisitionDetail::class,'requisition_id');
}

public function user(){
        return $this->belongsTo(User::class,'user_id');
}
public function roles()
{
    return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id');
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
