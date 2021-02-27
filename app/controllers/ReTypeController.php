<?php


namespace App\Controllers;


use App\Models\ReType;

class ReTypeController
{
    public function index()
    {
        return view('re-types.index', ['re_types' => ReType::all()]);
    }

    public function store()
    {
        [$validated, $errors] = validate([
            'name' => ['required', 'string'],
        ]);

        if (count($errors) > 0) {
            return view('re-types.index');
        }

        ReType::insert($validated);

        return redirect("re-types");
    }

    public function edit($id)
    {
        $re_type = ReType::findById($id);

        if ( ! $re_type) {
            return abort();
        }

        return view('re-types.edit', compact('re_type'));
    }

    public function update()
    {
        [$validated, $errors] = validate([
            'name' => ['required', 'string'],
        ]);


        if (count($errors) > 0) {
            return view('re-types.index');
        }

        ReType::update($validated);

        return redirect("re-types");
    }

    public function destroy($id)
    {
        ReType::delete($id);

        return redirect("re-types");
    }
}