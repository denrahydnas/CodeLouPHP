<?php 
    $pagetitle="Manage Travelogue";
    $subtitle ="Manage Travelogue Locations";  
    include("incl/header.php"); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $country = trim(filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING));
        $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING));
        $sights = trim(filter_input(INPUT_POST, 'sights', FILTER_SANITIZE_STRING));
        $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING));
        
        if (empty($country) || empty($city)){
            $error_message = "Please complete required fields (country and city)";
        }else {
            add_location($country, $city, $sights, $image);
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
            <input type="text" class="form-control" id="country" placeholder="South Korea">
          </div>
        <div class="form-group">
            <label for="city">City/State/Province/Area</label>
            <input type="text" class="form-control" id="city" placeholder="Seoul">
          </div>
        <div class="form-group">
            <label for="sights">What do you want to see/do there?</label>
            <input type="text" class="form-control" id="sights" placeholder="Visit Gyeonbukgung">
          </div>
        <div class="form-group">
            <label for="image">Add an image:</label>
            <input type="file" id="image">
            <p class="help-block">Please add a square image (300px x 300px suggested) </p>
          </div>
        <div class="checkbox">
            <label>
              <input type="checkbox"> I have visited this location. 
            </label>
          </div>
        <div class="checkbox">
            <label>
              <input type="checkbox"> This is one of my favorite places to visit. 
            </label>
          </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Add Location</button>
        </div>
        </form>
        </div> 
    </div>

<?php include("incl/footer.php"); ?>