$.ajax({
    url: 'https://api.kawalcorona.com/indonesia/provinsi/',
    type: 'get',
    dataType: 'json',
    headers: {
        'Access-Control-Allow-Origin: *', 
        'Access-Control-Allow-Methods: GET'
    },
    success: function(result) {
        console.log(result);
    }
});