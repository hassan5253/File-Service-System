<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model{
    protected $table = 'files';
    protected $fillable = ['userId','file_name','file_path','status','timestamp'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
