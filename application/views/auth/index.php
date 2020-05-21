  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div>
                    <?= $this->session->flashdata('pesan'); ?>
                  </div>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silakan login!</h1>
                  </div>
                  <form class="user" action="<?= base_url('auth'); ?>" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Alamat Email" value="<?= set_value('email'); ?>">
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Ingat saya</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                    <hr>
                  </form>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/register'); ?>">Buat akun baru!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>