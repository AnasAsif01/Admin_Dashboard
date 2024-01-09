

var productid='';
var userid='';
$(document).ready( function () {
    var tabletype = getParameterByName('tabletype');

    switch (tabletype) {
        case '0':
          showusers();
          break;
        case '1':
          showproducts();
          break;
        case '2':
          showblockedusers();
          break;
        case '3':
          showpendingusers();
          break;
        case '8':
          showtotalsales();
        case '9':
          showproductsbyuser();
        default:
          break;
    }
    
    // function to show products
    function showproducts()
    {
        new DataTable('#myTable', {
            ajax: {
                url: '../Backend/getproducts.php',
                type: 'POST'
            },
            columns: [
                { data: 'image' ,
                    render: function(data) {
                        return '<img src="./assets/img/productimages/' + data + '" class="rounded-circle img-responsive" style="width: 80px; height: 80px;">';
                    }
                },
                { data: 'name' },
                { data: 'description'},
                { data: 'price'},
                { data: 'productid',
                    render: function(data) {
                        return '<div class="btn-group" role="group">' + 
                        '<button class="btn btn-danger border rounded" onclick="deleteproduct(' + data + ')"><i class="fa fa-trash"></i></button>' + 
                        '<button class="btn btn-primary border rounded" id="editproduct'+data+'" value='+data+' style="margin-left: 5px" onclick="editproduct(' + data + ')"><i class="fa fa-pen"></i></button>' + 
                        '</div>';
                    }
                }
            ],
            processing: true,
            serverSide: true,
            drawCallback: function (settings) {
                var productsCount = pageInfo.recordsTotal;
                console.log("Products Count:", productsCount);
                },
        });   
    }

    $("#addsubmitbutton").click(function (){
        if (document.getElementById("addsubmitbutton").innerHTML === "Update") {
            if(document.getElementById("addname").value=="" || document.getElementById("adddescription").value=="" || document.getElementById("addimage").files.length===0){
                $.toast({
                    text: 'Enter all fields!',
                    showHideTransition: 'slide',
                    icon: 'warning',
                    position: 'top-right' 
                  });
            }
            else{
                const form = document.getElementById('addproductform');
                const formData = new FormData(form);
                formData.append('productid', productid);
          
                for (const [name, value] of formData.entries()) {
                    console.log(`${name}: ${value}`);
                }
          
                fetch('../Backend/editproduct.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    document.getElementById("addsubmitbutton").innerHTML = "Confirm";
                    document.getElementById("addname").value = "";
                    document.getElementById("adddescription").value = "";
                    document.getElementById("addimage").value = "";
                    $.toast({
                        text: 'Product updated successfully!',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right' 
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    
        else
        {
            if(document.getElementById("addname").value=="" || document.getElementById("adddescription").value=="" || document.getElementById("addimage").files.length===0){
                $.toast({
                    text: 'Enter all fields!',
                    showHideTransition: 'slide',
                    icon: 'warning',
                    position: 'top-right' 
                  });
            }
            else{
                const form = document.getElementById('addproductform');
                const formData = new FormData(form);
                var vendorid = document.getElementById("vendorid").value;
                formData.append('vendorid', vendorid);
    
                for (const [name, value] of formData.entries()) {
                    console.log(`${name}: ${value}`);
                }
      
                fetch('../Backend/addproduct.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    document.getElementById("addname").value="";
                    document.getElementById("adddescription").value="";
                    document.getElementById("addimage").value="";
                    $.toast({
                        text: 'Product Added successfully!',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right' 
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    })
    
    function showproductsbyuser() {
        var vendorid = document.getElementById("vendorid").value;
        new DataTable('#vendorproducttable', {
            ajax: {
                url: '../Backend/getproductsbyuser.php',
                type: 'POST',
                data: {
                    vendorid: vendorid
                }
            },
            columns: [
                { data: 'image' ,
                    render: function(data) {
                        return '<img src="./assets/img/productimages/' + data + '" class="rounded-circle img-responsive" style="width: 80px; height: 80px;">';
                    }
                },
                { data: 'name' },
                { data: 'description'},
                { data: 'price'},
                { data: 'productid',
                    render: function(data) {
                        return '<div class="btn-group" role="group">' + 
                        '<button class="btn btn-danger border rounded" onclick="deleteproduct(' + data + ')"><i class="fa fa-trash"></i></button>' + 
                        '<button class="btn btn-primary border rounded" id="editproduct'+data+'" value='+data+' style="margin-left: 5px" onclick="editvendorproduct(' + data + ')"><i class="fa fa-pen"></i></button>' + 
                        '</div>';
                    }
                }
            ],
            processing: true,
            serverSide: true
        });  
    }
    

    // function to show the users
    function showusers(){
        new DataTable('#myTable', {
            processing: true,
            serverSide: false,
            ajax: {
                url: '../Backend/getallusers.php',
                type: 'POST',
                dataType: 'json',
                cache: false
            },
            columns: [
                { data: 'Name', title:"Name"},
                { data: 'Email', title:"Email"},
                { data: 'Password', title:"Password"},
                { data: 'Status', title:"Status",
                    render: function(data) {
                        if (data === '0') {
                            return '<div class="border border-3 rounded text-center bg-warning text-white">Pending</div>';
                        } else if (data === '1') {
                            return '<div class="border border-3 rounded text-center text-white" style="background-color:green;">Active</div>';
                         } else if (data === '-1') {
                            return '<div class="border border-3 rounded text-center text-white" style="background-color:red;">Blocked</div>';
                        }
                        return data;
                    }
                },
                { data: 'userid',
                    render: function(data) {
                        return '<div class="btn-group" role="group">' + 
                        '<button class="btn btn-danger border rounded" onclick="deleteuser(' + data + ')"><i class="fa fa-trash"></i></button>' + 
                        '<button class="btn btn-primary border rounded" id="edituser'+data+'" value='+data+' style="margin-left: 5px" onclick="edituser(' + data + ')"><i class="fa fa-pen"></i></button>' + 
                        '</div>';
                    }
                }
            ],
            "pagingType": "full_numbers"
        });   
    }

    // function to show blocked users
    function showblockedusers(){
        new DataTable('#myTable', {
            ajax: {
                url: '../Backend/getallblockedusers.php',
                type: 'POST'
            },
            columns: [
                { data: 'Name', title:"Name"},
                { data: 'Email', title:"Email"},
                { data: 'Password', title:"Password"},
                { data: 'Status', title:"Status",
                    render: function(data) {
                        if (data === '0') {
                            return '<div class="border border-3 rounded text-center text-white" style="background-color:yellow;">Pending</div>';
                        } else if (data === '1') {
                            return '<div class="border border-3 rounded text-center text-white" style="background-color:green;">Active</div>';
                         } else if (data === '-1') {
                            return '<div class="border border-3 rounded text-center text-white" style="background-color:red;">Blocked</div>';
                        }
                        return data;
                    }
                },
                { data: 'userid',
                    render: function(data) {
                        return '<div class="btn-group" role="group">' + 
                        '<button class="btn btn-danger border rounded" onclick="deleteuser(' + data + ')"><i class="fa fa-trash"></i></button>' + 
                        '<button class="btn btn-primary border rounded" id="edituser'+data+'" value='+data+' style="margin-left: 5px" onclick="updatestatus(' + data + ')"><i class="fa fa-check"></i></button>' + 
                        '</div>';
                    }
                }
            ],
            processing: true,
            serverSide: true
        });   
    }

    function showtotalsales(){
        $(".tabcol2").css("display", "none");
        $(".tabcol").removeClass("col-md-8").addClass("col-md-12");
        var vendorid = document.getElementById("vendorid").value;
        new DataTable('#vendorproducttable1', { 
            ajax: {
                url: '../Backend/getsalesofuser.php',
                type: 'POST',
                data: {
                    vendorid: vendorid
                }
            },
            columns: [
                { data: 'image' ,
                    render: function(data) {
                        return '<img src="./assets/img/productimages/' + data + '" class="rounded-circle img-responsive" style="width: 80px; height: 80px;">';
                    }
                },
                { data: 'name' },
                { data: 'description'},
                { data: 'price',title:"Price"},
                { data: 'productcount', title:"Sold Items"}
            ],
            processing: true,
            serverSide: false
        });  
    }

    // function to show the pending users for approval
    function showpendingusers(){
        new DataTable('#myTable', {
            ajax: {
                url: '../Backend/getallpendingusers.php',
                type: 'POST'
            },
            columns: [
                { data: 'Name', title:"Name"},
                { data: 'Email', title:"Email"},
                { data: 'Password', title:"Password"},
                { data: 'Status', title:"Status",
                    render: function(data) {
                        if (data === '0') {
                            return '<div class="border border-3 rounded text-center bg-warning text-white">Pending</div>';
                        } else if (data === '1') {
                            return '<div class="border border-3 rounded text-center text-white" style="background-color:green;">Active</div>';
                        } else if (data === '-1') {
                            return '<div class="border border-3 rounded text-center text-white" style="background-color:red;">Blocked</div>';
                        }
                        return data;
                    }
                },
                { data: 'userid',
                    render: function(data) {
                        return '<div class="btn-group" role="group">' + 
                        '<button class="btn btn-danger border rounded" onclick="deleteuser(' + data + ')"><i class="fa fa-trash"></i></button>' + 
                        '<button class="btn btn-primary border rounded" id="edituser'+data+'" value='+data+' style="margin-left: 5px" onclick="updatestatus(' + data + ')"><i class="fa fa-check"></i></button>' + 
                        '</div>';
                    }
                }
            ],
            processing: true,
            serverSide: true
        });   
    }

    $('#addproductform').validate({
        errorPlacement: function(error, element) {
          error.appendTo('body');
          error.addClass('popup');
          error.css({
            'position': 'fixed',
            'top': '10px',
            'right': '10px',
            'background-color': '#ff0000',
            'color': '#ffffff',
            'padding': '10px',
            'border-radius': '5px'
          });
        }
    });

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
} );

function deleteproduct(data){
    $.ajax({
        type: "POST",
        url: "../Backend/deleteproduct.php",
        data: {
            productid: data,
        },
        cache: false,
        success: function (data) {
            var element = JSON.parse(data);
            if(element.message=="success"){
                alert("Deleted Successfully");
            }
            else{
                alert("Not Deleted.")
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr);
        }
    });
}

function deleteuser(data){
    $.ajax({
        type: "POST",
        url: "../Backend/deleteuser.php",
        data: {
            userid: data,
        },
        cache: false,
        success: function (data) {
            var element = JSON.parse(data);
            if(element.message=="success"){
                alert("Deleted Successfully");
            }
            else{
                alert("Not Deleted.")
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr);
        }
    });
}

function updatestatus(data){
    $.ajax({
        type: "POST",
        url: "../Backend/updatestatus.php",
        data: {
            userid: data,
        },
        cache: false,
        success: function (data) {
            var element = JSON.parse(data);
            if(element.message=="success"){
                alert("Updated Successfully");
            }
            else{
                alert("Not Updated.")
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr);
        }
    });
}

function editproduct(data){
    productid=data;
    favDialog.showModal();
}

// function editvendorproduct(data){
//     productid=data;
//     $.ajax({
//         type: "POST",
//         url: "../Backend/getproductdata.php",
//         data: {
//             productid: data,
//         },
//         cache: false,
//         success: function (data) {
//             var element = JSON.parse(data);
//             console.log(element.data[0]["name"]);
//             document.getElementById("name").value=element.data[0]["name"];
//             document.getElementById("description").value=element.data[0]["description"];
//             favDialog.showModal();
//         },
//         error: function (xhr, status, error) {
//             console.error(xhr);
//         }
//     });
// }

function editvendorproduct(data){
    
    productid=data;
    $.ajax({
        type: "POST",
        url: "../Backend/getproductdata.php",
        data: {
            productid: data,
        },
        cache: false,
        success: function (data) {
            var element = JSON.parse(data);
            console.log(element.data[0]["name"]);
            document.getElementById("addname").value=element.data[0]["name"];
            document.getElementById("adddescription").value=element.data[0]["description"];
            document.getElementById("addsubmitbutton").innerHTML = "Update";            
        },
        error: function (xhr, status, error) {
            console.error(xhr);
        }
    });
}

function submitupdate(){
    // if (document.getElementById("addsubmitbutton").innerHTML === "Update") {
    //     const form = document.getElementById('addproductform');
    //     const formData = new FormData(form);
    //     formData.append('productid', productid);
      
    //     for (const [name, value] of formData.entries()) {
    //       console.log(`${name}: ${value}`);
    //     }
      
    //     fetch('../Backend/editproduct.php', {
    //       method: 'POST',
    //       body: formData
    //     })
    //       .then(response => response.json())
    //       .then(data => {
    //         console.log(data);
    //         document.getElementById("addsubmitbutton").innerHTML = "Confirm";
    //         document.getElementById("addname").value = "";
    //         document.getElementById("adddescription").value = "";
    //         document.getElementById("addimage").value = "";
    //         $.toast({
    //           text: 'Product updated successfully!',
    //           showHideTransition: 'slide',
    //           icon: 'success'
    //         });
    //       })
    //       .catch(error => {
    //         console.error('Error:', error);
    //       });
    //   }

    // else
    // {
    //     const form = document.getElementById('addproductform');
    //     const formData = new FormData(form);
    //     var vendorid = document.getElementById("vendorid").value;
    //     formData.append('vendorid', vendorid);

    //     for (const [name, value] of formData.entries()) {
    //         console.log(`${name}: ${value}`);
    //     }
  
    //     fetch('../Backend/addproduct.php', {
    //         method: 'POST',
    //         body: formData
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         console.log(data);
    //         document.getElementById("addname").value="";
    //         document.getElementById("adddescription").value="";
    //         document.getElementById("addimage").value="";
    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
    //     });
    // }
}
 
function edituser(data){
    userid=data;
    userdialog.showModal();
}

function submituserform() {
    const form = document.getElementById('edituserform');
    const formData = new FormData(form);
    formData.append('userid', userid);

    for (const [name, value] of formData.entries()) {
        console.log(`${name}: ${value}`);
    }
  
    fetch('../Backend/edituser.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      console.log(data);
      userdialog.close();
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

const cancelbutton = document.getElementById("canceldialog");
cancelbutton.addEventListener("click",()=>{
    favDialog.close();
})

const cancelbuttonuser = document.getElementById("canceldialoguser");
cancelbuttonuser.addEventListener("click",()=>{
    userdialog.close();
})