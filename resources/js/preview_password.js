var icon = document.getElementById("preview");
var input = document.getElementById("password");

icon.addEventListener("click", function () {
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
});
