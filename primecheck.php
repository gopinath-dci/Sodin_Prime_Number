<?php 

	$given = $_GET['n'];
	if($given == "") die("Pass value in parameter ?n=?");
    $limit = $given;
    $_aVal = array(0,0);
    $aQ = 0;
     
    function checkprime($x){
         
        $sqrt = sqrt($x);
        $counter = 2;
                 
        while ($counter <= $sqrt){
            if ($x % $counter == 0){
                break;
            }
            else{
                ++$counter;
            }
        }
        if ($x % $counter != 0){
            return $x;
        }
    }
     
     
    for($num = 0; $num <= $limit; ++$num){
         
        if ($num == 0){
            continue;
        }
        else if ($num == 1){
            continue;
        }
        else if ($num == 2){
             
            if ($aQ < $limit){
                $aQ += $num;
                array_push($_aVal, $num);
            }
             
        }
        else{
             
            $result = checkprime($num); 
                         
            if ($result != 0){
                 
                if ($aQ < $limit && $aQ + $num <= $limit){
                    $aQ += $num;
                    array_push($_aVal, $num);
                }
            }
        }
    }
     
    array_splice ($_aVal,0,1);
    array_splice ($_aVal,0,1);
    echo "<pre>";
    //print_r($_aVal);
    //echo $aQ ."<br/>";
     
    $prime = false;
     
    while (!$prime){
         
        $check = checkprime($aQ);
        if ($check == 0){
             
            $aQ = $aQ - end($_aVal);
            array_pop($_aVal);
        }
        else{
            $prime = true;
        }
    }
     echo "Total number of Values ".count($_aVal)."<br>"; 
    echo "The Largest Prime Number below $limit is the result of consecutive prime numbers is $aQ." ."<br/>";
    
    echo "$aQ  = Sum of ";
    foreach ($_aVal as $key => $value){
        echo "$value  ";
    }
 
?>
