<?php

namespace App\Controllers;

use App\Models\AdType;
use App\Models\City;
use App\Models\Photo;
use App\Models\RealEstate;
use App\Models\ReType;
use Core\Request;

class RealEstateController
{

    public function index()
    {
        $real_estates = RealEstate::all();
        $cities   = City::all();
        $ad_types = AdType::all();
        $re_types = ReType::all();

        return view('real_estates.index',
            compact('real_estates', 'cities', 'ad_types', 're_types'));
    }

    public function search()
    {
        $real_estates = RealEstate::search(Request::query());
        $cities   = City::all();
        $ad_types = AdType::all();
        $re_types = ReType::all();

        return view('real_estates.index',
            compact('real_estates', 'cities', 'ad_types', 're_types'));
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
        $cities   = City::all();
        $ad_types = AdType::all();
        $re_types = ReType::all();

        return view('real_estates.create',
            compact('cities', 'ad_types', 're_types'));
    }

    public function store()
    {
        [$validated, $errors, $old] = validate([
            'city_id' => ['required', 'int'],
            'ad_type_id' => ['required', 'int'],
            're_type_id' => ['required', 'int'],
            'area' => ['required', 'int'],
            'price' => ['required', 'int'],
            'year' => ['required', 'int'],
            'description' => ['required', 'string']
        ], true);

        if (count($errors) > 0) {
            $cities   = City::all();
            $ad_types = AdType::all();
            $re_types = ReType::all();
            return view('real_estates.create', compact('errors', 'old', 'cities', 'ad_types', 're_types'));
        }

        $real_estate_id = RealEstate::insert($validated);

        $this->store_photos($real_estate_id);

        return redirect("real-estates");
    }

    public function edit($id)
    {
        $real_estate = RealEstate::findById($id);

        if ( ! $real_estate) {
            return abort();
        }

        $cities   = City::all();
        $ad_types = AdType::all();
        $re_types = ReType::all();

        return view('real_estates.edit',
            compact('real_estate', 'cities', 'ad_types', 're_types'));
    }

    public function update($id)
    {
        [$validated, $errors] = validate([
            'id' => ['required', 'int'],
            'city_id' => ['required', 'int'],
            'ad_type_id' => ['required', 'int'],
            're_type_id' => ['required', 'int'],
            'area' => ['required', 'int'],
            'price' => ['required', 'int'],
            'year' => ['required', 'int'],
            'description' => ['required', 'string']
        ]);

        if (count($errors) > 0) {
            $real_estate = RealEstate::findById($id);
            $cities   = City::all();
            $ad_types = AdType::all();
            $re_types = ReType::all();

            return view('real_estates.edit', compact('errors', 'real_estate', 'cities', 'ad_types', 're_types'));
        }

        RealEstate::update($validated);

        $this->store_photos($id);

        return redirect("real-estates");
    }

    public function destroy($id)
    {
        RealEstate::delete($id);

        return redirect("real-estates");
    }

    private function store_photos($real_estate_id): void
    {
        if ( ! file_exists(__DIR__ . "/../../uploads")) {
            mkdir(__DIR__ . "/../../uploads");
        }

        $total = count($_FILES['photos']['name']);

        for ($i = 0; $i < $total; $i++) {
            $tmpFilePath = $_FILES['photos']['tmp_name'][$i];
            if ($tmpFilePath !== "") {
                $fileInfo    = pathinfo($_FILES["photos"]["name"][$i]);
                $newFilePath = "uploads/" . uniqid() . '.' . $fileInfo['extension'];
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    Photo::insert([
                        'real_estate_id' => $real_estate_id,
                        'path'           => "/" . $newFilePath,
                    ]);
                }
            }
        }
    }

}