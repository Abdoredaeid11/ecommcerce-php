<?php 
include("head.php");

?>
    <div class="registration-form">

            <form action="signin.php" method="post">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" name="username" class="form-control item" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="pass" class="form-control item" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control item" id="email" placeholder="Email">
            </div>
            
            
            <div class="form-group">
            <input type="submit" value="signin" name="submit">
        </div>
        </form>
        <div class="social-media">
            <h5>Sign up with social media</h5>
            <div class="social-icons">
                
            </div>
        </div>
    </div>
 
