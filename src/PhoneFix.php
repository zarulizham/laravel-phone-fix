<?php

namespace ZarulIzham\PhoneFix;

class PhoneFix
{
    public function fix($phoneNumber, $defaultCountryCode = '60')
    {
        // Normalize (keep only digits)
        $parsed = preg_replace('/\D/', '', $phoneNumber);

        // Known country codes (extendable)
        $countryCodes = [

            // Southeast Asia
            '60',   // Malaysia
            '65',   // Singapore
            '62',   // Indonesia
            '66',   // Thailand
            '63',   // Philippines
            '673',  // Brunei
            '855',  // Cambodia
            '856',  // Laos
            '95',   // Myanmar
            '84',   // Vietnam
            '670',  // Timor-Leste

            // East Asia
            '81',   // Japan
            '82',   // South Korea
            '86',   // China
            '852',  // Hong Kong
            '853',  // Macau
            '886',  // Taiwan
            '976',  // Mongolia

            // South Asia
            '91',   // India
            '92',   // Pakistan
            '94',   // Sri Lanka
            '880',  // Bangladesh
            '977',  // Nepal
            '975',  // Bhutan
            '960',  // Maldives
            '93',   // Afghanistan

            // Central Asia
            '7',    // Kazakhstan (shared with Russia)
            '993',  // Turkmenistan
            '996',  // Kyrgyzstan
            '998',  // Uzbekistan
            '992',  // Tajikistan

            // Middle East (Western Asia)
            '90',   // Turkey
            '98',   // Iran
            '964',  // Iraq
            '962',  // Jordan
            '961',  // Lebanon
            '965',  // Kuwait
            '966',  // Saudi Arabia
            '971',  // UAE
            '973',  // Bahrain
            '974',  // Qatar
            '968',  // Oman
            '972',  // Israel
            '970',  // Palestine
            '963',  // Syria
            '967',  // Yemen

        ];

        // Sort by length desc to match longest CC first
        usort($countryCodes, function ($a, $b) {
            return strlen($b) <=> strlen($a);
        });

        // 1️⃣ If already contains a known country code → return as is
        foreach ($countryCodes as $cc) {
            $len = strlen($cc);
            if (substr($parsed, 0, $len) === $cc) {
                return $parsed;
            }
        }

        // Strip leading 0 (Malaysia local numbers)
        if (substr($parsed, 0, 1) === '0') {
            $parsed = substr($parsed, 1);
        }

        return $defaultCountryCode.$parsed;
    }
}
