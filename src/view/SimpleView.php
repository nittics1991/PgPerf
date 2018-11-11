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
        extract($this->build($model));
        include($this->templateName);
    }
    
    /**
    *   build
    *
    *   @param AbstractModel $model
    *   @param array
    **/
    protected function build(AbstractModel $model):array
    {
        return [];
    }
    
    /**
    *   escape
    *
    *   @param string $value
    *   @param string
    **/
    protected function escape(string $value):string
    {
        return htmlspecialchars($value, ENT_QUOTES);
    }
    
    /**
    *   toJson
    *
    *   @param mixed $value
    *   @param string
    **/
    protected function toJson($value):string
    {
        return json_encode(
            $value,
            JSON_HEX_TAG |
            JSON_HEX_AMP |
            JSON_HEX_APOS |
            JSON_HEX_QUOT
        );
    }
}
