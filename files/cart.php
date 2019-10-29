<?php
$stockArray = array(
    array("chicken fried rice",700,"true","","","chicken_fried_rice.jpg"),
    array("barbecued burger",650,"true","","","barbecued_burger.jpg"),
    array("french fries",300,"true","","","french_fries.jpg"),
    array("fried chicken",700,"true","","","fried_chicken.jpg"),
    array("fried fish",600,"true","","","fried_fish.jpg"),
    array("fried rice",500,"true","","","fried_rice.jpg"),
    array("pizza",2500,"true","","","pizza.jpg"),
    array("fried plaintains",250,"true","","","fried_plantains.jpg"),
    array("fried fish",600,"true","","","fried_fish.jpg"),
    array("fried rice",500,"true","","","fried_rice.jpg"),
    array("pizza",2500,"true","","","pizza.jpg"),
    array("fried plaintains",250,"true","","","fried_plantains.jpg"),
    array("shawarma",800,"true","","","shawarma.jpg")
);
$itemID =trim(filter_input(INPUT_GET, "id"));
$type =trim(filter_input(INPUT_GET, "type"));
$value =trim(filter_input(INPUT_GET, "value"));
$currentTotal=  trim(filter_input(INPUT_GET, "currentTotal"));
$cookieName = "cart".$itemID;
switch ($type) {
    //add to cart
    case 1:
        if(!isset($_COOKIE["$cookieName"]) || $_COOKIE["$cookieName"] == 0){
                setcookie("$cookieName", 1, time() + (86400 * 30), "/");
                $newCount = 1;
            }else{
                $newCount = $_COOKIE["$cookieName"] + 1;
                setcookie("$cookieName", $newCount, time() + (86400 * 30), "/");
            }
            echo $newCount;
        break;
    //remove from cart
    case 0:
        if(!isset($_COOKIE["$cookieName"])){
            echo 0;            
        }else {
            setcookie("$cookieName", 0, time() - 1, "/");
            echo 0;
        }
        break;
    //on count changed
    case 2:
        if($value >0 ){
            $currentValue = $_COOKIE[$cookieName];
            $removeCurrentValue = (int) $currentTotal - ($stockArray[$itemID][1]* $currentValue); 
            $newCount = (int) $value;
            setcookie("$cookieName", $newCount, time() + (86400 * 30), "/");
            echo abs($removeCurrentValue + ($stockArray[$itemID][1] * $newCount));
        }
        break;
    //display itmes in cart
        case 3:
            $total = 0;
            if(isset($_COOKIE)){
                for($i = 0; $i <= count($stockArray); $i++){
                    if(isset($_COOKIE['cart'.$i])){
                        echo "<tr id='row{$i}'><td><span id='$i' class ='btn text text-danger'>&times;</span> {$stockArray[$i][0]}</td><td><span></span><input type='number' min='1' id='{$i}' value='{$_COOKIE['cart'.$i]}' width='10%'/></td></tr>";
                    $total += getTotal($i,$stockArray);
                    }else{
                        continue;
                    }
                }
                if($total >0){
                    echo "<tr><td>TOTAL</td><td>NGN <span id='totalRow'>{$total}</span></td></tr>";
                }else{
                    
                }
            } 
        break;
    //remover cart changes
    case 4:
        $total = 0;
        $currentValue = $_COOKIE[$cookieName];
        setcookie("$cookieName", 0, time() - 1, "/");
        echo abs( (int) $currentTotal - ($stockArray[$itemID][1]* $currentValue));
        break;
    //remove all cart
    case 5:
        for($i = 0; $i <= count($stockArray); $i++){
            if(isset($_COOKIE)){
                if(isset($_COOKIE['cart'.$i])){
                    setcookie("cart{$i}", 0, time() - 1, "/");
                }else{
                    continue;
                }
                echo "";
            }        
        }
    break;
    //proceed to recipt
    case 6:
        if(isset($_COOKIE)){
            $count = 1;
            for($i = 0; $i <= count($stockArray); $i++){
                if(isset($_COOKIE['cart'.$i])){
                    echo "<tr id=''><td>$count. {$stockArray[$i][0]}</td><td> ---------- <span>NGN  {$stockArray[$i][1]} x {$_COOKIE['cart'.$i]}</span></td></tr>";
                    $total += getTotal($i,$stockArray);
                    $count++;
                }else{
                    continue;
                }
            }
                echo "<tr><td><b>TOTAL</b></td><td><b>NGN <span id='totalRow'>{$total}</b></span></td></tr>";
        }
        break;
    default:
        echo 0;
        break;
}

function getTotal($index, $stockArray_){
        $itemTotal_ = $stockArray_[$index][1] * $_COOKIE['cart'.$index];
        return $itemTotal_;
}