<?php
/* select only places that have been visited */
function get_visited_list(){
  include 'connect.php';
    try{
        return $db->query('SELECT `key`, country, city, image FROM travelogue WHERE visited = TRUE');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
}

/* select only places that have not been visited */
function get_wish_list(){
  include 'connect.php';
    try{
        return $db->query('SELECT `key`, country, city, image FROM travelogue WHERE visited = FALSE');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
}

/* select only places marked as favorites */
function get_fave_list(){
  include 'connect.php';
    try{
        return $db->query('SELECT `key`, country, city, image FROM travelogue WHERE fave = TRUE');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
}

/* read full db list */
function get_full_list(){
  include 'connect.php';
    try{
        return $db->query('SELECT * FROM travelogue');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
}

/* randomly select place from fave and not visited lists */
function get_random(){
  include 'connect.php';
    try{
        return $db->query('SELECT `key`, country, city, image FROM travelogue WHERE visited = FALSE || fave = TRUE');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage() . "</br>";
        return false;
    }
}

/*info on one location detail from set id*/

function get_detail($id){
  include 'connect.php';

$sql = 'SELECT * FROM travelogue WHERE `key` = ?';

    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $id, PDO::PARAM_INT); 
        $results->execute(); 
    }catch (Exception $e){
        echo "Error: " . $e->getMessage() . "<br />";
        return false;
    }
    return $results->fetch();
}


/* adding locations to db */
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



?>