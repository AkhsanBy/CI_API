  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
  </div>

  <?php
  function getCurl($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result, true);    
  }

  // hasil di Indonesia
  $result = getCurl('https://api.kawalcorona.com/indonesia/');

  $negaraText = $result[0]['name'];
  $positif = $result[0]['positif'];
  $sembuh = $result[0]['sembuh'];
  $meninggal = $result[0]['meninggal'];

  // hasil di berbagai provinsi
  $resultProvinsi = getCurl('https://api.kawalcorona.com/indonesia/provinsi/');
  $data = $resultProvinsi;
  ?>

  <div class="row">
    <div class="col-md-5">
      <form action="" method="post">
        <div class="form-group">
          <label for="pilih">Pilih Provinsi..</label>
          <select class="form-control" id="pilih">
            <option>Pilih...</option>
              <?php for ($i=0; $i<count($data); $i++) : ?>
                <option><?= $data[$i]['attributes']['Provinsi']; ?></option>
              <?php endfor; ?>
          </select>
        </div>
      </form>
    </div>
  </div>

  <div class="hasil-corona">
    <h3 class="font-weight-bold mb-3"><?= $negaraText; ?></h3>
    <div class="row mr-4 text-center">
      <div class="col-md-6">
        <h4 class="font-weight-bold">Positif</h4>
        <h5 class="alert alert-warning" role="alert" style="font-size: 50px"><?= $positif; ?></h5>
      </div>
      <div class="col-md-6">
        <h4 class="font-weight-bold">Meninggal</h4>
        <h5 class="alert alert-danger" role="alert" style="font-size: 50px"><?= $meninggal; ?></h5>
      </div>
    </div>
    <div class="row text-center mr-4">
      <div class="col-md-12">
        <h4 class="font-weight-bold">Sembuh</h4>
        <h5 class="alert alert-success" role="alert" style="font-size: 50px"><?= $sembuh; ?></h5>
      </div>
    </div>
  </div>