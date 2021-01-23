<?php

/*The following code was taken from CST-236 class and is all my original work as sited below:
Sievers, Matt (15, December 2020) CST236Milestone2.  Retrieved from: https://github.com/Malleas/CST236Milestone2
A lot of the functionality is the same for a basic website.*/


spl_autoload_register(function ($class){

    //get the difference in folders between the location of autoloader and the file that called autoloader
    $lastDirectories = substr(getcwd(), strlen(__DIR__));

    // count the number of slashes (folder depth)
    $numberOfLastDirectories = substr_count($lastDirectories, '/');

    //this is the list of possible location that classes are found in this app.
    $directories = ['businessService', 'businessService/model', 'database', 'presentation', 'presentation/handler',
        'presentation/views', 'utility'];

    //look inside each directory for the desired class.
    foreach ($directories as $d){
        $currentDirectory = $d;
        for($i = 0; $i < $numberOfLastDirectories; $i++){
            $currentDirectory = "../".$currentDirectory;
        }
        $classFile = $currentDirectory.'/'.$class.'.php';
        if(is_readable($classFile)){
            if(require $d.'/'.$class.".php"){
                break;
            }
        }
    }
});