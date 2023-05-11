<!--header starts-->
<header id="header" class="header-scroll top-header headrom">
    <!-- .navbar -->
    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#mainNavbarCollapse">&#9776;
            </button>
            <a class="navbar-brand" href="./index.php"> <img class="img-rounded" style="width: auto; height: 35px;" src="images/the-green-logo.png"
                                                             alt="">
            </a>
            <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home<span
                                    class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link active" href="restaurants.php">Restaurants <span
                                    class="sr-only"></span></a></li>

                    <?php
                    if (empty($_SESSION["user_id"])) // if user is not login
                    {
                        echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Signup</a> </li>';
                    } else {
                        //if user is login
                        echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Orders</a> </li>';
                        echo '<li class="nav-item"><button id="open-profile-modal" class="nav-link active">My profile</button> </li>';
                        echo '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                    }
                    ?>

                </ul>

            </div>
        </div>
    </nav>
    <!-- /.navbar -->
</header>