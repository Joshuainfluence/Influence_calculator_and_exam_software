<?php
 function code()
 {
     $x = rand(555555, 999999);
     return $x;
    
 }
 echo code();
 exit;
 $array = [1,2,3,4,5,6,7,8,9,9,2];
function count0($array)
{
   
    $count = 0;
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            $count++;
        }
    } else {
        return "not an array";
    }

    echo  $count;
}
count0($array);
die;
$array = [1,2,3,4,5];
function count2($array)
{
    $count = 0;
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            $count++;
        }
    } else {
        return "not an array";
    }

    echo  $count;
}
count2($array);
die;
function confirmation_code(){
    $x = rand(0000,9999);
    return $x;
}
echo confirmation_code();
die;
function regNo(){
    $x = "ISC". rand(0000,9999);
    return $x;
}
echo regNo();
