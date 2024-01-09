document.getElementById("search-button").addEventListener("click", function () {
  const input = document.getElementById("search").value.toLowerCase();
  const table = document.querySelector("table");
  const rows = table.getElementsByTagName("tr");
  let matchFound = false;

  for (let i = 0; i < rows.length; i++) {
    const cells = rows[i].getElementsByTagName("td");
    let shouldShow = false;

    for (let j = 0; j < cells.length; j++) {
      const textContent = cells[j].textContent.toLowerCase();
      if (textContent.includes(input)) {
        shouldShow = true;
        matchFound = true; // Set matchFound to true if a match is found
        break;
      }
    }

    if (shouldShow) {
      rows[i].style.display = "";
    } else if (i != 0) {
      rows[i].style.display = "none";
    }
  }

  // Display the header if a match is found, otherwise display "No match found"
  if (matchFound) {
    table.getElementsByTagName("thead")[0].style.display = "";
  } else {
    table.getElementsByTagName("thead")[0].style.display = "none";
  }
});

$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "../backend/getvendorsalesstatus.php",
    data: {
      vendorid: document.getElementById("vendorid").value,
    },
    cache: false,
    success: function (data) {
        console.log(data);
        const parsedData = JSON.parse(data);
        console.log("data:", parsedData.data);
      
        // Assuming the table has an id of "myTable"
        const table = document.getElementById("status-table");
      
        if (table) {
            // Loop through the parsed data and append it to the table
            parsedData.data.forEach(function (item) {
            const row = table.insertRow(-1); 
            const cell1 = row.insertCell(0);
            const cell2 = row.insertCell(1);
            const cell3 = row.insertCell(2);
            const cell4 = row.insertCell(3);
      
            cell1.innerHTML = item.name;
            cell2.innerHTML = item.Name;
            cell3.innerHTML = '$ ' + item.price;
            cell4.innerHTML = item.Status;
          });
        } else {
          console.error("Table not found in the document");
        }
      },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
});


// success: function (data) {
//     console.log(data);
//     const parsedData = JSON.parse(data);
//     console.log("data:", parsedData.data);
//     const table = document.getElementById("status-table");
  
//     if (table) {
//       parsedData.data.forEach(function (item) {
//         const row = table.insertRow(-1); 
//         const cell1 = row.insertCell(0);
//         const cell2 = row.insertCell(1);
//         const cell3 = row.insertCell(2);
//         const cell4 = row.insertCell(3);
  
//         cell1.innerHTML = item.name;
//         cell2.innerHTML = item.Name;
//         cell3.innerHTML = item.price;
  
//         // Create a dropdown for the status column
//         const select = document.createElement("select");
//         const option = document.createElement("option");
//         option.text = item.status;
//         option.value = item.status;
//         select.add(option);
  
//         // Set the color of the dropdown based on the status
//         if (item.status === "Pending") {
//           select.classList.add("bg-warning", "text-dark");
//         } else if (item.status === "Canceled") {
//           select.classList.add("bg-danger", "text-white");
//         } else if (item.status === "Delivered") {
//           select.classList.add("bg-success", "text-white");
//         }
//         cell4.appendChild(select);
//       });
//     } else {
//       console.error("Table not found in the document");
//     }
// },