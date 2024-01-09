
var userid = document.getElementById('vendorid').value;
var userid2 = 0;
var lastMessageId = 0;

$(document).ready(function () {
    userid2 = getParameterByName('clickeduserid');
    // get the chats
    $.ajax({
      type: "POST",
      url: "../backend/getchats.php",
      data: {
        userid: userid,
      },
      cache: false,
      success: function(data) {
        const parsedData = JSON.parse(data);
        const chats = parsedData;
        console.log("Chats for users:",chats);
      
        var dropdownMenu = $('.messagebox1');
        dropdownMenu.append(`<br>`);
      
        $.each(chats, function(index, chat) {
          var chatItem = `<a class="dropdown-item d-flex align-items-center" id=${chat.userid2} onclick=chitchat(${chat.userid2}) href="#">
              <div class="fw-bold">
                <div class="text-truncate"><span>${chat.message}</span></div>
                <p class="small text-gray-500 mb-0">${chat.username} - Just Now</p>
              </div>
            </a>`;
          dropdownMenu.append(chatItem);
          dropdownMenu.append(`<br>`);
        });
      },      
      error: function(xhr, status, error) {
        console.error(error);
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

    $("#send-button").click(function () {
        var message = $("#usermessage").val();
        var userid1 =userid;
        var userid2 = getParameterByName('clickeduserid');

        if (message === '') {
            alert("Please type the message.");
            return false;
        }

        $.ajax({
            type: "POST",
            url: "../Backend/savemessage.php",
            data: {
                message: message,
                userid1: userid1,
                userid2: userid2,
            },
            cache: false,
            success: function (data) {
                try {
                    var response = JSON.parse(data);
                    if (response.success) {
                        console.log("Message Sent");
                        var chatbox = $("#chat1 .card-body");
                        var newMessage = "<div class='d-flex flex-row justify-content-end mb-4'>" +
                            "<div class='p-3 me-3' style='border-radius: 15px; background-color: rgba(57, 192, 237,.2);'>" +
                            "<p class='small mb-0'>" + message + "</p>" +
                            "</div></div>";
                        chatbox.append(newMessage);
                        $("#usermessage").val('');
                    } else {
                        alert(response.message);
                    }
                } catch (error) {
                    console.log("Parsing error:", error);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });
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

function chitchat(data) {
    favDialog.showModal();
    getmessages();
    var chatbox = $("#chat1 .card-body");
    chatbox.empty();     
    var url = new URL(window.location.href);
    url.searchParams.set('clickeduserid', data);
    history.pushState(null, '', url);
}
  
function closechat(){
    favDialog.close();
    location.reload();
}

function getmessages() {
  userid2 = getParameterByName('clickeduserid');

  $.ajax({
      type: "POST",
      url: "../Backend/getmessage.php",
      data: {
          userid1: userid,
          userid2: userid2,
          lastMessageId: lastMessageId
      },
      cache: false,
      success: function (data) {
          var element = JSON.parse(data);
          if (element['rightmessage'].length > 0 || element['leftmessage'].length > 0) {
              var a = element['leftmessage'].length - 1;
              var b = element['rightmessage'].length -1;
          }
          updatechat(element);
      },
      error: function (xhr, status, error) {
          console.error(xhr);
      }
  });
}

function updatechat(element) {
  var chatbox = $("#chat1 .card-body");
  for (var i = 0; i < element['rightmessage'].length; i++) {
      var newMessage = "<div class='d-flex flex-row justify-content-end mb-4'>" +
          "<div class='p-3 me-3' style='border-radius: 15px; background-color: rgba(57, 192, 237,.2);'>" +
          "<p class='small mb-0'>" + element['rightmessage'][i].message + "</p>" +
          "</div></div>";
      chatbox.append(newMessage);
  }

  for (var i = 0; i < element['leftmessage'].length; i++) {
      var newMessage = "<div class='d-flex flex-row justify-content-start mb-4'>" +
          "<div class='p-3 ms-3' style='border-radius: 15px; background-color: rgba(57, 192, 237,.2);'>" +
          "<p class='small mb-0'>" + element['leftmessage'][i].message + "</p>" +
          "</div></div>";
      chatbox.append(newMessage);
  }
  chatbox.scrollTop(chatbox[0].scrollHeight);
}