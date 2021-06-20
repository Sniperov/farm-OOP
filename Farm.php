<?php

namespace App;

require 'AnimalFactory.php';

use App\AnimalFactory;

class Farm {
    
    public static function getProducts($animalName)
    {
        $factory = new AnimalFactory;
        $animal = $factory->getAnimal($animalName);

        $jsonCount = file_get_contents('count.json');
        $count = json_decode($jsonCount, true);
        
        for ($day=0; $day < 7; $day++) { 
            for ($i=0; $i < $count[$animalName]; $i++) { 
                $countProducts += $animal->getProduct();
            }
        }

        return "Собрано с $animal->name за неделю: $countProducts";
    }

    public static function getCountAnimals($animalName)
    {
        $factory = new AnimalFactory;
        $animal = $factory->getAnimal($animalName);

        return 'Количество '.$animal->name.': '.$animal->count();
    }

    public static function addAnimal($animalName)
    {
        $factory = new AnimalFactory;
        $animal = $factory->getAnimal($animalName);

        $animal->add();

        $jsonCount = file_get_contents('count.json');
        $count = json_decode($jsonCount, true);

        return $count[$animalName];
    }
}