<?= $this->extend('admin/layout/auth-layout') ?>
<?= $this->section('content') ?>
<h3>Log in to enter</h3>

<?php $validation = \Config\Services::validation(); ?>
<form class="row login_form" action="<?= route_to('admin.login.handler') ?>" method="POST" id="contactForm" novalidate="novalidate">
    <?= csrf_field() ?>
    <?php if(!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                <span arial-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('fail') ?>
            <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                <span arial-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="col-md-12 form-group">
        <input type="text" class="form-control" id="name" name="login_id" placeholder="Username"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" value="<?= set_value('login_id') ?>">
    </div>
    <?php if($validation->getError('login_id')) : ?>
        <div class="d-block text-danger" style="margin-top: -25px; margin-bottom: 15px;">
            <span><?= $validation->getError('login_id') ?></span>
        </div>
    <?php endif; ?>
    <div class="col-md-12 form-group">
        <input type="password" class="form-control" id="name" name="password" placeholder="Password"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" value="<?= set_value('password') ?>">
    </div>
    <?php if($validation->getError('password')) : ?>
        <div class="d-block text-danger" style="margin-top: -25px; margin-bottom: 15px;">
            <span><?= $validation->getError('password') ?></span>
        </div>
    <?php endif; ?>
    <div class="col-md-12 form-group">
        <div class="creat_account">
            <input type="checkbox" id="f-option2" name="selector">
            <label for="f-option2">Keep me logged in</label>
        </div>
    </div>
    <div class="col-md-12 form-group">
        <button type="submit" value="submit" class="primary-btn">Log In</button>
        <a href="#">Forgot Password?</a>
    </div>
</form>

<?= $this->endSection() ?>