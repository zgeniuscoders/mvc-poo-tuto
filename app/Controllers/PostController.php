<?php 


    namespace App\Controllers;

    class PostController {


        public function index(){
            echo "post";
        }

        public function show(string $slug,string $id){
            echo $slug;
        }
    }