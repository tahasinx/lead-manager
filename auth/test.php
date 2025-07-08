<?php

$spclChar = array("!", "#", "$", "%", "^", "&", "*", "(", ")");

$string = "tahas!in#";

function strlength($str)
{
    for ($i = -1; isset($str[++$i]););
    return $i;
}

$length = strlength($string);

$reverse = '';
$i = 0;

while (!empty($string[$i])) {

    $reverse = $string[$i] . $reverse;
    $i++;
}

echo $reverse;

echo '<br>';
echo '<br>';
echo '<br>';

function reverse_string($string)
{
    $len = strlen($string);
    $string_to_array = [];
    $special_characters = [];
    for ($i = 0; $i < $len; $i++) {
        if (preg_match('#[^a-zA-Z0-9]#', $string[$i])) {
            $pos = stripos($string, $string[$i]);
            $special_characters[$pos] = $string[$i];
        } else {
            array_push($string_to_array, $string[$i]);
        }
        $reversed_string = array_reverse($string_to_array);
    }

    foreach ($special_characters as $key => $value) {
        array_splice($reversed_string, $key, 0, $value);
    }

    $array_to_string =  implode('', $reversed_string);
    return $array_to_string;
}

echo reverse_string('ab!t*cde$');
