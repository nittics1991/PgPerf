<?php
/**
*   Model
*
*
**/
namespace PgPerf\domain;

use PgPerf\domain\Enum;

class UnitTimeEnum extends Enum
{
    /**
    *   {inherit}
    *
    **/
    private const SECOND = 1;
    private const MINUTE = 60;
    private const HOUR = self::MINUTE * 60;
    private const DAY = self::HOUR * 24;
    private const WEEK = self::DAY * 7;
    private const MONTH = self::DAY * 30;
    private const QUOTE = self::MONTH * 3;
    private const FISCAL = self::MONTH * 6;
    private const YEAR = self::DAY * 365;
}
