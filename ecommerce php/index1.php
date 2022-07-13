<?php 
session_start();
include("head1.php");
if(isset($_SESSION['username']))

?>
    <div class="registration-form">

            <form action="login1.php" method="post">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" name="username" class="form-control item" id="username" placeholder="Username" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="pass" class="form-control item" id="password" placeholder="Password" autocomplete="new-password">
            </div>
            
            
            
            <div class="form-group">
            <input type="submit" value="login" name="login">
        </div>
        </form>
        <div class="social-media">
            <h5>Sign up with social media</h5>
            <div class="social-icons">
                
            </div>
        </div>
    </div>
 
