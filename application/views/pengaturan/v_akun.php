<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3 class="my-1">Pengaturan Akun</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-4 col-sm-12">
                <div class="x_panel">
                    <i class="fa fa-edit"></i> Username / Password Login
                    <hr>
                    <form action="<?= base_url('akun/update_userpass'); ?>" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user_name" value="<?= $user_name; ?>" class="form-control form-control-sm" required="">
                            <?= form_error('user_name', '<small class="text-danger pl-1 font-italic">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="user_password" class="form-control form-control-sm" required="">
                            <?= form_error('user_password', '<small class="text-danger pl-1 font-italic">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="user_password2" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update_user_pass" class="btn btn-sm btn-success btn_flat">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="x_panel">
                    <i class="fa fa-edit"></i> Data
                    <hr>
                    <form action="<?= base_url('akun/update_userdata'); ?>" method="post">
                        <input type="hidden" name="user_namelama" value="">
                        <div class="form-group">
                            <input type="hidden" name="id" value="">
                            <label>Nama Lengkap</label>
                            <input type="text" name="user_fullname" class="form-control form-control-sm" value="<?= $user_fullname; ?>" required="">
                        </div>
                        <div class=" form-group">
                            <label>Email</label>
                            <input type="text" name="user_email" class="form-control form-control-sm" value="<?= $user_email; ?>" required="">
                            <?= form_error('user_email', '<small class="text-danger pl-1 font-italic">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update_data_akun" class="btn btn-sm btn-success btn_flat">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="x_panel">
                    <i class="fa fa-edit"></i> Photo
                    <hr>
                    <form action="<?= base_url('akun/update_userphoto'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group text-center">
                            <input type="hidden" name="fotolama" value="">
                            <?php if (empty($user_photo)) : ?>
                                <img id="fotolama" src="<?= base_url('assets/images/default.jpg'); ?>" style="width: 121px; height: 121px; border-radius: 50%; border: 1px solid #bcbcbc;">
                            <?php else : ?>
                                <img id="fotolama" src="<?= base_url('assets/images/' . $user_photo); ?>" style="width: 121px; height: 121px; border-radius: 50%; border: 1px solid #bcbcbc;">
                            <?php endif; ?>
                        </div>
                        <div class="form-group" style="margin-top: 23px;">
                            <label for="photo">Photo</label>
                            <input type="file" accept="image/jpg, image/jpeg, image/png" name="user_photo" class="form-control form_control_file form-control-sm mb-1" onchange="readURL(this);" required="">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update_photo" class="btn btn-sm btn-success btn_flat">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $footer; ?>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#fotolama')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>