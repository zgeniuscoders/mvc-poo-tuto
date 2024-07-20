<?php


namespace Zgeniuscoders\Mvc;

use PDO;
use PDOException;

class DBConnexion
{


    public function __construct(private string $dbname, private string $host, private string $username, private string $password, private ?array $options = [])
    {
    }


    public function getPDO(): PDO
    {

        try{
            return new PDO(
                "mysql:dbname=$this->dbname;host=$this->host",
                $this->username,
                $this->password,
                array_merge(
                    $this->options,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                    ]
                )
            );
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
}
