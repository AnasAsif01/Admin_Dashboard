
const addcancelbutton = document.getElementById("addcanceldialog");
addcancelbutton.addEventListener("click",()=>{
    document.getElementById("addsubmitbutton").innerHTML = "Confirm";
    document.getElementById("addname").value="";
    document.getElementById("adddescription").value="";
    document.getElementById("addimage").value="";
})