<?php 


    namespace Zgeniuscoders\Mvc\Models;

use PDO;
use Zgeniuscoders\Mvc\DBConnexion;

    abstract class Model{

        private DBConnexion $pdo;


        public function __construct()
        {
            $this->pdo = new DBConnexion("test2","127.0.0.1","root","");
        }


        public function all()
        {
            $stmt = $this->pdo->getPDO()->query("SELECT * FROM POSTS");
            $data = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this));

            return $data;
        }


        public function find($id){


        }

    }