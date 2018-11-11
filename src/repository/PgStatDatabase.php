<?php
/**
*   Repository
*
*
**/
namespace PgPerf\repository;

use PgPerf\repository\AbstractRepository;

class PgStatDatabase extends AbstractRepository
{
    /**
    *   {inherit}
    *
    **/
    protected $allSql = "
        SELECT A.timestamp, B.*
        FROM pgperf.snapshot_pg_perf A
        LEFT JOIN pgperf.snapshot_pg_stat_database B
            ON B.id = A.id
        ORDER BY A.id
    ";
}
