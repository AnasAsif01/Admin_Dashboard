var vendorid = document.getElementById("vendorid").value;
//var vendorid = 2;

$.ajax({
    type: "POST",
    url: "../backend/orderdetails.php",
    data: {
      vendorid: vendorid
    },
    cache: false,
    success: function (data) {
      console.log(data);
      var orderListData = '';
      for (var i = 0; i < data.length; i++) {
        orderListData += '<li class="list-group-item">';
        orderListData += '<div class="row align-items-center no-gutters">';
        orderListData += '<div class="col me-2">';
        orderListData += '<h6 class="mb-0"><strong>' + data[i].Order_id + '</strong></h6><span class="text-xs">' + data[i].Order_Comments + '</span>';
        orderListData += '</div>';
        orderListData += '<div class="col-auto">';
        orderListData += '<div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-' + i + '"><label class="form-check-label" for="formCheck-' + i + '"></label></div>';
        orderListData += '</div>';
        orderListData += '</div>';
        orderListData += '</li>';
      }
      $('#orderList').html(orderListData);
    },
    error: function (xhr, status, error) {
      console.error(error);
    }
});
