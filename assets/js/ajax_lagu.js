// apikey : a3b26eee3ae568e2baf19c4e81cb1a6e
function mencariLagu() {
    $('#musik-list').html('');

    $.ajax({
        url: 'http://cors-anywhere.herokuapp.com/api.musixmatch.com/ws/1.1/track.search',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': 'a3b26eee3ae568e2baf19c4e81cb1a6e',
            'q_track': $('#cari-musik').val(),
        },
        success: function(hasil) {
            let lagu = hasil.message.body.track_list;
            console.log(lagu);
            $.each(lagu, function(i, data) {
                $('#musik-list').append(`
                    <div class="list-group">
                      <a href="`+ data.track.track_share_url +`" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">`+ data.track.track_name +`</h5>
                        </div>
                        <p class="mb-1">Artist : `+ data.track.artist_name +`</p>
                        <small>Klik untuk lihat lirik lagu</a></small>
                      </a>
                    </div>
                `);
            });
            $('#cari-musik').val('');
        }
    });
}

$('#cari-musik-button').on('click', function() {
    mencariLagu();
});

$('#cari-musik').on('keyup', function(e) {
    if (e.which === 13) mencariLagu();
});