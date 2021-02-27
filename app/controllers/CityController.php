<?php


namespace App\Controllers;


use App\Models\City;

class CityController
{
    public function index()
    {
        return view('cities.index', ['cities' => City::all()]);
    }

    public function store()
    {
        [$validated, $errors] = validate([
            'name' => ['required', 'string'],
        ]);

        if (count($errors) > 0) {
            return view('cities.index');
        }

        City::insert($validated);

        return redirect("cities");
    }

    public function edit($id)
    {
        $city = City::findById($id);

        if ( ! $city) {
            return abort();
        }

        return view('cities.edit', compact('city'));
    }

    public function update()
    {
        [$validated, $errors] = validate([
            'name' => ['required', 'string'],
        ]);


        if (count($errors) > 0) {
            return view('cities.index');
        }

        City::update($validated);

        return redirect("cities");
    }

    public function destroy($id)
    {
        City::delete($id);

        return redirect("cities");
    }
}