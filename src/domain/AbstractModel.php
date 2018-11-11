<?php
/**
*   Model
*
*
**/
namespace PgPerf\domain;

use \DateTime;
use PgPerf\domain\UnitTimeEnum;

abstract class AbstractModel
{
    /**
    *   cast property attribute
    *
    **/
    protected const BOOL = 'bool';
    protected const INTEGER = 'integer';
    protected const FLOAT = 'float';
    protected const STRING = 'striNG';
    protected const DATE = 'date';
    protected const DATETIME = 'datetime';
    
    /**
    *   properties from repository
    *
    *   @var array
    **/
    protected $properties = [];
    
    /**
    *   properties generated by model
    *
    *   @var array
    **/
    protected $innerProperties = [];
    
    /**
    *   cast property attribute
    *
    *   @var array
    **/
    protected $casts = [];
    
    /**
    *   dataContainer
    *
    *   @var array
    **/
    protected $dataContainer = [];
    
    /**
    *   unitTimeEnum
    *
    *   @var UnitTimeEnum
    **/
    protected $unitTimeEnum;
    
    /**
    *   __construct
    *
    *   @param array $data
    *   @param UnitTimeEnum $unitTimeEnum
    **/
    public function __construct(
        array $data,
        UnitTimeEnum $unitTimeEnum = UnitTimeEnum::MONTH
    ) {
        $this->fromArray($data);
        $this->generateInnerPropertyData();
        $this->unitTimeEnum = $unitTimeEnum;
    }
    
    /**
    *   generateInnerPropertyData
    *
    **/
    abstract protected function generateInnerPropertyData();
     
    /**
    *   fromArray
    *
    *   @param array $data
    **/
    protected function fromArray(array $data)
    {
        foreach ($this->properties as $name) {
            if (!array_key_exists($name, $data)) {
                continue;
            }
            
            if (array_key_exists($name, $this->cast)) {
                $this->castData($name, $data[$name]);
                continue;
            }
            
            $propertyName = $this->propertyName($name);
            $setterName = 'set' . ucFirst($propertyName);
            
            $this->dataContainer[$propertyName] =
                method_exists($setterName, $this)?
                $this->$setterName($data[$name]):
                $data[$name];
        }
    }
    
    /**
    *   propertyName
    *
    *   @param string $name
    *   @return string
    **/
    protected function propertyName(string $name):string
    {
        return lcfirst(
            mb_ereg_replace(
                ' ',
                '',
                ucwords(
                    mb_ereg_replace('_', ' ', $name)
                )
            )
        );
    }
    
    /**
    *   cast
    *
    *   @param string $name
    *   @param mixed $value
    **/
    protected function propertyName(string $name, $value)
    {
        if (!isset($value)) {
            return;
        }
        
        $propertyName = $this->propertyName($name);
        
        if ($this->cast[$name] == self::BOOL) {
            $this->data[$dataContainer] = (bool)$value;
            return;
        }
        
        if ($this->cast[$name] == self::INTEGER) {
            $this->data[$dataContainer] = (int)$value;
            return;
        }
        
        if ($this->cast[$name] == self::FLOAT) {
            $this->data[$dataContainer] = (float)$value;
            return;
        }
        
        if ($this->cast[$name] == self::STRING) {
            $this->data[$dataContainer] = (string)$value;
            return;
        }
        
        if ($this->cast[$name] == self::DATE) {
            $this->data[$dataContainer] =
                (new DateTime($value))->modify('today');
            return;
        }
        
        if ($this->cast[$name] == self::DATETIME) {
            $this->data[$dataContainer] = new DateTime($value);
            return;
        }
    }
    
    /**
    *   __isset
    *
    *   @param string $name
    *   @return bool
    **/
    public function __isset($name):bool
    {
        return array_key_exists($name, $this->dataContainer);
    }
    
    /**
    *   __get
    *
    *   @param string $name
    *   @return mixed
    **/
    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->dataContainer[$name];
        }
        return null;
    }
    
    /**
    *   setter
    *
    *   @param string $name
    *   @return mixed
    *       セッターを指定する場合、set{PropertyName}
    *       {PropertyName}:userName => protected function setUserName()
    **/
}
