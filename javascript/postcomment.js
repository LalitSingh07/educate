
$(document).ready(function() {
 $('.comntform').submit(function(event) {
   event.preventDefault(); // Prevent the form from submitting normally

   // Get the selected values
   var comments = $('#textarea').val();
   var postids = $('#postids').val();
   

   // Send an AJAX request to fetch_data.php
   $.ajax({
     url: 'php/postcomment.php',
     type: 'POST',
     data: { comments:comments,postids:postids },
     success: function(response) {
       $(".error-text1").html(response);
       console.log(response);
       // Do something with the data
     },
     error: function(xhr, status, error) {
       // Handle errors
       console.log(error);
     }
   });
 });
});
