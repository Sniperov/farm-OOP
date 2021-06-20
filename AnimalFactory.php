<?php

namespace App;

foreach (scandir(dirname(__FILE__).'/Animals') as $filename) {
    $path = dirname(__FILE__) . '/Animals/' . $filename;
    if (is_file($path)) {
        require $path;
    }
}

use App\Animals\Cow;
use App\Animals\Chiken;

class AnimalFactory{
    public function getAnimal($type){
        
        switch($type){
            case "cow": return new Cow;
            case 'chiken': return new Chiken;
            default: throw new Exception("Error type");
        }
    }
}