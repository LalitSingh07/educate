function saveText() {
    var text = document.getElementById("text").value;
    var imageName = document.getElementById("image-preview").files[0];
  
    var formData = new FormData();
    formData.append("text", text);
    formData.append("image", imageName);
  
    $.ajax({
      type: "POST",
      url: "php/submitPost.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        document.getElementById("text").value = ""; // Reset the text input
        document.getElementById("image-preview").value = "";
        testi();
        // $("#result").html(response);
      }
    });
  }
  