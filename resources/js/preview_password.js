var buton = document.getElementById("preview");
var input = document.getElementById("password");

buton.addEventListener("click", function () {
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
});
