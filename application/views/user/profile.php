<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
  </div>
	<div class="row">
		<div class="col-sm-5">
			<?= $this->session->flashdata('pesan'); ?>
		</div>
	</div>

	<div class="card mb-3" style="max-width: 540px;">
	  <div class="row no-gutters">
	    <div class="col-md-4">
	      <img src="<?= base_url('assets/img/'). $user['image']; ?>" class="card-img">
	    </div>
	    <div class="col-md-8">
	      <div class="card-body">
	        <h5 class="card-title"><?= $user['username'] ?></h5>
	        <p class="card-text"><?= $user['email'] ?></p>
	        <p class="card-text"><small class="text-muted">Akun dibuat sejak <?= date('d F Y', $user['date_created']); ?></small></p>
	      </div>
	    </div>
	  </div>
	</div>