  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
  </div>

    <div class="row">
        <div class="col-md-5">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari berdasarkan judul musik" id="cari-musik">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="cari-musik-button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
        </div>
    </div>

    <div class="row" id="musik-list">
        
    </div>