<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 'codename'
    ];

    public function module()
    {
    	return $this->belongsTo(Module::class);
    }

    public function groups()
    {
    	return $this->belongsToMany(Group::class);
    }
}
