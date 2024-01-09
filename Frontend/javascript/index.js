
// // $(document).ready(function () {
// //   // get the total number of users
// //   $.ajax({
// //       type: "POST",
// //       url: "../backend/gettotalusers.php",
// //       cache:false,
// //       success: function(data) {
// //         document.getElementById('totalusers').textContent = data.totalUsers;
// //       },
// //       error: function(xhr, status, error) {
// //         console.error(error);
// //       }
// //   });

//   // get the total number of products
//   // $.ajax({
//   //     type: "POST",
//   //     url: "../backend/gettotalproducts.php",
//   //     cache:false,
//   //     success: function(data) {
//   //       document.getElementById('totalproducts').textContent = data.totalProducts;
//   //     },
//   //     error: function(xhr, status, error) {
//   //       console.error(error);
//   //     }
//   // });

//   //get product by vendor
//   var vendorid = document.getElementById("vendorid").value;
//   //var vendorid = document.getElementById("vendorid").value;
//   //var vendorid = 2;

//   $.ajax({
//     type: "POST",
//     url: "../backend/getproductbyvendor.php",
//     data: {
//       vendorid:vendorid
//     },
//     cache:false,
//     success: function(data) {
//       document.getElementById('productbyvendor').textContent = data.totalProducts;
//     },
//     error: function(xhr, status, error) {
//       console.error(error);
//     }
//   });

//   //get blocked users
//   // $.ajax({
//   //     type: "POST",
//   //     url: "../backend/getblockedusers.php",
//   //     cache:false,
//   //     success: function(data) {
//   //       document.getElementById('blockedusers').textContent = data.blockedUsers;
//   //     },
//   //     error: function(xhr, status, error) {
//   //       console.error(error);
//   //     }
//   // });

//   //get total pending requests
//   // alert();
//   // $.ajax({
//   //     type: "POST",
//   //     url: "../backend/getpendingrequests.php",
//   //     cache:false,
//   //     success: function(data) {
       
//   //       document.getElementById('pendingrequests').textContent = data.pendingRequests;
//   //     },
//   //     error: function(xhr, status, error) {
//   //       console.error(error);
//   //     }
//   // });

//   //get total sales
//   var vendorid = document.getElementById("vendorid").value;
//   $.ajax({
//     type: "POST",
//     url: "../backend/getvendorsales.php",
//     data: {
//       vendorid:vendorid
//     },
//     cache:false,
//     success: function(data) {
//       document.getElementById('vendorsales').textContent = data.totalSales;
//     },
//     error: function(xhr, status, error) {
//       console.error(error);
//     }
// });

// //get vendor reviews
// var vendorid = document.getElementById("vendorid").value;
// $.ajax({
// type: "POST",
// url: "../backend/getvendorreviews.php",
// data: {
//   vendorid:vendorid
// },
// cache:false,
// success: function(data) {
//   console.log(data);
//   var avgRating = data.avgRating;
//   var starRating = '';
//   for (var i = 0; i < 5; i++) {
//     if (i < Math.round(avgRating)) {
//       starRating += '<i class="fa fa-star"></i>';
//     } else {
//       starRating += '<i class="fa fa-star-o"></i>';
//     }
//   }
//   document.getElementById('vendorreviews').innerHTML = starRating;
// },
// error: function(xhr, status, error) {
//   console.error(error);
// }
// });


// });
