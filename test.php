<?php /* PHP 7 code below */?>
<?php
/*echo(findLargest(array(7, 17, 13, 19, 5))); 
function findLargest(array $numbers) {
    // Your code goes here
    $mayor = 0;
    foreach($numbers as $fila){
        if($fila > $mayor){
            $mayor = $fila;
        }
    }
    return $mayor;
}*/
/*echo (computeClosestToZero(array(7,-10, 13, 8, 4, -7.2,-12,-3.7,3.5,-9.6, 6.5,-1.7, -6.2,7)));
function computeClosestToZero(array $ts) {
    // Write your code here
    // To debug (equivalent to var_dump): error_log(var_export($var, true));
    if(sizeof($ts)==0){
        return 0;
    }
    $temp = 0;
    for($i=0; $i<sizeof($ts);$i++){
        
        if($temp == 0){
            $temp = $ts[$i];
        }elseif($ts[$i]>0 && $ts[$i]<= abs($temp)){
            $temp = $ts[$i];
        }elseif($ts[$i] < 0 && - $ts[$i] < abs($temp)){
            $temp = $ts[$i];
        }
    }
    return abs($temp);
  }*/
  function isDuoDigit($number) {
    $number = abs($number);
    $numberStr = strval($number);
    $flag = 0;
    $data = [];
    $dataF = [];
    for($i=0;$i<strlen($numberStr);$i++){
        array_push($data, $numberStr[$i]);
    }
    $dataF = array_unique($data);
    if(count($dataF)>2){
        return "n";
    }else{
        return "y";
    }
    // Write your code here
    // To debug (equivalent to var_dump): error_log(var_export($var, true));
    
  }

  echo (isDuoDigit(-2022));
  
?>
