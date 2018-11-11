<?php
/**
*   Model
*
*
**/
namespace PgPerf\domain;

class UnitTimeEnum
{
    /**
    *   {inherit}
    *
    **/
    private const SECOND = 'PT1S';
    private const MINUTE = 'PT1M';
    private const HOUR = 'PT1H';
    private const DAY = 'P1D';
    private const WEEK = 'P1W';
    private const MONTH = 'P1M';
    private const QUOTE = 'P3M';
    private const FISCAL = 'P6M';
    private const YEAR = 'P1Y';
}
