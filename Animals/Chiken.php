<?php
namespace App\Animals;

class Chiken{
    public $name = 'Куры';

    public function getProduct(){
        return rand(1,1);
    }

    public function add()
    {
        $jsonCount = file_get_contents('count.json');
        $count = json_decode($jsonCount, true);

        $count['chiken'] += 1;

        file_put_contents('count.json', json_encode($count));
    }

    public function count()
    {
        $jsonCount = file_get_contents('count.json');
        $count = json_decode($jsonCount, true);

        return $count['chiken'];
    }
}