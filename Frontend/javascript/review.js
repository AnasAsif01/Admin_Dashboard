
$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "../backend/getvendorreview.php",
    data: {
      vendorid: document.getElementById("vendorid").value
    },
    cache: false,
    success: function (data) {
   console.log(data);
      const parsedData = JSON.parse(data);
      console.log("data:",parsedData.data);
      if (Array.isArray(parsedData.data)) {
        parsedData.data.forEach(function (review) {
         
          var numReview = parseInt(review.review, 10);
          var card = `
          <div class="col-md-6 col-xl-6 mb-4">
          <div class="card shadow border border-info border-left-info py-2" style="background-color:white;">
            <div class="card-body">
            <div class="row">
            <div class="col">
            <h5 class="card-title">${review.name}</h5>
            </div>
            <div class="col">
            <div class="rating" id="rating_${review.reviewid}"></div>
            </div>
            </div>
              <div class="card-text">${review.feedback}</div>
            </div>
          </div>
        </div>
        
          `;
          $('#reviewCards').append(card);
          $("#rating_" + review.reviewid).rateYo({
            rating: numReview,
            readOnly: true,
            starWidth: "20px",
            normalFill: "#A0A0A0",
            ratedFill: "#FFD700"
          });
        });
      } else {
        console.error("No reviews found");
      }
    },
    error: function (xhr, status, error) {
      console.error(error);
    }
  });
});