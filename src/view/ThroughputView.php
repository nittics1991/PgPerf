<?php
/**
*   View
*
*
**/
namespace PgPerf\view;

use PgPerf\view\AbstractView;

class ThroughputView extends AbstractView
{
    protected function build(AbstractModel $model):array
    {
        $html.title = 'Throughput';
        
        $chartData = [
            
            
            
            
            
        ];
        
        $chartData = $this->toJson($chartData);
        
        return compact(
            'title',
            'chartData'
        );
    }
}
