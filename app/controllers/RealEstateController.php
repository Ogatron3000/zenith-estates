<?php

namespace App\Controllers;

use App\Models\RealEstate;

class RealEstateController
{

    public function index()
    {
        return RealEstate::all();
    }

}