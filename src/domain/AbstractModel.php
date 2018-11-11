<?php
/**
*   Model
*
*
**/
namespace PgPerf\domain;

abstract class AbstractModel
{
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
    *   fromArray
    *
    *   @param array $data
    **/
    protected function fromArray(array $data)
    {
        foreach ($this->properties as $name) {
            if (array_key_exists($name, $data)) {
                $propertyName = $this->propertyName($name);
                $this->dataContainer[$propertyName] = $data[$name];
            }
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
    *   generateInnerPropertyData
    *
    **/
    abstract protected function generateInnerPropertyData();
    
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
}