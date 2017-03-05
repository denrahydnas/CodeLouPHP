<?php

function get_visited_list(){
  include 'connect.php';
    try{
        return $db->query('SELECT id, country, city, image FROM travelogue WHERE visited = TRUE');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage90 . "</br>";
        return false;
    }
}

function get_wish_list(){
  include 'connect.php';
    try{
        return $db->query('SELECT id, country, city, image FROM travelogue WHERE visited = FALSE');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage90 . "</br>";
        return false;
    }
}

function get_fave_list(){
  include 'connect.php';
    try{
        return $db->query('SELECT id, country, city, image FROM travelogue WHERE fave = TRUE');
    }catch (Exception $e) {
        echo "Error!:" . $e->getMessage90 . "</br>";
        return false;
    }
}

?>