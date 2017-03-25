<?php

// combine list generators for DRY code
// combine rand generator to add rand images to front page

// RAND generator

$novisit_fave = 'WHERE visited = FALSE || fave = TRUE';
$visit = 'WHERE visited = TRUE';
$novisit = 'WHERE visited = FALSE';
$fave = 'WHERE fave = TRUE';
$all = '';

function get_rand() {
  include 'connect.php';
    
    try {
        $statement=$db->prepare('SELECT * FROM travelogue ' . $fave);
        $statement->execute(); 
    }
    catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
    // count number of items and get random value for use as index
    
    $results = $statement->fetchAll();
    $amount = count($results);
    $random = rand(0, ($amount-1)); 
    
// get id of array item using random index
    
    $destination = $results[$random];  
    $id = $destination["key"]; 
    return $id;
}

var_dump(get_rand($fave));


// LIST REFINER

function get_list($fave) {
  include 'connect.php';
    
    try {
        return $db->query('SELECT * FROM travelogue ' . $fave);
    }
    catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
}

var_dump(get_list($fave));

foreach(get_list($fave) as $item){
    echo  $item["key"]  
        . $item['city'] 
        . $item['country']; 
        } 