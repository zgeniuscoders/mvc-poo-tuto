<?php 


    namespace App\Controllers;

use Zgeniuscoders\Mvc\Render\Render;

    class HomeController {


        public function index(){
            $render = new Render();
            $render->view("index",[
                "name" => "zgeniuscoders@"
            ]);
        }

    }