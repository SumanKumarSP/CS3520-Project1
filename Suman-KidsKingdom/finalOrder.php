<!DOCTYPE html>
<html lang="en">
<?php include"includes/navbar.php"; ?>
    <?php
    session_start();
    /**
     * Created by PhpStorm.
     * User: beerb
     * Date: 10/11/2017
     * Time: 3:19 PM
     */
    //========================================
    // Class item represents a product that is in the shopping cart
    class item{
        var $name;
        var $quantity;
        var $price;

        function item($name,$quantity,$price){
            $this->name=$name;
            $this->quantity=$quantity;
            $this->price=$price;
        }
    }

    //========================================
    // Class cart represents a shopping cart with the variable $session_cart representing the list of items in the cart
    class cart{
        // constructor
        function cart(){
            $this->sessionStart();
        }

        // Check for a previous session, start one if one isn't found and retrieve or generate shopping_cart
        function sessionStart(){
            global $session_cart;                   // global varriable - array of items in cart
            session_start();                        // start a session if one isn't found
            if(isset($_SESSION['session_cart'])){   // if a previouis session exists, get the data associated with the session_cart
                $session_cart=$_SESSION['session_cart'];
            }else{
                $session_cart=Array();              // if there's no session_cart, initialize one as an empty array
                $_SESSION['session_cart']=$session_cart;
            }
        }



        // Register an item in the session and add it to the cart or add to an existing item quantity
        function registerOrAddItem($name, $quantity, $price){
            global $session_cart;
            if($session_cart==""){                       // start a session if one isn't found
                $this->sessionStart();
            }
            foreach($session_cart as $item){                // check if this product is already in cart, if so, update it
                if ($item->name==$name) {
                    $q=$item->quantity+$quantity;
                    $this->editItem($name,($q));
                    $_SESSION['session_cart']=$session_cart;  // add the updated $session_cart array to the SESSION variable
                    return true;
                }
            }
            $item=new item($name,$quantity,$price);   // if not in the cart, create item
            $session_cart[]=$item;                      // add the new item to the array $session_cart
            $_SESSION['session_cart']=$session_cart;  // add the updated $session_cart array to the SESSION variable
            return true;
        }

        // Update an item quantity by name
        function editItem($name,$quantity){
            global $session_cart;
            if($session_cart==""){                          // start a session if one isn't found
                $this->sessionStart();
                return false;
            }
            reset($session_cart);                               // reset pointer to the array first element
            foreach($session_cart as $item){                  // search the $session_cart array for the item to edit
                if($item->name==$name){                     // if a matching item is found, update it's quantity
                    $item->quantity=$quantity;
                    $_SESSION['session_cart']=$session_cart;  // add the updated $session_cart array to the SESSION variable
                    return true;
                }
            }
            return false;                                       // if unable to find the item in the cart
        }
    }

    //========================================
    class card{

        var $number;
        var $date;
        var $cnumber;
        var $cname;

        function card($number,$date,$cnumber,$cname){
            $this->number=$number;
            $this->date=$date;
            $this->cnumber=$cnumber;
            $this->cname=$cname;
        }
    }

    //========================================
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

    <style type="text/css">
        
    strong{

        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
    }

    h2{
        font-family: 'Dosis', sans-serif;
        color: #DC143C;
    }

    </style>

    <body>

        <?php
        if($_POST['Desired_Action']=="clear"){
            session_unset();
            session_destroy();
            ?>
            <script type="text/javascript">
                window.location="movieslist.php";
            </script>
            <?php
        }

        if($_POST['Desired_Action']=="userCardPass"){
            $card=new card($_POST['number'],$_POST['date'],$_POST['cnumber'],$_POST['cname']);
            $_SESSION['session_card']=$card;
        }
        ?>

        <div class="container">
                <br />
                <center><h1 style="font-family: 'Montserrat', sans-serif;">Order Confirmation</h1></center>
                <br />

                <form method="post">
                    <div align="center" style="background-color:lightgray;display:inline-block;border:3px solid black;width:100%">
                        <br />
                        <div align="center" style="background-color:whitesmoke;">
                                <div class="row" style="border-bottom:2px solid black;width:100%">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <br/>
            
                                        <h2>Shipping address</h2>
                                        
                                        <br />
                                        <strong>Name: </strong>
                                        <?php echo $_SESSION['session_info']->firstname." ".$_SESSION['session_info']->lastname; ?>
                                        <br />
                                        <br />
                                        <strong>Address: </strong>
                                        <?php echo $_SESSION['session_info']->address; ?>
                                        <br />
                                        <br />
                                        <strong>Address line 2: </strong>
                                        <?php echo $_SESSION['session_info']->address2; ?>
                                        <br />
                                        <br />
                                        <strong>City, state, & zip code: </strong>
                                        <?php echo $_SESSION['session_info']->city.", ".$_SESSION['session_info']->state." ".$_SESSION['session_info']->zipCode; ?>
                                        <br />
                                        <br />
                                        <strong>Telephone number: </strong>
                                        <?php echo $_SESSION['session_info']->telephone; ?>
                                        <br />
                                        <br />
                                        <?php
                                        ?>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <br/>
                                        
                                        <h2>Billing address</h2>
                                       
                                        <br />
                                        <strong>Name: </strong>
                                        <?php echo $_SESSION['session_info']->firstnameB." ".$_SESSION['session_info']->lastnameB; ?>
                                        <br />
                                        <br />
                                        <strong>Address: </strong>
                                        <?php echo $_SESSION['session_info']->addressB; ?>
                                        <br />
                                        <br />
                                        <strong>Address line 2: </strong>
                                        <?php echo $_SESSION['session_info']->address2B; ?>
                                        <br />
                                        <br />
                                        <strong>City, state, & zip code: </strong>
                                        <?php echo $_SESSION['session_info']->cityB.", ".$_SESSION['session_info']->stateB." ".$_SESSION['session_info']->zipCodeB; ?>
                                        <br />
                                        <br />
                                        <strong>Telephone number: </strong>
                                        <?php echo $_SESSION['session_info']->telephoneB; ?>
                                        <br />
                                        <br />
                                    </div>
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                </div>

                                <div class="row" style="border-bottom:2px solid darkgreen;width:100%">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <br>
                                           <br>
                                           <br>
                                            <h2>Other information: </h2>
                                            <br />
                                            <strong>Email address: </strong>
                                            <?php echo $_SESSION['session_info']->email; ?>
                                            <br />
                                            <br />
                                            <strong>Shipping rate: </strong>
                                            <?php echo $_SESSION['session_info']->shipping; ?>
                                        
                                        <br />
                                        <br />
                                    </div>
                                    <br />
                                    <br />
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <br />
                                        <h2>Credit card details: </h2>
                                        <br />
                                        <strong>Card number:  </strong>
                                        <?php echo $_SESSION['session_card']->number; ?>
                                        <br />
                                        <br />
                                        <strong>Expiration date: </strong>
                                        <?php echo $_SESSION['session_card']->date; ?>
                                        <br />
                                        <br />
                                        <strong>CVV number  </strong>
                                        <?php echo $_SESSION['session_card']->cnumber; ?>
                                        <br />
                                        <br />
                                        <strong> Name on card:</strong>
                                        <?php echo $_SESSION['session_card']->cname; ?>
                                        <br />
                                        <br />
                                        <br />
                                    </div>
                                </div>

                            <div class="row" style="width:100%">
                                <table cellpadding="20px" width="100%" style="border-collapse:collapse;border-bottom:2px solid darkgreen;">
                                    <?php
                                    $cart=new cart();
                                    $i=0;
                                    $numItems=0;
                                    $total=0;
                                    reset($session_cart);

                                    foreach($session_cart as $item){
                                        $numItems++;
                                    }
                                    if($numItems==0){
                                        ?>
                                        <tr style='border-bottom:darkgreen solid 2px'>
                                            <td colspan="4"></td>
                                            <td colspan="3">
                                                <h2>Is empty!</h2>
                                            </td>
                                        </tr>
                                        <?php
                                    }else{
                                        foreach($session_cart as $i=>$item){
                                            $namefix=$item->name;
                                            $namefix=str_replace(" ","",$namefix);
                                            $image="images/$namefix.png";
                                            ?>

                                            <tr style='border-bottom:darkgreen solid 2px'>
                                                <td>
                                                    <?php $i ?>
                                                </td>
                                                <td>
                                                    <img src='<?php echo $image ?>' alt='small image'>
                                                </td>
                                                <td>
                                                    <a href="product<?php echo $namefix ?>.html"><?php echo $item->name ?></a>
                                                </td>
                                                <td align='right'>
                                                    $ <?php echo $item->price ?>
                                                </td>
                                                <td align='right'>
                                                    X <?php echo $item->quantity ?>
                                                </td>
                                                <td style='font-size:large;font-weight:bold' align="right">
                                                    &#8377; <?php echo number_format(($item->price*$item->quantity),2) ?>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                            <?php
                                            $total=$total+($item->price*$item->quantity);
                                        }
                                    }
                                    ?>

                                    <tr>
                                        <td colspan="4">
                                        </td>
                                        <td align="right">
                                            <span style='font-size:large;font-weight:bold'>
                                                Sub-total: $
                                                <?php echo number_format($total,2); ?>
                                                <br />
                                                8% tax: $
                                                <?php
                                                echo number_format(($total*.08),2);
                                                $total=$total+($total*.08)+10;
                                                ?>
                                                <br />
                                                Shipping: $
                                                <?php echo number_format(2,2); ?>
                                                <br />
                                                <br />
                                            </span>
                                            <h2>
                                                Total: $
                                                <?php echo number_format($total,2) ?>
                                            </h2>
                                        </td>
                                        <td colspan="2">
                                        </td>
                                    </tr>
                                </table>
                                <br />
                            </div>
                            <br />

                         <div class="row" style="width:100%">
                            <div align="center" style="width:100%">
                                <input type="hidden" name="Desired_Action" value="clear">
                                <input type="submit" class="btn btn-primary btn-lg" value="Submit Order">
                                </div>
                            </div>
                            <br />
                            <br />
                        </div>
                        <br />
                    </div>
                </form>
            
            <br />
            <br />
        </div>
        <br>
        <br>
        <?php include"includes/footer.php"; ?>
    </body>
</html>