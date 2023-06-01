<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function activities(){
        return $this->hasMany(TrashActivity::class,'trash_id');
    }
}
