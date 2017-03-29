<?php

/*-----------READ DB Items---------------*/

function get_destinations($where) {
    include 'connect.php';
    try {
        return $db->query('SELECT `key`, country, city, image FROM travelogue ' . $where);
    }
    catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    } 
}

/*-----------SORT only places that have been visited ---------------*/

function get_visited_list() {
    return get_destinations("WHERE visited = TRUE");
}

/*-----------SORT only places that have NOT been visited ---------------*/

function get_wish_list() {
  return get_destinations("WHERE visited = FALSE");
}

/*----------------SORT only places marked as favorites-----------------*/

function get_fave_list() {
  return get_destinations("WHERE fave = TRUE");
}

/* -------------GET random index of array ---------------*/

function get_rand_index($statement) {
    $results = $statement->fetchAll();
    $amount = count($results);
    $random = rand(0, ($amount-1));    
    $destination = $results[$random]; 
    return $destination;
}

/* ---------PULL random image from VISITED list for front page-----------*/

function get_image_visited() {
    
// get selected list of items
 
    $statement = get_visited_list();
    
// get id of array item using random index function

    $img = get_rand_index($statement)["image"]; 
    return $img;
}

/* ---------PULL random image from NOT VISITED list for front page-----------*/

function get_image_future() {
    
// get selected list of items
    
    $statement = get_wish_list();
    
// get id of array item using random index function

    $img = get_rand_index($statement)["image"]; 
    return $img;
}

/* ---------PULL random image from favorites list for front page-----------*/

function get_image_fave() {
    
// get selected list of items
    
 $statement = get_fave_list();
    
// get id of array item using random index function

    $img = get_rand_index($statement)["image"]; 
    return $img;
}

/* -------------RANDOM VACATION SELECTOR-----------------*/

function get_random() {
  include 'connect.php';
    
// get selected list of items
    
    $notvisit_fave = 'SELECT * FROM travelogue WHERE visited = FALSE || fave = TRUE';
    
// execute db query

    try {
        $statement = $db->prepare($notvisit_fave);
        $statement->execute(); 
    }
    catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
    
// get id of array item using random index function
     
    $id = get_rand_index($statement)["key"]; 
    return $id;
}

/*-------------------READ full db list --------------------*/

function get_full_list() {
  include 'connect.php';

    try {
        return $db->query('SELECT * FROM travelogue');
    }
    catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
}

/*----------------GET INFO on one location detail from set id------------------*/

function get_detail($id) {
  include 'connect.php';

$sql = 'SELECT * FROM travelogue WHERE `key` = ?';

    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $id, PDO::PARAM_INT); 
        $results->execute(); 
    }
    catch (Exception $e){
        echo "Error: " . $e->getMessage() . "<br />";
        return false;
    }
    return $results->fetch();
}

/*-------------------------ADD AND EDIT-------------------------*/

function add_location($id, $country, $city, $sights, $image, $visited, $fave) {
    include 'connect.php';
 
// remove null possibilities for checkbox input
    
    if (!isset($visited)){
        $visited=false;
    }
    if (!isset($fave)){
        $fave=false;
    }
    
// statements
    
    if ($id) {
        $sql = 'UPDATE travelogue SET country=?, city=?, sights=?, image=?, visited=?, fave=? WHERE `key` = ?';
    } else {
        $sql = 'INSERT INTO travelogue(country, city, sights, image, visited, fave) VALUES (?, ?, ?, ?, ?, ?)';
    }
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $country, PDO::PARAM_STR);
        $results->bindValue(2, $city, PDO::PARAM_STR);
        $results->bindValue(3, $sights, PDO::PARAM_STR);
        $results->bindValue(4, $image, PDO::PARAM_STR);
        $results->bindValue(5, $visited, PDO::PARAM_BOOL);
        $results->bindValue(6, $fave, PDO::PARAM_BOOL);
    if ($id){
        $results->bindValue(7, $id, PDO::PARAM_INT);      
    }
        $results->execute();    
    } 
    catch (Exception $e){
        echo "Error: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}

/*-------------DELETE IDed ITEM FROM DB-----------------*/

function delete_location($id){
  include 'connect.php';

$deletesql = 'DELETE FROM travelogue WHERE `key` = ?';
 try {
        $results = $db->prepare($deletesql);
        $results->bindValue(1, $id, PDO::PARAM_INT); 
        $results->execute(); 
    }catch (Exception $e){
        echo "Error: " . $e->getMessage() . "<br />";
        return false;
    }
    if ($results->rowCount() >0){
        return true;
    }else{
        return false;
    }
}

?>