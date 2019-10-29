<?php
$stockArray = array(
    array("chicken fried rice",700,"true","","","chicken_fried_rice.jpg"),
    array("barbecued burger",650,"true","","","barbecued_burger.jpg"),
    array("french fries",300,"true","","","french_fries.jpg"),
    array("fried chicken",700,"true","","","fried_chicken.jpg"),
    array("fried fish",600,"true","","","fried_fish.jpg"),
    array("fried rice",500,"true","","","fried_rice.jpg"),
    array("pizza",2500,"true","","","pizza.jpg"),
    array("fried plaintains",250,"true","","","fried_plantains.jpg"),
    array("fried fish",600,"true","","","fried_fish.jpg"),
    array("fried rice",500,"true","","","fried_rice.jpg"),
    array("pizza",2500,"true","","","pizza.jpg"),
    array("fried plaintains",250,"true","","","fried_plantains.jpg"),
    array("shawarma",800,"true","","","shawarma.jpg")
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/jquery.min.js"></script>
    <link rel="stylesheet" href="files/main.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="files/main.js"></script>
    <style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
    </style>
    <title>HOME</title>
</head>

<body class="">
    <main>
        <header id="header" class="">
            <nav class="navbar navbar-fixed-top container-fluid">
                <div class=" container-fluid">
                    <div class="navbar-header">
                        <div class="navbar-brand">
                            <a href="#">BRAND LOG AND NAME</a>
                        </div>
                        <button class="navbar-toggle" data-toggle="collapse" data-target="#navbarNav">
                            <span class="glyphicon glyphicon-option-horizontal"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse" id="navbarNav">
                        <ul class="navbar-nav nav navbar-right">
                            <!-- <li><a class="navbar-btn btn-default" href="index.php" id="homeBtn"><span
                                    class="glyphicon glyphicon-home"></span>
                                Home
                            </a></li> -->
                            <!-- <li><a class="navbar-btn" href="#" id="profileBtn" onclick=""><span
                                    class="glyphicon glyphicon-user">
                                    Profile</span></a></li> -->
                            <li><a class="navbar-btn" href="#" id="cartBtn"><span
                                        class="glyphicon glyphicon-shopping-cart"></span>
                                    CART <span class="badge"></span>
                                </a> </li>
                            <li><a class="navbar-btn" href="#" id="logOutBtn"><span
                                        class="glyphicon glyphicon-comment"></span>
                                    HELP DESK
                                </a></li>
                            <li><a class=" navbar-btn" href="#" id="logOutBtn"><span
                                        class="glyphicon glyphicon-log-in"></span>
                                    LOG IN
                                </a></li>
                            <li>
                                <div class="navbar-form navbar-left">
                                    <div class="input-group row">
                                        <input type="text" class="form-control col-xs-12" placeholder="Search"
                                            id="newFriendSearch" autocomplete="off">
                                    </div>
                                    <div id="searchDisplay"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button id="requestOrderBtn" class=" btn btn-success" style="float: right"> Request Order</button>
                </div>
            </nav>
            <div id="slider_container" class="row">
                <div id="" class="col-lg-2 col-md-2 col-sm-12  col-xs-6">n</div>
                <div id="images" class="col-lg-9 col-md-9 col-sm-12  col-xs-6">
                    <div>

                    </div>
                    <!-- <ul class=" carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
                    <div id="image_container demo" class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/shawarma.jpg" alt="fried_fish.jpg" id="img1" width="1100" height="500"
                                class="active" />
                        </div>
                        <div class="carousel-item ">
                            <img src="images/fried_fish.jpg" alt="fried_fish.jpg" id="img2" width="1100" height="500" />
                        </div>
                        <div class="carousel-item">
                            <img src="images/pizza.jpg" alt="fried_fish.jpg" id="img3" width="1100" height="500" />
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                     <div>caption</div>
                </div> -->
                    <div id="" class="col-lg-1 col-md-1 hidden-sm  hidden-xs">mnnnn</div>
                </div>
        </header>
        <div id=" body">
            <div class=" row">
                <?php
            for($i = 0; $i < count($stockArray); $i++){
                setItem($i, $stockArray);
    }
    ?>
                <div id="cartModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header row">
                                <h3 class="col-sm-11 tetx-primary">CART</h3>
                                <a href="#" class="btn btn-danger close col-sm-1" data-dismiss="modal">&times;</a>
                            </div>
                            <div class="modal-body">
                                <div id="cartRun">
                                    <table class="table table-responsive table-striped">
                                        <thead>
                                            <th>MENU</th>
                                            <th>QUANTITY</th>
                                        </thead>
                                        <tbody id="cartBody"> </tbody>
                                        <!-- <div id="o"></div> -->
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#" id="proceedBtn" class="btn btn-primary brn-md">PROCEED</a>
                                <!-- <a href="#" class="btn btn-warning brn-md">CANCEL</a> -->
                                <a href="#" id="clearModal" class=" btn btn-danger brn-md"
                                    data-dismiss="modal">CLEAR</a>
                            </div>
                        </div>
                    </div>
                </div>
                //receiptModal
                <div id="receiptModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header row">
                                <h3 class="col-sm-11 tetx-primary">RECEIPT</h3>
                                <a href="#" class="btn btn-danger close col-sm-1" data-dismiss="modal">&times;</a>
                            </div>
                            <div class="modal-body">
                                <div id="receiptRun"> </div>
                                <!-- <form action="#">
                                    ws
                                </form> -->
                            </div>
                            <div class="modal-footer">
                                <a href="#" id="placeOrderBtn" class="btn btn-primary brn-md">PLACE ORDER</a>
                                <!-- <a href="#" class="btn btn-warning brn-md">CANCEL</a> -->
                                <a href="#" id="goToCart" class=" btn btn-danger brn-md" data-dismiss="modal">Go To
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>

</html>
<?php
            setItem($i, $stockArray);
function setItem($index, $stockArray_){
    if(isset($_COOKIE["cart".$index])){
             echo "".
                "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>".
                    "<div class='thumbnail'>".
                        "<img src='images/".$stockArray_[$index][5]."' alt='".$stockArray_[$index][0]."' class='img-responsive img-thumbnail'>".
                        "<div class='caption'>".
                            "<p>".$stockArray_[$index][0]." - NGN ". $stockArray_[$index][1]."</p>".
                            "<button class='btn btn-success btn-block addBtn' id='$index' style='display:none'> add to cart</button> ".
                            "<button class='btn btn-danger btn-block removeBtn' value='$index' id='{$index}remove'> remove from cart</button>".
                        "</div>".
                    "</div>".
                "</div>";
    }else {
        
        echo "".
                "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>".
                    "<div class='thumbnail'>".
                        "<img src='images/".$stockArray_[$index][5]."' alt='".$stockArray_[$index][0]."' class='img-responsive img-thumbnail'>".
                        "<div class='caption'>".
                            "<p>".$stockArray_[$index][0]." - NGN ". $stockArray_[$index][1]."</p>".
                            "<button class='btn btn-success btn-block addBtn' id='$index'> add to cart</button> ".
                            "<button class='btn btn-danger btn-block removeBtn' value='$index' id='{$index}remove' style='display:none'> remove from cart</button>".
                        "</div>".
                    "</div>".
                "</div>";
            }
}