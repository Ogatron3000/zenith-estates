<?php

namespace App\Models;

use Core\Database\Database;
use Core\Database\QueryBuilder;

class RealEstate extends QueryBuilder
{
    public function city($id)
    {
        return RealEstate::hasOne('City', 'cities', $id, 'name');
    }

    public function ad_type($id)
    {
        return RealEstate::hasOne('AdType', 'ad_types', $id, 'name');
    }

    public function re_type($id)
    {
        return RealEstate::hasOne('ReType', 're_types', $id, 'name');
    }

    public function photos($id)
    {
        return RealEstate::hasMany('Photo', 'photos', $id);
    }
}