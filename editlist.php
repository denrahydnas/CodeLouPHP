<?php 
    $pagetitle="Manage Travelogue";
    $subtitle ="Manage Travelogue Locations";  
    include("incl/header.php"); 

// edit location
if(isset($_GET['id'])) {
    list($id, $country, $city, $sights, $image, $visited, $fave) = get_detail(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}


// add location
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id  = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $country = trim(filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING));
        $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING));
        $sights = trim(filter_input(INPUT_POST, 'sights', FILTER_SANITIZE_STRING));
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING));
        $visited = filter_input(INPUT_POST, 'visited');
        $fave = filter_input(INPUT_POST, 'fave');
        
        if (empty($country) || empty($city)){
            $error_message = "Please complete minimum required fields (country and city)";
        } else {
            if (add_location($id, $country, $city, $sights, $image, $visited, $fave)){
                echo "<h3 class='text-center'> Thanks! </h3>";
                exit;
            }else {
                $error_message = "Could not add location. Please try again.";
            }
        }
    }

if (isset($_GET['msg'])) {
    $error_message= trim(filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING));
}
?>   
   


<div class="container">
    <div class="formbox">
        <?php
            if (isset($error_message)) {
            echo "<p class='message'>$error_message</p>";
            }
        ?>
         <form class="add_form" method="post" action="editlist.php">
          <div class="form-group">
              <h2><?php
                 if (!empty($id)){
                     echo "Edit Travelogue";
                 } else {
                     echo "Add to Travelogue";
                 }?></h2>
            <label for="country">Country</label>
            <input type="text" class="form-control" name="country" value="<?php 
            if (!empty($id)){
                     echo $country;
                 } else {
                     echo " ";
                 }?>">
          </div>
        <div class="form-group">
            <label for="city">City/State/Province/Area</label>
            <input type="text" class="form-control" name="city" value="<?php 
            if (!empty($id)){
                     echo $city;
                 } else {
                     echo " ";
                 }?>">
          </div>
        <div class="form-group">
            <label for="sights">What do you want to see/do there?</label>
            <input type="text" class="form-control" name="sights" value="<?php 
            if (!empty($id)){
                     echo $sights;
                 } else {
                     echo " ";
                 }?>">
          </div>
        <div class="form-group">
            <label for="images">What should we feature an image of?</label>
            <input type="text" class="form-control" name="image" value="<?php 
            if (!empty($id)){
                echo $image;
            } else {
                echo "";
            } ?>">
          </div>
        <div class="checkbox">  <!-- Still a problem with edit checkboxes appearing correctly-->
            <label>
                <?php 
                    echo '<input type="checkbox" name="visited" value="1"';
                    if(!empty($id) && $visited == 1){
                        echo ' checked ';
                    }?>  
                /> I have visited this location. 
            </label>
          </div>
        <div class="checkbox">
            <label>
                 <?php 
                    echo '<input type="checkbox" name="fave" value="1"';
                    if(!empty($id) && $fave == 1){
                        echo ' checked ';
                    }?>  
                /> This is one of my favorite places to visit. 
            </label>
          </div>
        <div class="text-center">
        <?php 
            if (!empty($id)){
                echo "<input type='hidden' name='id' value=" . $id . "'/>";
            }?>
          <input class="btn btn-primary" type="submit" value="<?php 
            if (!empty($id)){
                echo "Update";
                 } else {
                echo "Submit"; 
            }?>">
        </div>
        </form>
        </div> 
    </div>


<div class="container"> 
    <div class="read_list">
            <?php
                foreach(get_full_list() as $item){
                    echo '<div class="row">' 
                        . "<li class='col-xs-10 col-md-10'>
                        <a href='single.php?id=" . $item["key"] . "'>" 
                        . '<img class="list" src="img/' . $item['image'] . '">' 
                        . $item['city'] . ", " . $item['country'] . '</li>';
                    echo '<div class="col-xs-2 col-md-2">' . '<a class="edit" href="editlist.php?id=' . $item["key"] . '"> Edit  </a>';
                    echo " / ";
                    echo '<a class="delete" href="delete.php?id=' . $item["key"] . '">  Delete</a>' . '</div>' . '</div>'; 
                    /*redirect to Are you sure? Delete page*/
                }
            ?>
    </div>
</div>




<?php include("incl/footer.php"); ?>