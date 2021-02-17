<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restore extends Model
{
	use SoftDeletes;
    protected $guarded = [];
    protected $primaryKey = 'rst_id';
    protected $dates = ['deleted_at'];
}
