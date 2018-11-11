<?php
/**
*   View
*
*
**/
namespace PgPerf\view;

use \InvalidArgumentException;

class SimpleView
{
    /**
    *   templateName
    *
    *   @var string
    **/
    protected $templateName;
    
    /**
    *   __construct
    *
    *   @param string $templateName
    **/
    public function __construct(string $templateName)
    {
        if (!file_exists($templateName)) {
            throw new InvalidArgumentException(
                "not found template file:{$templateName}"
            );
        }
        $this->templateName = $templateName;
    }
    
    /**
    *   render
    *
    *   @param AbstractModel $model
    **/
    public function render(AbstractModel $model)
    {
        extract($model->toArray());
        include($this->templateName);
    }
}
