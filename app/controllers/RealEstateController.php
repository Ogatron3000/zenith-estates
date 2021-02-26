<?php

namespace App\Controllers;

use App\Models\AdType;
use App\Models\City;
use App\Models\RealEstate;
use App\Models\ReType;

class RealEstateController
{

    public function index()
    {
        return view('real_estates.index', RealEstate::all());
    }

    public function show($id)
    {
        $real_estate = RealEstate::findById($id);

        if ( ! $real_estate) {
            return abort();
        }

        return view('real_estates.show', compact('real_estate'));
    }

    public function create()
    {
        $cities = City::all();
        $ad_types = AdType::all();
        $re_types = ReType::all();

        return view('real_estates.create', compact('cities', 'ad_types', 're_types'));
    }

    public function store()
    {
        RealEstate::insert($_POST);

        return redirect("real-estates");
    }

    public function edit($id)
    {
        $real_estate = RealEstate::findById($id);

        if ( ! $real_estate) {
            return abort();
        }

        $cities = City::all();
        $ad_types = AdType::all();
        $re_types = ReType::all();

        return view('real_estates.edit', compact('real_estate', 'cities', 'ad_types', 're_types'));
    }

    public function destroy($id)
    {
        RealEstate::delete($id);

        return redirect("real-estates");
    }
}