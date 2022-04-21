<nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="navbar-brand" href="index.php">
                            <img class="logo d-none d-lg-block" src="images/threeGuysLogo.jpg" width="30" height="30" alt="" loading="lazy" />
                            <!-- <img class="logo d-none d-lg-block" width="30" height="30" alt="" loading="lazy" /> -->
                        </a>
                    </li>
                </ul>
                <div class="right-side-nav">
                    <ul class="navbar-nav navbar-left">
                        <li class="nav-item mt-1 ml-lg-3 mt-lg-3">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item mt-lg-3">
                            <a class="nav-link active" href="about.php">About</a>
                        </li>
                        <li class="nav-item mt-lg-3">
                            <a class="nav-link active" href="showMenu.php">Menu</a>
                        </li>
                        <?php
                        if (isset($_SESSION['Admin']) || isset($_SESSION['Staff']))
                            echo " <li class='nav-item mt-lg-3'> <a class='nav-link active' href='staffView.php'>STAFF</a> </li> ";
                        if (isset($_SESSION['Admin']))
                            echo " <li class='nav-item mt-lg-3'> <a class='nav-link active' href='adminView.php'>ADMIN</a> </li> ";
                        ?>
                        <li class="nav-item mt-lg-3">
                            <a class="nav-link active" href="myOrders.php">My Orders</a>
                        </li>
                        <li class="nav-item mt-lg-3">
                            <a class="nav-link active" href="historyOrders.php">History Orders</a>
                        </li>
                        <li class="nav-item mt-lg-3">
                            <a class="nav-link" href="showCart.php">
                                <i class="fas fa-shopping-basket"></i>
                            </a>
                        </li>
                        <li class="nav-item mt-lg-3">
                            <a class="nav-link" href="showProfile.php">
                                <i class="fas fa-user-circle"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>