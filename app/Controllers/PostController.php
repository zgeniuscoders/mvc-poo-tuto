<?php 


    namespace App\Controllers;

    class PostController {


        public function index(){
            echo "post";
        }

        public function show(string $id,string $slug){
            echo $slug . "-" . $id;
        }
    }