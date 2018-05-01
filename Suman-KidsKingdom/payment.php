<!DOCTYPE html>
<html lang="en">
<?php
session_start();
/**
 * Created by PhpStorm.
 * User: beerb
 * Date: 10/11/2017
 * Time: 3:19 PM
 */
class info{
    var $shipping;
    var $firstname;
    var $lastname;
    var $address;

    var $address2;
    var $city;
    var $state;
    var $zipCode;

    var $telephone;
    var $email;
    var $firstnameB;
    var $lastnameB;

    var $addressB;
    var $address2B;
    var $cityB;
    var $stateB;

    var $zipCodeB;
    var $telephoneB;

    function info($shipping, $firstname,$lastname,  $address,
                  $address2, $city,     $state,     $zipCode,
                  $telephone,$email,    $firstnameB,$lastnameB,
                  $addressB, $address2B,$cityB,     $stateB,
                  $zipCodeB, $telephoneB)
    {
        $this->shipping=$shipping;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->address=$address;

        $this->address2=$address2;
        $this->city=$city;
        $this->state=$state;
        $this->zipCode=$zipCode;

        $this->telephone=$telephone;
        $this->email=$email;
        $this->firstnameB=$firstnameB;
        $this->lastnameB=$lastnameB;

        $this->addressB=$addressB;
        $this->address2B=$address2B;
        $this->cityB=$cityB;
        $this->stateB=$stateB;

        $this->zipCodeB=$zipCodeB;
        $this->telephoneB=$telephoneB;
    }
}
?>
<head>
    <title> Great Offers Buy Now </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="main.css">


    <!--Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

</head>
<body style="background-color:#D3D3D3;">
    <?php
    if($_POST['Desired_Action']=="userInfoPass"){
        if(preg_match("/\.|@/",$_POST['email'])){
            $_SESSION['session_info']=new info( $_POST['shipping'],$_POST['firstName'],$_POST['lastName'],$_POST['address'],
                                                $_POST['address2'],$_POST['city'],$_POST['state'],$_POST['zipCode'],
                                                $_POST['telephone'],$_POST['email'],$_POST['firstNameB'],$_POST['lastNameB'],
                                                $_POST['addressB'],$_POST['address2B'],$_POST['cityB'],$_POST['stateB'],
                                                $_POST['zipCodeB'],$_POST['telephoneB']);
        }else{
            ?>
            <script language="javascript">
                alert("Please enter valid information.");
                window.location="userInfo.php";
            </script>
            <?php
        }
    }

    include_once('includes/navbar.php');
    ?>

    
<br>

<form method="post" action="finalOrder.php">

<input type="hidden" name="Desired_Action" value="userCardPass">

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <h3 class="text-center">Payment Details</h3>
                        <img class="img-responsive cc-img" src="https://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>CARD NUMBER</label>
                                    <div class="input-group">
                                        <input type="tel" class="form-control" placeholder="Valid Card Number" name="number" />
                                        <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input type="text" class="form-control" name="date" placeholder="MM / YY" />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label>CV CODE</label>
                                    <input type="text" class="form-control" name="cnumber" placeholder="CVC" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>CARD OWNER</label>
                                    <input type="text" class="form-control" name="cname" placeholder="Card Owner Names" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="submit" class="btn btn-warning btn-lg btn-block" value="Continue">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </form>
     <br>
        <br>
        <?php include"includes/footer.php"; ?>
</body>
</html>