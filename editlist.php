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

<?php include("incl/footer.php"); ?>