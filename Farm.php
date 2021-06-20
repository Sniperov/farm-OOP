<?php

namespace App;

require 'AnimalFactory.php';

use App\AnimalFactory;

class Farm {
    
    public static function getProducts($animalNames)
    {
        $jsonProducts = file_get_contents('countProducts.json');
        $countProducts = json_decode($jsonProducts, true);
        $products = array();

        foreach($animalNames as $animalName){
            $countProduct = 0;
            $factory = new AnimalFactory;
            $animal = $factory->getAnimal($animalName);
    
            $jsonCount = file_get_contents('count.json');
            $count = json_decode($jsonCount, true);
            
            for ($day=0; $day < 7; $day++) { 
                for ($i=0; $i < $count[$animalName]; $i++) { 
                    $countProduct += $animal->getProduct();
                }
            }

            
            $products += [$animalName => $countProduct];
        }
        if($countProducts != null){
            array_push($countProducts, $products);

            file_put_contents('countProducts.json', json_encode($countProducts));
        }else {
            file_put_contents('countProducts.json', json_encode($products, true));
        }
        return $products;
    }

    public static function getCountAnimals($animalNames)
    {
        $result = [];
        foreach($animalNames as $animalName){
            $factory = new AnimalFactory;
            $animal = $factory->getAnimal($animalName);

            $str = "Количество $animal->name: " . $animal->count();
            array_push($result, $str);
        }
        

        return $result;
    }

    public static function getAllProducts($animalNames)
    {
        $result = [];
        $products = json_decode(file_get_contents('countProducts.json'), true);

        foreach($animalNames as $animalName){
            $factory = new AnimalFactory;
            $animal = $factory->getAnimal($animalName);

            $count = array_sum(array_column($products, $animalName));

            $str = "$animal->name -> $count";
            array_push($result, $str);
        }

        return $result;
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

    public static function getAnimalName($animalName)
    {
        $factory = new AnimalFactory;
        $animal = $factory->getAnimal($animalName);

        return $animal->name;
    }
}