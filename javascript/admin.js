function posti() {
    document.getElementById("notes-question").style.display = "none";
    document.getElementById("error-field").style.display = "none";
    document.getElementById("adminposts").style.display = "block";
     var xhr = new XMLHttpRequest();
     xhr.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             document.getElementById("adminposts").innerHTML = this.responseText;
         }
     };
     xhr.open("GET", "php/adminpost.php", true);
     xhr.send();
 }

 window.onload = function() {
    posti();
}


function userslist() {
    document.getElementById("notes-question").style.display = "none";
    document.getElementById("error-field").style.display = "none";
    document.getElementById("adminposts").style.display = "block";
   
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("adminposts").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "php/userslist.php", true);
    xhr.send();
}


function notespanel(){
   
    document.getElementById("notes-question").style.display = "block";
    document.getElementById("error-field").style.display = "block";
    document.getElementById("adminposts").style.display = "none";
    
}
function delpostadmin(){
   
    var deleteid= (event.target.id);
   
    $.ajax({
        url: "php/deletepost.php",
        type: "POST",
        data: { deleteid : deleteid},
        success: function(resul){
        //   $("#commentbox").html(result1);
                posti() ;
               
        
        }
      });
    
}

function deluser(){
   
    var deleteid= (event.target.id);
   
    $.ajax({
        url: "php/deluser.php",
        type: "POST",
        data: { deleteid : deleteid},
        success: function(result){
        //   $("#commentbox").html(result1);
                posti() ;
               
        
        }
      });
    
}


