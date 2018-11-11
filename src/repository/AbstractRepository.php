<?php
/**
*   AbstractRepository
*
*
**/
namespace PgPerf\repository;

use \PDO;
use PgPerf\domain\RepositoryInterface;

abstract class AbstractRepository implements RepositoryInterface
{
    /**
    *   SQL
    *
    *   @var string
    **/
    protected allSql = '';
    
    /**
    *   __construct
    *
    *   @param PDO $pdo
    **/
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    
    /**
    *   {inherit}
    *
    **/
    public function all():array
    {
        $this->pdo->setAttribute(PDO::FETCH_ASSOC);
        $stmt = $this->pdo->prepare($this->allSql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
