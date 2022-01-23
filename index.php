<?php
include("number_convert.php");

function basicTest($textual_numbers = [], $expected_results = []) {
    $word2Number = new NumberConvert;

    foreach($textual_numbers as $key => $word) {
        $number = $word2Number->word2Number($word);
        echo $number;
        echo " => ";
        if($number == $expected_results[$key]) {
            echo "success";
        } else {
            echo "fail";
        }
        echo "\n";
    }
}

$textual_numbers = [
    "One hundred twenty four thousand three hundred and fifty",
    "seven billion four hundred thirty six million four hundred twenty one thousand eight hundred sixty three",
    "twelve million three hundred forty five thousand six hundred seventy eight",
    "nine billion eight hundred seventy six million five hundred forty three thousand two hundred ten",
    "three billion six hundred ninety eight million five hundred twenty thousand one hundred forty seven",
    "three trillion six hundred ninety eight billion five hundred twenty million one hundred forty seven thousand one hundred twenty three",
    "ten billion one",
    "ten billion one million one",
    "three hundred thousand four hundred",
    "one hundred ninety four trillion three hundred eighty seven billion six hundred fifty one million nine hundred eighty seven thousand four hundred thirty six",
    "nine hundred eighty seven trillion five hundred sixty nine billion two hundred thirty four million two hundred nine thousand eight hundred seventy two",
    "nine hundred four trillion sixty billion seven hundred million three hundred forty thousand two hundred one",
];

$expected_results = [
    124350,
    7436421863,
    12345678,
    9876543210,
    3698520147,
    3698520147123,
    10000000001,
    10001000001,
    300400,
    194387651987436,
    987569234209872,
    904060700340201,
];

basicTest($textual_numbers, $expected_results);