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
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function dd($value)
{
    return die(var_dump($value));
}


function partial($file)
{
    return require(__DIR__ . "/../app/views/partials/_{$file}.php");
}

function abort()
{
    return view('404');
}
