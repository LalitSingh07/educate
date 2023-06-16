const otpFields = document.querySelectorAll(".otp_field");

otpFields[0].focus();

otpFields.forEach((field, index) => {
  field.addEventListener('keydown', (e) => {
    if (e.key >= 0 && e.key <= 9) {
      otpFields[index].value = "";
      setTimeout(() => {
        otpFields[index + 1].focus();
      }, 4);
    } else if (e.key === 'Backspace') {
      setTimeout(() => {
        otpFields[index - 1].focus();
      }, 4);
    }
  });
});

const form =document.querySelector('.form form');
submitbtn = form.querySelector('.submit input');
errortxt =form.querySelector('.error-text');

form.onsubmit = (e) =>{
    e.preventDefault(); 
}

submitbtn.onclick = () =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","./php/otpx.php",true);
    xhr.onload=() => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(data = "done"){
                    location.href="./home.php"

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