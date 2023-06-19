document.addEventListener("DOMContentLoaded", function () {
  var profilBtn = document.getElementById("profil_btn");
  var profilInfo = document.getElementById("profil_info");

  profilBtn.addEventListener("click", function () {
    if (profilInfo.style.maxHeight) {
      profilInfo.style.maxHeight = null;
      profilInfo.style.animation = "slideUp 0.5s ease-in-out";
      setTimeout(function () {
        profilInfo.style.display = "none";
        profilInfo.style.animation = "";
      }, 500);
    } else {
      profilInfo.style.display = "block";
      profilInfo.style.animation = "slideDown 0.5s ease-in-out";
      profilInfo.style.maxHeight = profilInfo.scrollHeight + "px";
    }
  });
});
