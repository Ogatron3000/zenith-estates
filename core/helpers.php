<?php

function view($file, $data = [])
{
    extract($data);

    if (strpos($file, '.') !== false) {
        $file = preg_replace('/\./', '/', $file);
    }

    return require "app/views/{$file}.php";
}

function redirect($path)
{
    header("Location: /{$path}");
}

function dd($data)
{
    return die(highlight_string("<?php\n\$value =\n" . var_export($data, true) . ";\n?>"));
    //    return die('<pre>' . var_export($data, true) . '</pre>');
}


function partial($file)
{
    return require(__DIR__ . "/../app/views/partials/_{$file}.php");
}

function abort()
{
    return view('404');
}

function validate($data) {

    $validated = [];
    $errors = [];

    foreach ($data as $field => $reqs) {
        foreach ($reqs as $req) {
            switch ($req) {
                case 'required':
                    if ( ! isset($_POST[$field]) || empty($_POST[$field])) {
                        $errors[$field] = 'Field is required.';
                        continue 3;
                    }
                    break;
                case 'int':
                    if ( ! is_numeric($_POST[$field])) {
                        $errors[$field] = 'Field must be numeric.';
                        continue 3;
                    }
                    break;
                case 'string':
                    if ( ! is_string($_POST[$field])) {
                        $errors[$field] = 'Field must be text.';
                        continue 3;
                    }
                    break;
            }
        }
        if ( ! array_key_exists($field, $errors)) {
            $validated['id'] = $_POST['id'];
            $validated[$field] = $_POST[$field];
        }
    }

        if (array_key_exists('photos', $_FILES)) {
            if ($_FILES['photos']['error'][0] === 4) {
                $errors['photos'] = 'Field is required.';
            } else {
                $total = count($_FILES['photos']['name']);
                for ($i = 0; $i < $total; $i++) {
                    $fileInfo    = pathinfo($_FILES["photos"]["name"][$i]);
                    if ( ! ($fileInfo['extension'] === 'png' || $fileInfo['extension'] === 'jpg') ) {
                        $errors['photos'] = 'Photos must be .png or .jpg.';
                    }
                }
            }
    }

    return [$validated, $errors];
}
