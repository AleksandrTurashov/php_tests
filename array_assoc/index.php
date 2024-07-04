<?php

$array = [
            "name" => "Aleksandr",
            "sername" => "Turashov",
            "age" => "35 years",
            "language" => "russian",
];


end($array);
while(($key = key($array)) !== null){
    echo $key." => ".current($array)." ; ";
    prev($array);
}