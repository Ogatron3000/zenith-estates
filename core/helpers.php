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
