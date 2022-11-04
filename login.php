<?php

include_once 'header.php';
//.inc means includes (a script for example)
?>

<section class="signup-form">
    <h2>Login</h2>
    <div class="signup">
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username/Email">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit" name="submit">Login</button>
    </form>
    </div>
    <?php
    if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
            echo '<p>Fill in all fields!</p>';
            }
            else if ($_GET["error"] == "wronglogin") {
                echo '<p>Incorrect login info!</p>';
            }
        }

?>
</section>

<?php

include_once 'footer.php';
