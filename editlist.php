<?php 
    $pagetitle="Manage Travelogue";
    $subtitle ="Manage Travelogue Locations";  
    include("incl/header.php"); 
    include("incl/functions.php"); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $country = trim(filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING));
        $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING));
        $sights = trim(filter_input(INPUT_POST, 'sights', FILTER_SANITIZE_STRING));
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING));
        $visited = filter_input(INPUT_POST, 'visited');
        $fave = filter_input(INPUT_POST, 'fave');
        
        if (empty($country) || empty($city)){
            $error_message = "Please complete minimum required fields (country and city)";
        } else {
            if (add_location($country, $city, $sights, $image, $visited, $fave)){
                echo "<h3 class='text-center'> Thanks! </h3>";
                exit;
            }else {
                $error_message = "Could not add location. Please try again.";
            }
        }
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
              <h2>Add to Travelogue</h2>
            <label for="country">Country</label>
            <input type="text" class="form-control" name="country" placeholder="South Korea">
          </div>
        <div class="form-group">
            <label for="city">City/State/Province/Area</label>
            <input type="text" class="form-control" name="city" placeholder="Seoul">
          </div>
        <div class="form-group">
            <label for="sights">What do you want to see/do there?</label>
            <input type="text" class="form-control" name="sights" placeholder="Visit Gyeonbukgung">
          </div>
        <div class="form-group">
            <label for="image">Add an image:</label>
            <input type="file" name="image">
            <p class="help-block">Please add a square image (300px x 300px suggested) </p>
          </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="visited" value="0" />
                <input type="checkbox" name="visited" value="1"> I have visited this location. 
            </label>
          </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="fave" value="0" />
                <input type="checkbox" name="fave" value="1"> This is one of my favorite places to visit. 
            </label>
          </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Add Location</button>
        </div>
        </form>
        </div> 
    </div>


<div class="container read_list"> 
    <div class="centering ">
            <?php
                foreach(get_full_list() as $item){
                    echo '<div class="row">' 
                        . "<li class='col-xs-10 col-md-10'>
                        <a href='single.php?id=" . $item["key"] . "'>" 
                        . '<img class="list" src="img/' . $item['image'] . '">' 
                        . $item['city'] . ", " . $item['country'] . '</li>';
                    echo '<div class="col-xs-2 col-md-2">' . '<a class="edit" href="single.php?id=' . $item["key"] . '"> Edit  </a>';
                    echo '<a class="delete" href="index.php">  Delete</a>' . '</div>' . '</div>'; 
                    /*add Are You Sure? pop up to delete*/
                }
            ?>
    </div>
</div>




<?php include("incl/footer.php"); ?>