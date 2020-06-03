$(document).ready(function() {
    $.getJSON('https://cors-anywhere.herokuapp.com/api.kawalcorona.com/indonesia', function(result) {
        let indoText = result[0].name;
        let positif = result[0].positif;
        let sembuh = result[0].sembuh;
        let meninggal = result[0].meninggal;
        $('.hasil-corona').append(`
            <h3 class="font-weight-bold mb-3">`+ indoText +`</h3>
            <div class="row mr-4 text-center">
              <div class="col-md-6">
                <h4 class="font-weight-bold">Positif</h4>
                <h5 class="alert alert-warning" role="alert" style="font-size: 50px">`+ positif +`</h5>
              </div>
              <div class="col-md-6">
                <h4 class="font-weight-bold">Meninggal</h4>
                <h5 class="alert alert-danger" role="alert" style="font-size: 50px">`+ sembuh +`</h5>
              </div>
            </div>
            <div class="row text-center mr-4">
              <div class="col-md-12">
                <h4 class="font-weight-bold">Sembuh</h4>
                <h5 class="alert alert-success" role="alert" style="font-size: 50px">`+ meninggal +`</h5>
              </div>
            </div>    
        `);
    });
})

$.getJSON('https://cors-anywhere.herokuapp.com/api.kawalcorona.com/indonesia/provinsi', function(result) {
    let json = result;
    $.each(json, function(i, data) {
        let provinsi = data.attributes.Provinsi;
        $('#pilih').append(`
            <option id="`+ i +`">` + provinsi + `</option>
        `);
    });
    $('#pilih').on('change', function() {
        let id = $('#pilih option:selected').attr('id');
        let provinsiText = $('#pilih option:selected').val();
        let hasilPositif = json[id].attributes.Kasus_Posi;
        let hasilSembuh = json[id].attributes.Kasus_Semb;
        let hasilMeninggal = json[id].attributes.Kasus_Meni;
        $('.hasil-corona').html('');
        $('.hasil-corona').append(`
            <h3 class="font-weight-bold mb-3">`+ provinsiText +`</h3>
            <div class="row mr-4 text-center">
              <div class="col-md-6">
                <h4 class="font-weight-bold">Positif</h4>
                <h5 class="alert alert-warning" role="alert" style="font-size: 50px">`+ hasilPositif +`</h5>
              </div>
              <div class="col-md-6">
                <h4 class="font-weight-bold">Meninggal</h4>
                <h5 class="alert alert-danger" role="alert" style="font-size: 50px">`+ hasilSembuh +`</h5>
              </div>
            </div>
            <div class="row text-center mr-4">
              <div class="col-md-12">
                <h4 class="font-weight-bold">Sembuh</h4>
                <h5 class="alert alert-success" role="alert" style="font-size: 50px">`+ hasilMeninggal +`</h5>
              </div>
            </div>
        `);
    }); 
});