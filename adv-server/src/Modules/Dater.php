<?php


namespace App\Modules;


class Dater
{
    /**
     * @param string $format
     * @return bool|\DateTime
     */
    public static function get($format = 'Y-m-d H:i:s')
    {
        return \DateTime::createFromFormat($format, date('Y-m-d H:i:s'));
    }

    /**
     * @param string $format
     * @return bool|\DateTime
     */
    public static function getString($format = 'Y-m-d H:i:s')
    {
        return date_format(self::get($format), $format);
    }
}
