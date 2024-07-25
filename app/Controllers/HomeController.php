<?php 


    namespace App\Controllers;

use App\Models\Post;
use Zgeniuscoders\Mvc\Render\Render;

    class HomeController {


        public function index($id){
            $render = new Render();

            // $post  = new Post();
            var_dump($id);
            
            $render->view("index",[
                "id" => $id
            ]);
        }

    }