<?php
try {
    require('connection.php');
    $sql = "SELECT * FROM `menu` WHERE 1";
    if (isset($_POST['nav'])) {
        extract($_POST);
        $sql = "SELECT * FROM `menu` WHERE name like '$nav%'";
    }
    if (isset($_GET['search'])) {
        extract($_GET);
        $sql = "SELECT * FROM `menu` WHERE name like '$search%'";
    }
    $req = $db->query($sql);
    $row = $req->fetchAll();
    foreach ($row as $key => $meal) {
        if ($meal[3] == "Burger")
            $burger[] = $meal;
        else if ($meal[3] == "Snack")
            $snack[] = $meal;
        else if ($meal[3] == "Salad")
            $salad[] = $meal;
        else if ($meal[3] == "Drink")
            $drink[] = $meal;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();;
}
?>
<?php
// if (isset($_POST))
// extract($_POST);
if (isset($nav)) { ?>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 align-items-center">
        <?php if (isset($burger)) { ?>
            <a class="navbar-brand text-decoration text-light" href="#burger">
                <i class="fas fa-hamburger"></i> Burgers
            </a>

        <?php }
        if (isset($snack)) { ?>

            <a class="navbar-brand text-decoration text-light" href="#snaks">
                <i class="fas fa-utensils"></i> Snacks & Sides</a>

        <?php }
        if (isset($salad)) { ?>

            <a class="navbar-brand text-decoration text-light" href="#salad">
                <i class="fas fa-seedling"></i> Salad
            </a>
        <?php }
        if (isset($drink)) { ?>
            <a class="navbar-brand text-decoration text-light" href="#drink">
                <i class="fas fa-glass-martini-alt"></i> Drink
            </a>
        <?php } ?>
    </ul>
<?php } ?>

<?php
if (!isset($nav)) {
    if (isset($burger)) { ?>
        <nav class="navbar navbar-expand-lg navbar-dark navcolor">Burger</nav>
        <h2 id="burger" class="lead text-monospace"></h2>

        <div class="single-menu row">
            <?php
            foreach ($burger as $key => $mealDetails) {
                echo "<div class='col-12 col-md-6'>";
                echo "<img src='imagesMenu/$mealDetails[4]' alt='' class='img-fluid' />";
                echo "<div class='menu-content'>";
                echo "<h4>$mealDetails[1]<span>BD$mealDetails[2]</span></h4>";
                echo "<p>
                                $mealDetails[5]
                            </p>";
                // echo "<i class='bx bx-cart-alt'></i>";
                echo "<i class='bx bx-cart-alt m-1'>Add</i>";
                echo "</div></div>";
            }
            ?>
        </div>
    <?php }
    if (isset($snack)) { ?>
        <nav class="navbar navbar-expand-lg navbar-dark navcolor">SNACKS</nav>
        <h2 id="snaks" class="lead text-monospace"></h2>
        <div class="single-menu row">
            <?php
            foreach ($snack as $key => $mealDetails) {
                echo "<div class='col-12 col-md-6'>";
                echo "<img src='imagesMenu/$mealDetails[4]' alt='' class='img-fluid' />";
                echo "<div class='menu-content'>";
                echo "<h4>$mealDetails[1]<span>BD$mealDetails[2]</span></h4>";
                echo "<p>
                                $mealDetails[5]
                            </p>";
                echo "<i class='bx bx-cart-alt'>Add</i>";
                echo "</div></div>";
            }
            ?>
        </div>
    <?php }
    if (isset($salad)) { ?>
        <nav class="navbar navbar-expand-lg navbar-dark navcolor">Salad</nav>
        <h2 id="salad" class="lead text-monospace"></h2>
        <div class="single-menu row">
            <?php
            foreach ($salad as $key => $mealDetails) {
                echo "<div class='col-12 col-md-6'>";
                echo "<img src='imagesMenu/$mealDetails[4]' alt='' class='img-fluid' />";
                echo "<div class='menu-content'>";
                echo "<h4>$mealDetails[1]<span>BD$mealDetails[2]</span></h4>";
                echo "<p>
                                $mealDetails[5]
                            </p>";
                echo "<i class='bx bx-cart-alt'>Add</i>";
                echo "</div></div>";
            }
            ?>
        </div>

    <?php }
    if (isset($drink)) { ?>
        <nav class="navbar navbar-expand-lg navbar-dark navcolor">Drinks</nav>
        <h2 id="drink" class="lead text-monospace"></h2>
        <div class="single-menu row">
            <?php
            foreach ($drink as $key => $mealDetails) {
                echo "<div class='col-12 col-md-6'>";
                echo "<img src='imagesMenu/$mealDetails[4]' alt='' class='img-fluid' />";
                echo "<div class='menu-content'>";
                echo "<h4>$mealDetails[1]<span>BD$mealDetails[2]</span></h4>";
                echo "<p>
                                $mealDetails[5]
                            </p>";
                echo "<i class='bx bx-cart-alt'>Add</i>";
                echo "</div></div>";
            }
            ?>
        </div>
<?php }
} ?>