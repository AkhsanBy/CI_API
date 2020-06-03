  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
  </div>

	<div class="row">
		<div class="col-sm-7">
			<?= $this->session->flashdata('pesan'); ?>
		</div>
	</div>

  <div class="row">
		<div class="col-lg-6">
			<form action="<?= base_url('user/editPassword'); ?>" method="post">
			  <div class="form-group">
			    <label for="passwordLama">Password Lama</label>
			    <input type="password" class="form-control" id="passwordLama" name="passwordLama">
			  </div>
			  <div class="form-group">
			    <label for="passwordBaru">Password Baru</label>
			    <input type="password" class="form-control" id="passwordBaru" name="passwordBaru">
			  </div>
			  <div class="form-group">
			    <label for="passwordBaru1">Ulangi Password</label>
			    <input type="password" class="form-control" id="passwordBaru1" name="passwordBaru1">
			  </div>
			  <button type="submit" class="btn btn-primary mt-3">Edit!</button>
		  	</form>
		</div>
	</div>