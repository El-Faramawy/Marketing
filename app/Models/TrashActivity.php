<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashActivity extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getTimeAttribute(){
        return date('Y-m-d H:i:s' ,strtotime($this->attributes['time'] . '+2 hour'));
    }
    public function trash(){
        return $this->belongsTo(Trash::class,'trash_id');
    }

}
