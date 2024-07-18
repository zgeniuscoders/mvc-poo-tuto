<?php 


namespace Zgeniuscoders\Mvc\Render;

 class Render{

    public function view(string $path,?array $data = null){

        ob_start();

        if($data){
            extract($data);
        }

        $view = ob_get_clean();

        require VIEW_PATH . $path . ".php";
        
    }

 }