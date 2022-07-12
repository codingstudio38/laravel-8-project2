<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multiphoto extends Model
{
    use HasFactory;
    //public $timestamps=false; 
    protected $fillable = [
        'files',
        'content',
        'path',
    ]; 
    // public function setFilesAttribute($value)
    // {
    //     $this->attributes['files']= json_encode($value);
    // }
    // public function setPathAttribute($value)
    // {
    //     $this->attributes['path']= json_encode($value);
    // }
}
