<?php
include 'farm.php';

use App\Farm;

echo Farm::getCountAnimals('cow') . '<br>';
echo Farm::getProducts('cow') . '<br><br>';

echo Farm::getCountAnimals('chiken') . '<br>';
echo Farm::getProducts('chiken'). '<br>';

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

