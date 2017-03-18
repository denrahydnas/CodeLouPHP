<?php 
    $pagetitle="Delete Location";
    $subtitle ="Delete Location from Travelogue";  
    include("incl/header.php"); 
  

if(isset($_GET['id'])) {
    list($id, $country, $city, $sights, $image, $visited, $fave) = get_detail(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}

if (isset($_POST['delete'])){
    if(delete_location(filter_input(INPUT_POST, $id, FILTER_SANITIZE_NUMBER_INT))) {
        header('location: editlist.php?msg=Location+Deleted');
        exit;
    } else {
         header('location: delete.php?msg=Unable+to+Delete');
        exit;
    }
}

?>

 <!-- Add Details of single location selected, include sights)-->  
  <div class="container read_list"> 
      <div class="text-center">
          <h4>Are you sure you want to delete this location from the list?</h4>
          <br>
          <?php
          if (!empty($id)) {
                echo "<h3>" . $city . ", " . $country . "</h3><br />";
                echo '<img class="main" src="img/' . $image . '">';
                echo "<h5> Sights & Activities: " . $sights . "</h5>";
                if ($visited != 0) {
                    echo "<h6> I've traveled to this location. </h6>";
                } else {
                    echo "<h6> I hope to go here someday. </h6>";
                }
               if ($fave != 0) {
                    echo "<h6> This is one of my favorite places to visit. </h6>";
                } 
              } 
          
          ?>
        <div class="text-center">
            <form method='post' action='editlist.php'>
                    <?php 
                    if (!empty($id)){
                    echo "<input type='hidden' value='" . $id . "' name='delete'/><br>"; 
                    echo '<input type="submit" class="btn btn-primary" value="Delete"/> <br>';
                    } ?>
                <h6>Really, I want to delete this location.</h6>
            </form>
        </div>
  <!-- ADD button to DELETE entry from DB, then send back to manage page-->
        </div>  
      </div> 
 

      
<?php include("incl/footer.php"); ?>