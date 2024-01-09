
var vendorid = document.getElementById("vendorid").value;
$.ajax({
    type: "POST",
    url: "../backend/getproductprice.php",
    data: {
      vendorid: vendorid
    },
    cache: false,
    success: function (data) {
      var productNames = data.map(function (item) {
        return item.name;
      });
      var productPrices = data.map(function (item) {
        return item.Price;
      });
  
      const ctx = document.getElementById('vendorproductchart').getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: productNames,
          datasets: [{
            label: 'Products by Vendor',
            data: productPrices,
            backgroundColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255,1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }],
          }
        }
      });
    },
    error: function (xhr, status, error) {
      console.error(error);
    }
});