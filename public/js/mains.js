const iconeye = document.querySelector(".icon-eye");
console.log(iconeye);

iconeye.addEventListener("click", function () {
    if (this.nextElementSibling.type == "password") {
        this.nextElementSibling.type = "text";
    }else{
        this.nextElementSibling.type = "password";
    }
})


