
var count=0;
$(document).ready(function () { 
  var role=$('#role').val();
  if(role==-1)
  {
    $.ajax({
      type: "POST",
      url: "../backend/getpendingusers.php",
      cache: false,
      success: function(data) {
        const parsedData = JSON.parse(data);
        count = parsedData.data.length;
        const users = parsedData.data;
        console.log(users);
        const dropdownMenu = $('.notificationsid');
        dropdownMenu.empty();
        dropdownMenu.append('<h6 class="dropdown-header">Pending Users</h6>');
        users.forEach(function(user) {
          const message = user.Name;
          const html = '<a class="dropdown-item d-flex align-items-center" href="#">' +
            '<div class="me-3">' +
            '<div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>' +
            '</div>' +
            '<div>' +
            `<p>${message} is pending user.</p>` +
            '</div>' +
            '</a>';
          dropdownMenu.append(html);
        });
        dropdownMenu.append('<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>');
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
    

    // get the listed products
    $.ajax({
      type: "POST",
      url: "../backend/getnewlistedproducts.php",
      cache: false,
      success: function(data) {
        const parsedData = JSON.parse(data);
        const products = parsedData.data;
        count = count + products.length;
        document.getElementById('notificationcount').textContent = count;
        const dropdownMenu = $('.notificationsid');
        dropdownMenu.append('<h6 class="dropdown-header">Newly Listed Products</h6>');
        products.forEach(function(product) {
          const name = product.name;
          const html = '<a class="dropdown-item d-flex align-items-center" href="#">' +
            '<div class="me-3">' +
            '<div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>' +
            '</div>' +
            '<div>' +
            `<p>${name} is listed.</p>` +
            '</div>' +
            '</a>';
          dropdownMenu.append(html);
        });
        dropdownMenu.append('<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>');
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    }); 
  }
  else if(role==1)
  {
  
    let vendorid=$('#vendorid').val();
    $.ajax({
      type: "POST",
      url: "../backend/getpendingproduct.php",
      data:{vendorid:vendorid},
      cache: false,
      success: function(data) {
        const parsedData = JSON.parse(data);
        count = parsedData.data.length;
        const users = parsedData.data;
        console.log(users);
        const dropdownMenu = $('.notificationsid');
        dropdownMenu.empty();
        dropdownMenu.append('<h6 class="dropdown-header">Recent Update</h6>');
        users.forEach(function(user) {
          const message = 'Your Product '+user.name+' Has been Listed';
          const html = '<a class="dropdown-item d-flex align-items-center" href="#">' +
            '<div class="me-3">' +
            '<div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>' +
            '</div>' +
            '<div>' +
            `<p>${message}</p>` +
            '</div>' +
            '</a>';
          dropdownMenu.append(html);
        });
        dropdownMenu.append('<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>');
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
    

    // get the listed products

  }
});

var counter = 0;
function setnotification2() {
  if (counter === 0) {
    counter++;
    console.log(counter);
  } else {
    console.log(counter);
    $.ajax({
      type: "POST",
      url: "../Backend/setnotification.php",
      data: {
        userid: 0,
      },
      cache: false,
      success: function (data) {
        var element = JSON.parse(data);
        console.log(element);
        location.reload();
      },
      error: function (xhr, status, error) {
        console.error(xhr);
      }
    });
  }
}
function setnotification() {
  if (counter === 0) {
    counter++;
    console.log(counter);
  } else {
    console.log(counter);
    $.ajax({
      type: "POST",
      url: "../Backend/setnotification.php",
      data: {
        userid: 0,
      },
      cache: false,
      success: function (data) {
        var element = JSON.parse(data);
        console.log(element);
        location.reload();
      },
      error: function (xhr, status, error) {
        console.error(xhr);
      }
    });
  }
}