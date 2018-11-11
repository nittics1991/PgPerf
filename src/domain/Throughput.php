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
    
    private function commitPerTime()
    {
        if (!isset($this->xactCommit) ||
            !isset($this->timestamp) ||
            empty($this->timestamp)
        ) {
            $this->dataContainer['commitPerTime'] = 0;
        }
        
        
        //UnitTimeEnum
        //時間間隔をどうあつかうか？
        
        $now = new Date();
        $start = new Date($this->timestamp);
        
        
        
    
    
    }
    
    
}
