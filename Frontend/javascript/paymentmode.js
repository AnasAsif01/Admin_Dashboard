var vendorid = document.getElementById("vendorid").value;


$.ajax({
    type: "POST",
    url: "../Backend/paymentmode.php",
    data: {
      vendorid: vendorid
    },
    cache: false,
    success: function (data) {
      if(data==0)
      {
        var progressBarData = '';
        var colors = ['bg-danger', 'bg-warning', 'bg-primary', 'bg-success'];
      
          progressBarData += '<h4 class="small fw-bold"> PayPal<span class="float-end">' + 0+ '%</span></h4>';
          progressBarData += '<div class="progress mb-4">';
          progressBarData += '<div class="progress-bar ' + colors[0] + '" aria-valuenow="' +0+ '" aria-valuemin="0" aria-valuemax="100" style="width: ' +0 + '%;"><span class="visually-hidden">' + 0+ '%</span></div>';
          progressBarData += '</div>';
        
         $('#progressBarContainer').html(progressBarData);
         progressBarData += '<h4 class="small fw-bold">' + 'Debit Card' + '<span class="float-end">' + 0+ '%</span></h4>';
         progressBarData += '<div class="progress mb-4">';
         progressBarData += '<div class="progress-bar ' + colors[1] + '" aria-valuenow="' +0+ '" aria-valuemin="0" aria-valuemax="100" style="width: ' +0 + '%;"><span class="visually-hidden">' + 0+ '%</span></div>';
         progressBarData += '</div>';
       
        $('#progressBarContainer').html(progressBarData);
        progressBarData += '<h4 class="small fw-bold">ApplePay<span class="float-end">' + 0+ '%</span></h4>';
        progressBarData += '<div class="progress mb-4">';
        progressBarData += '<div class="progress-bar ' + colors[3] + '" aria-valuenow="' +0+ '" aria-valuemin="0" aria-valuemax="100" style="width: ' +0 + '%;"><span class="visually-hidden">' + 0+ '%</span></div>';
        progressBarData += '</div>';
      
       $('#progressBarContainer').html(progressBarData);
       progressBarData += '<h4 class="small fw-bold">Direct<span class="float-end">' + 0+ '%</span></h4>';
       progressBarData += '<div class="progress mb-4">';
       progressBarData += '<div class="progress-bar ' + colors[2] + '" aria-valuenow="' +0+ '" aria-valuemin="0" aria-valuemax="100" style="width: ' +0 + '%;"><span class="visually-hidden">' + 0+ '%</span></div>';
       progressBarData += '</div>';
     
      $('#progressBarContainer').html(progressBarData);
      }
      else
      {

      
  
      var paymentmodeplace = data.map(function (item) {
        return item.place;
      });
      var paymentpercentage = data.map(function (item) {
        return item.percentage;
      });

      // Populate the progress bars with the retrieved data
      var progressBarData = '';
      var colors = ['bg-danger', 'bg-warning', 'bg-primary', 'bg-success'];
      for (var i = 0; i < data.length; i++)
      {
        var colorIndex = i % 4;
        progressBarData += '<h4 class="small fw-bold">' + data[i].paymentmode + '<span class="float-end">' + data[i].percentage + '%</span></h4>';
        progressBarData += '<div class="progress mb-4">';
        progressBarData += '<div class="progress-bar ' + colors[colorIndex] + '" aria-valuenow="' + data[i].percentage + '" aria-valuemin="0" aria-valuemax="100" style="width: ' + data[i].percentage + '%;"><span class="visually-hidden">' + data[i].percentage + '%</span></div>';
        progressBarData += '</div>';
      }
       $('#progressBarContainer').html(progressBarData);
    }
    },
    
    error: function (xhr, status, error) {
      console.error(error);
    }
  });
