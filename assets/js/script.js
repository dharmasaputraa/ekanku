const btnLogin = document.getElementById("btnLogin");
const btnLogin1 = document.getElementById("btnLogin1");

var x = document.getElementById("LoginPage");

btnLogin.addEventListener("click", function () {
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
});

btnLogin1.addEventListener("click", function () {
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
});
