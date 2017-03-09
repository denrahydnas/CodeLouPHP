<?php

function get_visited_list(){
  include 'connect.php';
    try{
        return $db->query('SELECT `key`, country, city, image FROM travelogue WHERE visited = TRUE');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
}

function get_wish_list(){
  include 'connect.php';
    try{
        return $db->query('SELECT country, city, image FROM travelogue WHERE visited = FALSE');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
}

function get_fave_list(){
  include 'connect.php';
    try{
        return $db->query('SELECT country, city, image FROM travelogue WHERE fave = TRUE');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
}

function get_full_list(){
  include 'connect.php';
    try{
        return $db->query('SELECT * FROM travelogue');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
}

function get_random(){
  include 'connect.php';
    try{
        return $db->query('SELECT country, city, image FROM travelogue WHERE visited = FALSE || fave = TRUE');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
}

function add_location($country, $city, $sights, $image, $visited, $fave){
      include 'connect.php';
    
    $sql = 'INSERT INTO travelogue(country, city, sights, image, visited, fave) VALUES (?, ?, ?, ?, ?, ?)';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $country, PDO::PARAM_STR);
        $results->bindValue(2, $city, PDO::PARAM_STR);
        $results->bindValue(3, $sights, PDO::PARAM_STR);
        $results->bindValue(4, $image, PDO::PARAM_STR);
        $results->bindValue(5, $visited, PDO::PARAM_BOOL);
        $results->bindValue(6, $fave, PDO::PARAM_BOOL);
        $results->execute();
    } catch (Exception $e){
        echo "Error: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}

/*function update_location($country, $city, $sights, $image, $visited, $fave){
      include 'connect.php';
    
    $sql = 'UPDATE travelogue SET (?,?,?,?,?,?) WHERE (?, ?, ?, ?, ?, ?)';
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $country, PDO::PARAM_STR);
        $results->bindValue(2, $city, PDO::PARAM_STR);
        $results->bindValue(3, $sights, PDO::PARAM_STR);
        $results->bindValue(4, $image, PDO::PARAM_STR);
        $results->bindValue(5, $visited, PDO::PARAM_BOOL);
        $results->bindValue(6, $fave, PDO::PARAM_BOOL);
        $results->execute();
    } catch (Exception $e){
        echo "Error: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}*/



?>