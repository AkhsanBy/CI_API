<div class="container">

<div class="row justify-content-center">
  <div class="col-xl-10 col-lg-6 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat akun baru!</h1>
              </div>
              <form class="user" action="<?= base_url('auth/register'); ?>" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan username" value="<?= set_value('username'); ?>">
                  <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Ulangi Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Buat Akun</button>
                <hr>
              </form>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Silakan login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>