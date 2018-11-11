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
    
    /**
    *   {inherit}
    *
    **/
    protected function generateInnerPropertyData()
    {
        $this->commitPerTime();
        $this->rollbackPerTime();
    }
    
    /**
    *   commitPerTime
    *
    **/
    private function commitPerTime()
    {
        if (!isset($this->xactCommit) ||
            !isset($this->timestamp) ||
            empty($this->timestamp)
        ) {
            $this->dataContainer['commitPerTime'] = 0;
        }
            
        $this->dataContainer['commitPerTime'] =
            $this->xactCommit *
            $this->unitTimeEnum /            
            (strtotime($this->timestamp) -
            strtotime($stats_reset));
    }
    
    /**
    *   rollbackPerTime
    *
    **/
    private function rollbackPerTime()
    {
        if (!isset($this->xactRollback) ||
            !isset($this->timestamp) ||
            empty($this->timestamp)
        ) {
            $this->dataContainer['rollbackPerTime'] = 0;
        }
            
        $this->dataContainer['rollbackPerTime'] =
            $this->xactRollback *
            $this->unitTimeEnum /            
            (strtotime($this->timestamp) -
            strtotime($stats_reset));
    }
}
