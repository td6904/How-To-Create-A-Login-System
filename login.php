<?php

include_once 'header.php';
//.inc means includes (a script for example)
?>

<section class="signup-form">
    <h2>Login</h2>
    <div class="signup">
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="name" placeholder="Username/Email">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit" name="submit">Login</button>
    </form>
    </div>
</section>

<?php

include_once 'footer.php';
