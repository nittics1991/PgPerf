<?php
/**
*   Model
*
*
**/
namespace PgPerf\domain;

use PgPerf\domain\AbstractModel;

class Throughput extends AbstractModel
{
    /**
    *   {inherit}
    *
    **/
    protected $properties = [
        'id', 'timestamp', 'stats_reset',
        'xact_commit', 'xact_rollback',
    ];
    
    /**
    *   {inherit}
    *
    **/
    protected $innerProperties = [
        'commit_per_time', 'rollback_per_time'
    ];
    
    
    
    
    
    
    
}
