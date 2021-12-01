<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppAudit extends Model
{
    use HasFactory;
    protected $table = 'audits';
    protected $fillable = ['user_type','user_id','auditable_type','event','old_values','new_values','ip_address'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
