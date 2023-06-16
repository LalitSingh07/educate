let element = document.querySelector('#item3card');
let interval = setInterval(function() {
element.classList.add('rotate');
setTimeout(function() {
    element.classList.remove('rotate');
}, 3000);
},6000);

