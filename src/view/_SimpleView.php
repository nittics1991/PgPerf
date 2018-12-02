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
        $this->header();
        require($this->templateName);
    }
    
    /**
    *   build
    *
    *   @param AbstractModel $model
    *   @return array
    **/
    protected function build(AbstractModel $model):array
    {
        return [];
    }
    
    /**
    *   escape
    *
    *   @param string $value
    *   @return string
    **/
    protected function escape(string $value):string
    {
        return htmlspecialchars($value, ENT_QUOTES);
    }
    
    /**
    *   toJson
    *
    *   @param mixed $value
    *   @return string
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
    
    /**
    *   header
    *
    **/
    protected function header()
    {
        header('Content-Type: text/html; charset=UTF-8');
        header('X-XSS-Protection:1; mode=block');
        header('X-Content-Type-Options:nosniff');
        header('X-Frame-Options:DENY');
        header('Vary: User-Agent');　
        header('Vary: Accept-Encoding');
        header('Vary: Accept-Language');
        header('Vary: Cookie');
        header(
            "Content-Security-Policy: default-src 'self';" .
            " script-src 'self'"
        );
    }
}
