<?php

namespace App\Services;

class PhoneFix
{
    public function fix($phone_number)
    {
        try {
            $util = \libphonenumber\PhoneNumberUtil::getInstance();

            $number = $util->parse($phone_number, 'international');

            return $util->format($number, \libphonenumber\PhoneNumberFormat::E164);
        } catch (\Throwable $th) {
            $parsed_phone = preg_replace('/[^0-9]/', '', $phone_number);
            $extension = substr($parsed_phone, 0, 2);
            $fixed_phone_number = $parsed_phone;

            $has_extension = ['60'];
            if (! in_array($extension, $has_extension)) {
                $first_char = substr($parsed_phone, 0, 1);
                if ($first_char == '0') {
                    $fixed_phone_number = '60'.substr($parsed_phone, 1);
                } else {
                    $fixed_phone_number = $parsed_phone;
                }
            }

            return $fixed_phone_number;
        }
    }
}
