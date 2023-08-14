<?php

function createPassword(string $password)
{
    return password_hash($password, PASSWORD_BCRYPT, [
        'cost' => 10
    ]);
}

function verifyPassword(string $password, string $hashPassword)
{
    return password_verify($password, $hashPassword);
}

function getDefault($data, $key, $def = '')
{
    if (isset($data[$key])) {
        return $data[$key];
    }

    return $def;
}

function isCurrentUrl($path)
{
    return '/' . substr(uri_string(), 0, strlen($path)) == $path;
}

function labelsPoints($data, $text)
{
    if (count($data) == 0) {
        return '';
    }

    $html = '';
    foreach ($data as $key => $val) {
        $html .= '💠 ' . $val['point'] . ' ' . $text . ' ' . $val['title'] . '<br/>';
    }

    return $html;
}

function sumPoints($data)
{
    $sum = 0;
    foreach ($data as $key => $val) {
        $sum += $val['point'];
    }

    return $sum;
}

function isProduction()
{
    return env('CI_ENVIRONMENT') == 'production';
}

if (!function_exists('getJwtName')) {
    function getJwtName()
    {
        return "__com__";
    }
}

if (!function_exists('getJwtKey')) {
    function getJwtKey()
    {
        return 'DXJwUF4PN3=gmBd-5mwpupDQ';
    }
}

if (!function_exists('generateID')) {
    function generateID()
    {
        $time = uniqid();
        $random = base_convert(rand(), 10, 36);
        return $time . '-' . $random;
    }
}

if (!function_exists('isValidDate')) {
    function isValidDate($date, array $formats)
    {
        if (strtotime($date)) {
            return true;
        }

        foreach ($formats as $format) {
            $d = \DateTime::createFromFormat($format, $date);
            $isValid = $d && $d->format($format) == $date;
            if ($isValid) return true;
        }

        return false;
    }
}
