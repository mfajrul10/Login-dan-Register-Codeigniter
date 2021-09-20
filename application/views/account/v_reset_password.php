<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h5 class="h4 text-gray-900 mb-4">Hello
                                        <span>
                                            <?php echo $name; ?>
                                        </span>, Please Reset Your Password
                                    </h5>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form method="POST" action="<?= base_url('Forgot_password/reset_password/token/' . $token); ?>" class="user">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Enter Your New Password..." name="password" value="<?= set_value('password'); ?>">
                                        <small class="text-danger">
                                            <?= form_error('password'); ?>
                                        </small>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="passconf" placeholder="Confirm Your New Password..." name="passconf" value="<?= set_value('passconf'); ?>">
                                        <small class="text-danger">
                                            <?= form_error('passconf'); ?>
                                        </small>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Reset Password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('home') ?>">Back to login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>