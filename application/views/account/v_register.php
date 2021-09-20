<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="POST" action="<?= base_url('Register/add'); ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" placeholder="Full name" name="name" value="<?= set_value('name'); ?>">
                                <small class=" text-danger">
                                    <?= form_error('name'); ?>
                                </small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" placeholder="Email Address" name="email" value="<?= set_value('email'); ?>">
                                <small class="text-danger">
                                    <?= form_error('email'); ?>
                                </small>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" placeholder="Password" name="password">
                                    <small class="text-danger">
                                        <?= form_error('password'); ?>
                                    </small>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" placeholder="Repeat Password" name="password_conf">
                                    <small class="text-danger">
                                        <?= form_error('password_conf'); ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control form-control-user" name="userfile" value="<?= set_value('userfile'); ?>">
                                <small class="text-danger">
                                    <?= form_error('userfile'); ?>
                                </small>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('Forgot_password') ?>">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('home') ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>