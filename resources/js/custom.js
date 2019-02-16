function extendSpecialist() {
    var buttonExtend = document.getElementById("extendSpecialist");
    var buttonShowHide = document.getElementById("specialistButton");
    if (buttonShowHide.style.display === 'none') {
        buttonShowHide.style.display = "block";
    } else {
        buttonShowHide.style.display = "none";
    }
}