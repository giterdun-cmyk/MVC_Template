    <img src="../images/logo.png" class="logo mt-2">
    
    <div class="row">
        <div class="accordion mt-4 mx-auto" id="signupAccordion">


            <!-- Sign-up Start -->

            <div class="card mt-5">
                <div class="card-header sign" id="signupCard" data-toggle="collapse" data-target="#signupCardBody">
                    <h4 class="sign-title">Sign up for <?=APP_NAME?></h4>
                </div>
                <div class="card-body collapse info1" id="signupCardBody" data-parent="#signupAccordion">
                    <?php echo (!empty($_SESSION["create_account_msg"] ) ) ? $_SESSION["create_account_msg"] : ''; ?>
                    <form action="/users/add.php" method="post">
                        <input type="text" class="form-control mb-3" name="username" placeholder="Username" required>
                        <input type="email" class="form-control mb-3" name="email" placeholder="Email Address" required>
                        <input type="password" class="form-control mb-3" name="password" placeholder="Password" required>
                        <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required>
                        <hr>
                        <h5 class="signup">Profile Info</h5>
                        <input type="text" class="form-control mb-3" name="firstname" placeholder="First Name" required>
                        <input type="text" class="form-control mb-3" name="lastname" placeholder="Last Name" required>
                        <textarea class="form-control" name="bio" placeholder="Bio" required></textarea>
                        <div class="text-right">

                            <button type="submit" class="create-btn mt-3"><img src="../images/account-btn.png" class="create-btn"></button>

                        </div>
                    </form>
                </div>
            </div><!-- Signup End -->


            <div class="card">
                <div class="card-header log" id="loginCard" data-toggle="collapse" data-target="#loginCardBody">
                    <h4 class="log-title">Login</h4>
                </div>
                <div class="card-body collapse show info" id="loginCardBody" data-parent="#signupAccordion">
                <?php echo (!empty($_SESSION["login_attempt_msg"] ) ) ? $_SESSION["login_attempt_msg"] : ''; ?>
                    <form action="/users/login.php" method="post">
                        <input type="text" name="username" class="form-control mb-3" placeholder="Username or Email" required>
                        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember" value="true">
                            <label for="remember" class="remember">Remember Me</label>
                        </div>
                        <div class="text-right">
                            
                            <button type="submit" class="login-btn"><img src="../images/login-btn.png" class="login-btn"></button>
                          
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- Accordion End -->
        <?php
        unset($_SESSION["login_attempt_msg"]);
        unset($_SESSION["create_account_msg"]);
        ?>
    </div><!-- Row End -->

    <img src="../images/Image 8.png" class="lego1">