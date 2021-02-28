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
    return require(__DIR__ . "/../app/views/_partials/_{$file}.php");
}

function abort()
{
    return view('404');
}

function old($value, $old)
{
    if (isset($old) && array_key_exists($value, $old)) {
        return $old[$value];
    }
}

function validate($data): array
{

    $validated = [];
    $errors = [];
    $old = [];

    foreach ($data as $field => $reqs) {

        if ($field !== 'photos') {

            $old[$field] = $_POST[$field];

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
                    case (strpos($req, 'max') !== false):
                        $maxValue = explode(':', $req)[1];
                        if ($_POST[$field] > $maxValue) {
                            $errors[$field] = "Filed cannot be bigger than {$maxValue}.";
                            continue 3;
                        }
                        break;
                    case (strpos($req, 'min') !== false):
                        $minValue = explode(':', $req)[1];
                        if ($_POST[$field] < $minValue) {
                            $errors[$field] = "Filed cannot be smaller than {$minValue}.";
                            continue 3;
                        }
                        break;
                }
            }

            $validated[$field] = $_POST[$field];

        } else {
            foreach ($reqs as $req) {
                switch ($req) {
                    case 'required':
                        if($_FILES['photos']['error'][0] === 4) {
                            $errors['photos'] = 'Field is required.';
                            continue 3;
                        }
                        break;
                    case 'extension':
                        $total = count($_FILES['photos']['name']);
                        for ($i = 0; $i < $total; $i++) {
                            if ($_FILES["photos"]["name"][$i] !== '') {
                                $fileInfo    = pathinfo($_FILES["photos"]["name"][$i]);
                                if ( ! ($fileInfo['extension'] === 'png' || $fileInfo['extension'] === 'jpg') ) {
                                    $errors['photos'] = 'Photos must be .png or .jpg.';
                                    continue 3;
                                }
                            }
                        }
                        break;
                }
            }
        }
    }

    return [$validated, $errors, $old];
}
