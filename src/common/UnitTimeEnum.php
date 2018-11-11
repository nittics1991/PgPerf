<?php
/**
*   Enum
*
*
**/
namespace PgPerf\common;

class UnitTimeEnum
{
    /**
    *   convert unit
    *
    **/
    public const SECOND = 1;
    public const MINUTE = 60;
    public const HOUR = self::MINUTE * 60;
    public const DAY = self::HOUR * 24;
    public const WEEK = self::DAY * 7;
    public const MONTH = self::DAY * 30;
    public const QUOTE = self::MONTH * 3;
    public const FISCAL = self::MONTH * 6;
    public const YEAR = self::DAY * 365;
}
