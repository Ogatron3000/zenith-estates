<?php

function view($file, $data = [])
{
    extract($data);

    return require "app/views/{$file}";
}

function redirect($path)
{
    header("Location: /{$path}");
}

function dd($value)
{
    return die(var_dump($value));
}