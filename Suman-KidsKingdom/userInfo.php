<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<?php include"includes/navbar.php"; ?>

<body>
    <?php
    
    if(count($_SESSION['session_cart'])==0){
        ?>
        <script type="text/javascript">
            window.location="movieslist.php";
        </script>
        <?php
    }
    ?>
    <br><br>


    <div class="container">
    <div class="jumbotron"> 
    <h3 style="font-family: 'Montserrat', sans-serif;text-align: center;">Enter Shipping Details</h3><hr>
    <br>
  <form class="form-horizontal" action="payment.php" method="post">
       
       <h3 style=" font-family: 'Dosis', sans-serif;"> Shipping Address :- </h3><br><br>

        <div class="form-group">
          <label class="control-label col-md-2">First Name</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="Enter First Name" name="firstName">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-2">Last Name</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter Last Name " name="lastName">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-2">House No.</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Address Line 1 " name="address" >
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-md-2">Street name</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Address Line 2 " name="address2">
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-md-2">City</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter city " name="city">
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-md-2">State</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter state " name="state">
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-md-2">Zipcode</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter Zipcode " name="zipCode">
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-md-2">Enter Telephone Number</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter Number " name="telephone">
          </div>
        </div>
           
        <div class="form-group">
          <label class="control-label col-md-2">Enter E-mail</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter E-mail Id " name="email">
          </div>
        </div>

        <br>
        <hr style="border-bottom:black solid 1px;"><br>

       <h3 style=" font-family: 'Dosis', sans-serif;"> Billing Address :-</h3><br><br>

        <div class="form-group">
          <label class="control-label col-md-2">First Name</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="Enter First Name" name="firstNameB">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-2">Last Name</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter Last Name " name="lastNameB">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-2">House No.</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Address Line 1 " name="addressB" >
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-md-2">Street name</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Address Line 2 " name="address2B">
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-md-2">City</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter city " name="cityB">
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-md-2">State</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter state " name="stateB">
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-md-2">Zipcode</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter Zipcode " name="zipCodeB">
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-md-2">Enter Telephone Number</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter Number " name="telephoneB">
          </div>
        </div>
           
        <div class="form-group">
          <label class="control-label col-md-2">Enter E-mail</label>
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Enter E-mail Id " name="email">
          </div>
        </div>
        
        <br>
        <hr style="border-bottom:black solid 1px;"><br>
        <h3 style=" font-family: 'Dosis', sans-serif;"> Shipping Charges :-</h3><br>
        


        <div class="form-group">
            <label class="col-md-2 control-label">Shipping charges</label>
                <div class="col-md-6">
                    <div class="radio">
                         <label>
                            <input type="radio" name="shipping" value="Standard" checked="">
                                             $2
                         </label>
                    </div>
                                    
                </div>
        </div>

        <br><br><br>

        <div class="col-md-offset-8">
            <input type="hidden" name="Desired_Action" value="userInfoPass">
            <input type="submit" class="btn btn-primary btn-lg" value="Continue" style="width: 300px;">
        </div>

    </form>
</div>
</div>
 <br>
        <br>
        <?php include"includes/footer.php"; ?>
</body>
</html>