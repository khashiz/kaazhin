window.onscroll = function () {
    let header = document.getElementById("header");
    if (window.scrollY > 106) {
        header.classList.add("uk-active");
    } else {
        header.classList.remove("uk-active");
    }
};