<?php

$array = [1,1,1,1,1,1,1,1,1];
$count=0;

for($i = 0; $i+1 < count($array) ; $i++){
    if($array[$i] === 1 && $array[$i+1] === 1){
        $count++;
        echo "<pre>i=".$i."  ".$array[$i].",".$array[$i+1]."</pre>";
        echo "count=".$count;
    }
}