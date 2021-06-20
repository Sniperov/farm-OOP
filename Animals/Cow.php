<?php
namespace App\Animals;

class Cow{
    public $name = 'Коровы';

    public function getProduct(){
        return rand(12,12);
    }

    public function add()
    {
        $jsonCount = file_get_contents('count.json');
        $count = json_decode($jsonCount, true);

        $count['cow'] += 1;

        file_put_contents('count.json', json_encode($count));
    }

    public function count()
    {
        $jsonCount = file_get_contents('count.json');
        $count = json_decode($jsonCount, true);

        return $count['cow'];
    }
}