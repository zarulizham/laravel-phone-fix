<?php

namespace ZarulIzham\PhoneFix\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ZarulIzham\PhoneFix\PhoneFix
 */
class PhoneFix extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ZarulIzham\PhoneFix\PhoneFix::class;
    }
}
