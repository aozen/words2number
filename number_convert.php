<?php

Class NumberConvert
{
    public function __construct() {

        // Dynamic number list. Can be added to this list
        $this->number_list = [
            "zero" => 0,
            "one" => 1,
            "two" => 2,
            "three" => 3,
            "four" => 4,
            "five" => 5,
            "six" => 6,
            "seven" => 7,
            "eight" => 8,
            "nine" => 9,
            "ten" => 10,
            "eleven" => 11,
            "twelve" => 12,
            "thirteen" => 13,
            "fourteen" => 14,
            "fifteen" => 15,
            "sixteen" => 16,
            "seventeen" => 17,
            "eighteen" => 18,
            "nineteen" => 19,
            "twenty" => 20,
            "thirty" => 30,
            "forty" => 40,
            "fifty" => 50,
            "sixty" => 60,
            "seventy" =>70,
            "eighty" => 80,
            "ninety" => 90,
            "hundred" => pow(10,2),
            "thousand" => pow(10,3),
            "million" => pow(10,6),
            "billion" => pow(10,9),
            "trillion" => pow(10,12),
            "quadrillion" => pow(10,15),
            "quintillion" => pow(10,18),
            "sextillion" => pow(10,21),
            "octillion" => pow(10,24),
        ];
    }

    /**
     * @param string $input_number given textual number
     * 
     * @return integer result of the word2Number convert
     */
    public function word2Number($input_number) {
        $input_number = mb_strtolower($input_number);
        $textual_number_array = explode(" ", $input_number);
        $total = 0;
        $temp_total = 0;
        foreach ($textual_number_array as $number_text) {
            if($number_text == "and") { continue; }
            // Stop running if text is not a valid number
            if(!isset($this->number_list[$number_text])) { throw new Exception("NaN:" . $number_text);}

            // Get integer value of word number
            $number = $this->number_list[$number_text];

            // Numbers 1000 and higher are for multiplying numbers together
            if ($number >= 1000) {
                $total += $temp_total * $number;
                // After using the number x we need to reset it because the multiplication is done.
                $temp_total = 0;
            }
            // $temp_total can be multiplied by X every time the number hundred is seen
            elseif ($number >= 100) {
                 $temp_total *= $number;
            }
            // Add small numbers (zero to ninety) to the temp_total
            else {
                $temp_total += $number;
            }
        }
        return $total + $temp_total;
    }
}