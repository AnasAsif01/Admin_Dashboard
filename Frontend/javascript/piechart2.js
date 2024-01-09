var vendorid = document.getElementById("vendorid").value;
$.ajax({
  type: "POST",
  url: "../backend/getcategory.php",
  data: {
    vendorid: vendorid,
  },
  cache: false,
  success: function (data) {
    if (data != 0) {
      var productNames = data.map(function (item) {
        return item.name;
      });

      var number_of_products = data.map(function (item) {
        return item.number_of_products;
      });

      const ctx = document
        .getElementById("vendorcategorychart")
        .getContext("2d");
      const myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: productNames,
          datasets: [
            {
              label: "Categories",
              data: number_of_products,
              backgroundColor: [
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255,1)",
                "rgba(255, 159, 64, 1)",
              ],
              borderColor: [
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255,1)",
                "rgba(255, 159, 64, 1)",
              ],
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            yAxes: [
              {
                ticks: {
                  display: false,
                },
              },
            ],
          },
        },
      });
    } else {
      var ctx = document.getElementById("vendorcategorychart").getContext("2d");
      var myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: ["No Product Listed", "", ""],
          datasets: [
            {
              backgroundColor: ["#4e73df"],
              borderColor: ["#ffffff", "#ffffff", "#ffffff"],
              data: [1],
            },
          ],
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false,
          },
          title: {
            display: false,
          },
          tooltips: {
            enabled: true,
            mode: "single",
            callbacks: {
              label: function (tooltipItem, data) {
                return data.labels[tooltipItem.index];
              },
            },
          },
        },
      });
    }
  },
  error: function (xhr, status, error) {
    console.error(error);
  },
});
