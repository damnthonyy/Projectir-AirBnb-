function toggleDescription(event) {
    event.preventDefault();
    var remainingDescription = document.getElementById("remainingDescription");
    if (remainingDescription.style.display === "none") {
        remainingDescription.style.display = "block";
    } else {
        remainingDescription.style.display = "none";
    }
}