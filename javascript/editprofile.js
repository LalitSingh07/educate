const form =document.querySelector('.edit_profile_form form');
submitbtn = form.querySelector('.submit input');
errortxt =form.querySelector('.error-text');

form.onsubmit = (e) =>{
    e.preventDefault(); 
}

submitbtn.onclick = () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./php/editprofile.php",true);
    xhr.onload=() => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(data == "success"){
                    // document.getElementById("editprofilebox").style.display = "none";
                    document.getElementById("editform").reset();
                }
                else{
                    errortxt.textContent = data;
                    errortxt.style.display ="block";
                }
            }
        } 
    }
    let formData = new FormData(form);
    xhr.send(formData);

}