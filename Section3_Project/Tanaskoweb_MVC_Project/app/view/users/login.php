<?php  require APPROOT . '/view/inc/header.php'; ?>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Login</h2>
                <p>Please fill in your credentials to Log In</p>
                <form action="<?php echo URLROOT; ?>/users/login" method="post">
                <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                        <spam class="invalid-feedback"><?php echo $data['email_err']; ?></spam>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                        <spam class="invalid-feedback"><?php echo $data['password_err']; ?></spam>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="submit" class="btn btn-success btn-block" value="Login">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">
                                No account? Register
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

<?php  require APPROOT . '/view/inc/footer.php'; ?>