<?php

    namespace system;

    class Routes{
        public function __construct($path){
            if(!empty($path[0])){
                $ctrl = 'controllers\\'.ucfirst($path[0]);
                if(class_exists($ctrl, true)){
                    $ctrl_obj = new $ctrl;
                    if(!empty($path[1])){
                        $method = $path[1];
                        
                        if(method_exists($ctrl_obj, $method)){
                            if(!empty($path[2])){
                                $params = array_slice($path,2);
                                call_user_func_array(array($ctrl_obj, $method), $params);
                            }else{
                                $ctrl_obj->$method();
                            }
                        }else{
                            echo 'ERROR: Method not found';
                        }
                    }else{
                        if(method_exists($ctrl_obj, 'index')){
                            $ctrl_obj->index();
                        }else{
                            echo 'ERROR: Method INDEX not found';
                        }
                    }
                }else{
                    echo 'error';
                }
            }else{
                $def_obj = new \controllers\Todos;
                $def_obj->index();
            }
        }
    }

