<?php

    namespace system;

    class View{
        public function render($src, $h_f = true){
            if(file_exists('views/'.$src.'.php')){
                if($h_f){
                    include('views/layout/header.php');
                    include('views/'.$src.'.php');
                    include('views/layout/footer.php');
                }else{
                    include('views/'.$src.'.php');
                }
                
            }
        } 
    }