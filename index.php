<?php
include 'farm.php';

use App\Farm;

$animals = ['cow', 'chiken'];

if(array_key_exists('harvest',$_POST)){
    echo 'Последний недельный сбор продуктов:<br>';
    foreach(Farm::getProducts($animals) as $name => $value)
    {
        echo Farm::getAnimalName($name). ' -> ' . $value . '<br>';
    }
    echo "<br>";
}

foreach(Farm::getCountAnimals($animals) as $value)
{
    echo $value . '<br>';
}

echo "<br>Всего собранно продуктов: <br>";

foreach(Farm::getAllProducts($animals) as $value)
{
    echo $value . '<br>';
}

echo "<br>";

function addAnimal($animalName)
{
    Farm::addAnimal($animalName);
}

if(array_key_exists('cow',$_POST)){
    addAnimal('cow');
}
elseif(array_key_exists('chiken',$_POST)){
    addAnimal('chiken');
}
?>
<br>
<form method="post">
    <input type="submit" name="cow" value="Add Cow"/>
</form>
<form method="post">
    <input type="submit" name="chiken" value="Add Chiken"/>
</form>
<form method="post">
    <input type="submit" name="harvest" value="harvest"/>
</form>

