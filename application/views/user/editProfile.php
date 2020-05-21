<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
  </div>
	<div class="row">
		<div class="col-lg-6">
			<?php echo form_open_multipart('user/editProfile'); ?>
			  <div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
			    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
			  </div>
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
			    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
			  </div>
			  <div class="row">
			  	<div class="col-sm-5">
			  		<img class="border border-secondary" style="max-width: 100px"; src="<?= base_url('assets/img/'). $user['image']; ?>">
			  	</div>
			  	<div class="col-sm-5">
			  		<div class="form-group">
					    <label for="image">Upload Gambar</label>
					    <input type="file" name="image" id="image">
					</div>
			  	</div>
			  </div>
			  <button type="submit" class="btn btn-primary mt-3">Edit!</button>
			  <a href="<?= base_url('user/profile'); ?>" class="btn btn-secondary mt-3">Batal</a>
		  	</form>
		</div>
	</div>
  	