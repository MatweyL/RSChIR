<?php
function selectSort(array $numbers) {
    $count = count($numbers);
    if ($count <= 1){
        return $numbers;
    }
 
    for ($i = 0; $i < $count; $i++){
        $k = $i;
        for($j = $i + 1; $j < $count; $j++) {
            if ($numbers[$k] > $numbers[$j]) {
                $k = $j;
            }
        }
        if ($k != $i){
            $tmp = $numbers[$i];
            $numbers[$i] = $numbers[$k];
            $numbers[$k] = $tmp;
        }
        
    }
 
    return $numbers;
}

function bubleSort(array $numbers) {
    $count= count($numbers);
    for ($i = 0; $i < $count; $i++){
        for($j = $i + 1; $j < $count; $j++){
            if ($numbers[$i] > $numbers[$j]){
                $temp = $numbers[$i];
                $numbers[$i] = $numbers[$j];
                $numbers[$j] = $temp;
            }
        }
    }
    return $numbers;
}
?>