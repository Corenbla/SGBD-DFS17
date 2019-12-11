<?php require_once('templates/header.php') ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <?php if (isset($_GET['error'])): ?>
                            <h5 class="text-center text-danger">Error in the form!</h5>
                        <?php endif; ?>
                        <form class="form-signin" method="POST" action="controller/user/login.php">
                            <div class="form-label-group">
                                <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required autofocus>
                                <label for="inputUsername">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once('templates/footer.php') ?>