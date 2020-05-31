function searchAnime() {
  // mengosongkan elemen html dengan id="anime-list"
  $('#anime-list').html('');

      $.ajax({
        url: 'https://api.jikan.moe/v3/search/anime',
        type: 'get',
        dataType: 'json',
        data: {
            'q': $('#search').val(),
            'limit': 10,
        },
        success: function(result) {
          if (result.request_cached == true) {
            let anime = result.results; // berisi data berbentuk array
              $.each(anime, function(i, data) { // melakukan looping
                $('#anime-list').append(`
                  <div class="col-sm-3">
                    <div class="card mb-3">
                      <img src="`+ data.image_url +`" class="card-img-top">
                      <div class="card-body">
                        <h5 class="card-title">`+ data.title +`</h5>
                        <p class="card-text">Rating `+ data.score +`</p>
                        <a href="`+ data.url +`" class="btn btn-primary">Lihat selengkapnya</a>
                      </div>
                    </div>
                  </div>
                  `);
              });
          } else {
            $('#anime-list').append(`
                <div class="col-sm-8">
                  <h2 class="text-dark ml-3">Anime tidak ditemukan!</h2>
                </div>
              `);
          }
          // mengosongkan kolom pencarian setelah berhasil memberikan hasil
          $('#search').val('');
        }
      });
    }

    // menjalankan function searchAnime() saat tombol cari di klik
    $('#search-button').on('click', function() {
      searchAnime();
    });

    // menjalankan function searchAnime() saat menekan tombol enter 
    $('#search').on('keyup', function(e) {
      if (e.which === 13) searchAnime();
    });