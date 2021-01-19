<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset_categories extends Model
{
    protected $guarded = [''];


     public function children()
    {
        return $this->hasMany('App\asset_categories', 'asc_parent_asset_categories_id', 'asc_id');
    }

    public function parent()
    {
        return $this->hasOne('App\asset_categories', 'asc_id', 'asc_parent_asset_categories_id')->withDefault([
            'asc_name' => '']);
    }

}
