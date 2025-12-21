<?php

class Autoloading
{
    public static function LoadClass()
    {
        spl_autoload_register(function ($className) {

            $paths = [
                'core/',
                'model/',
                'repository/',
                'config/',
                'Controller/',
            ];

            foreach ($paths as $path) {
                $file = $path . $className . '.php';

                if (file_exists($file)) {
                    require_once $file;
                    return;
                }
            }

            throw new Exception("Classe $className introuvable");
        });
    }
}
