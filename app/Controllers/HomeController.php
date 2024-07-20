<?php 


    namespace App\Controllers;

use App\Models\Post;
use Zgeniuscoders\Mvc\Render\Render;

    class HomeController {


        public function index(){
            $render = new Render();

            $post  = new Post();
            
            $render->view("index",[
                "posts" => $post->all()
            ]);
        }

    }