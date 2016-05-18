var aboutModal = document.getElementById("aboutModal");
var aboutButton = document.getElementById("aboutButton");
var closeButton = document.getElementsByClassName("close")[0];

aboutButton.onclick = function() {
  aboutModal.style.display = "block";
}

closeButton.onclick = function() {
  aboutModal.style.display = "none";
}
