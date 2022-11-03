<?php

include_once 'header.php';
//.inc means includes (a script for example)
?>

<section class="signup-form">
    <h2>Sign up</h2>
    <div class="signup">
    <form action="signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Full name">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="text" name="pwdrepeat" placeholder="Repeat Password">
        <button type="submit" name="submit">Sign up</button>
    </form>
    </div>
</section>

<?php

include_once 'footer.php';
