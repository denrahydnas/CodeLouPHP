<?php 
    $pagetitle="Manage Travelogue";
    $subtitle ="Manage Travelogue Locations";  
    include("incl/header.php"); 
?>

  <!-- Db:CodeLouisville; Table: travelogue; User:CodeLouPHP; Pwd:codelou-->    
      
<div class="container">
    <div class="formbox">
         <form>
          <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" placeholder="South Korea">
          </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" placeholder="Seoul">
          </div>
        <div class="form-group">
            <label for="continent">Continent</label>
            <input type="text" class="form-control" id="continent" placeholder="Asia">
          </div>
        <div class="form-group">
            <label for="sights">What do you want to see/do there?</label>
            <input type="text" class="form-control" id="sights" placeholder="Visit Gyeonbukgeong">
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