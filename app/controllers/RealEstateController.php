<?php

namespace App\Controllers;

use App\Models\AdType;
use App\Models\City;
use App\Models\Photo;
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

        $real_estate_id = RealEstate::insert($_POST);

        if ( ! file_exists(__DIR__ . "/../../uploads")) {
            mkdir(__DIR__ . "/../../uploads");
        }
        $total = count($_FILES['photos']['name']);
        for( $i=0 ; $i < $total ; $i++ ) {
            $tmpFilePath = $_FILES['photos']['tmp_name'][$i];
            if ($tmpFilePath != ""){
                $fileInfo = pathinfo($_FILES["photos"]["name"][$i]);
                $newFilePath = "uploads/" . uniqid() . '.' . $fileInfo['extension'];
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                    Photo::insert(['real_estate_id' => $real_estate_id, 'path' => "/" . $newFilePath]);
                }
            }
        }

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

    public function update()
    {
        RealEstate::update($_POST);

        return redirect("real-estates");
    }

    public function destroy($id)
    {
        RealEstate::delete($id);

        return redirect("real-estates");
    }
}