  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; BookMAL <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingin Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik tombol "Logout" jika ingin logout.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets'); ?>/js/jquery.js"></script>
  <script src="<?= base_url('assets'); ?>/js/bootstrap.bundle.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets'); ?>/js/jquery.easing.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets'); ?>/js/sb-admin-2.js"></script>
  <script>
    function searchAnime() {
      $('#anime-list').html('');

      $.ajax({
        url: 'https://api.jikan.moe/v3/search/anime',
        type: 'get',
        dataType: 'json',
        data: {
            'q': $('#search').val(),
            'limit': 5,
        },
        success: function(result) {
          let anime = result.results;
            $.each(anime, function(i, data) {
              $('#anime-list').append(`
                <div class="col-sm-3">
                  <div class="card mb-3">
                    <img src="`+ data.image_url +`" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">`+ data.title +`</h5>
                      <p class="card-text">Rating `+ data.score +`</p>
                      <a href="`+ data.url +`" class="btn btn-primary">Lihat selengkapnya</a>
                      <a href="#" class="btn btn-secondary mt-2" name="tambahkan">Tambahkan</a>
                    </div>
                  </div>
                </div>
                `);
            });
          $('#search').val('');
        }
      });
    }


    $('#search-button').on('click', function() {
      searchAnime();
    });

    $('#search').on('keyup', function(e) {
      if (e.which === 13) {
        searchAnime();
      }
    });
  </script>
</body>

</html>