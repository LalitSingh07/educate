function testi() {
    commentclose() ;
    document.getElementById("notesfeed").classList.remove("active");
    document.getElementById("homefeed").classList.add("active");
    document.getElementById("Examfeed").classList.remove("active");
    document.getElementById("profilefeed").classList.remove("active");
    document.getElementById("feed_heading").innerHTML = "Home";
    document.getElementById("tweetBox").style.display = "block";
    document.getElementById("notesbox").style.display = "none";
    document.getElementById("profilebox").style.display = "none";
    document.getElementById("exambox").style.display = "none";
    document.getElementById("result").style.display = "none";
    document.getElementById("examresult").style.display = "none";
    document.getElementById("holder").style.display = "block";
     var xhr = new XMLHttpRequest();
     xhr.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             document.getElementById("holder").innerHTML = this.responseText;
         }
     };
     xhr.open("GET", "php/ReadPost.php", true);
     xhr.send();
 }
 document.getElementById("notesfeed").onclick = function() {notesfy()};
 function notesfy() {
    commentclose() ;
        document.getElementById("notesfeed").classList.add("active");
        document.getElementById("homefeed").classList.remove("active");
        document.getElementById("profilefeed").classList.remove("active");
        document.getElementById("Examfeed").classList.remove("active");
        document.getElementById("notesbox").style.display = "block";
        document.getElementById("result").style.display = "block";
        document.getElementById("feed_heading").innerHTML = "Notes";
        document.getElementById("tweetBox").style.display = "none";
        document.getElementById("editprofilebox").style.display = "none";
        document.getElementById("profilebox").style.display = "none";
        document.getElementById("exambox").style.display = "none";
        document.getElementById("examresult").style.display = "none";
        document.getElementById("holder").style.display = "none";

       var xhr1 = new XMLHttpRequest();
                     xhr1.onreadystatechange = function() {
                         if (this.readyState == 4 && this.status == 200) {
                             document.getElementById("holder").innerHTML = this.responseText;
                         }
                     };
                     xhr1.open("GET", "php/Readnotes.php", true);
                     xhr1.send();


}

 document.getElementById("Examfeed").onclick = function() {examfy()};
 function examfy() 
 {      
    commentclose() ;
        document.getElementById("notesfeed").classList.remove("active");
        document.getElementById("homefeed").classList.remove("active");
        document.getElementById("profilefeed").classList.remove("active");
        document.getElementById("Examfeed").classList.add("active");
        document.getElementById("exambox").style.display = "block";
        document.getElementById("examresult").style.display = "block";
        document.getElementById("notesbox").style.display = "none";
        document.getElementById("profilebox").style.display = "none";
        document.getElementById("editprofilebox").style.display = "none";
        document.getElementById("result").style.display = "none";
        document.getElementById("feed_heading").innerHTML = "Previous Year Question Paper";
        document.getElementById("tweetBox").style.display = "none";
        document.getElementById("holder").style.display = "none";

       var xhr2 = new XMLHttpRequest();
                     xhr2.onreadystatechange = function() {
                         if (this.readyState == 4 && this.status == 200) {
                             document.getElementById("holder").innerHTML = this.responseText;
                         }
                     };
                     xhr2.open("GET", "php/readexam.php", true);
                     xhr2.send();


}
 document.getElementById("profilefeed").onclick = function() {profile()};
 function profile() 
 {
    commentclose() ;
        document.getElementById("notesfeed").classList.remove("active");
        document.getElementById("homefeed").classList.remove("active");
        document.getElementById("Examfeed").classList.remove("active");

        document.getElementById("profilefeed").classList.add("active");

        document.getElementById("exambox").style.display = "none";
        document.getElementById("examresult").style.display = "none";
        document.getElementById("notesbox").style.display = "none";
        document.getElementById("result").style.display = "none";
        document.getElementById("editprofilebox").style.display = "none";

        document.getElementById("profilebox").style.display = "block";

        document.getElementById("feed_heading").innerHTML = "User Profile";
        document.getElementById("tweetBox").style.display = "none";
        document.getElementById("holder").style.display = "none";

       var xhr2 = new XMLHttpRequest();
                     xhr2.onreadystatechange = function() {
                         if (this.readyState == 4 && this.status == 200) {
                             document.getElementById("profilebox").innerHTML = this.responseText;
                         }
                     };
                     xhr2.open("GET", "php/readprofile.php", true);
                     xhr2.send();


}



 function editprofl() 
 {
    document.getElementById("editprofilebox").style.display = "block";
}

function editproflclose() 
{
   document.getElementById("editprofilebox").style.display = "none";
}
function commentclose() 
{
   document.getElementById("commentbox").style.display = "none";
}

function comment()
{   
    document.getElementById("commentbox").style.display = "block";
    var id= (event.target.id);
    $.ajax({
        url: "php/comment.php",
        type: "POST",
        data: {id: id},
        success: function(result1){
          $("#commentbox").html(result1);
        }
      });


}
function likes()
{   
    
    var likeid= (event.target.id);

    $.ajax({
        url: "php/like.php",
        type: "POST",
        data: {id: likeid,how:'c'},
        success: function(result1){
        //   $("#commentbox").html(result1);
        testi();
        }
      });


}

function likes1()
{   
    
    var likeid= (event.target.id);

    $.ajax({
        url: "php/like.php",
        type: "POST",
        data: {id: likeid,how:'c'},
        success: function(result1){
        //   $("#commentbox").html(result1);
                profile() ;
        
        }
      });


}
function deletepost()
{   
    
    var deleteid= (event.target.id);
   
    $.ajax({
        url: "php/deletepost.php",
        type: "POST",
        data: { deleteid : deleteid},
        success: function(resul){
        //   $("#commentbox").html(result1);
      
                profile() ;
        
        }
      });


}

function commentpost(){
    var comments = document.getElementById("textarea").value;
    var postids = document.getElementById("postids").value;

    $.ajax({
        url: 'php/postcomment.php',
        type: 'POST',
        data: { comments:comments,postids:postids },
        success: function(response) {
            var id= postids;
            $.ajax({
                url: "php/comment.php",
                type: "POST",
                data: {id: id},
                success: function(result2){
                //   $("#commentbox").html(result1);
                testi();
                  
                }
              });
            
          
        },
        error: function(xhr, status, error) {

          
          console.log(error);
        }
      });
}


function destroySessionAndLogout() {
    window.sessionStorage.clear();
    window.location.href = "index.php";
  }
