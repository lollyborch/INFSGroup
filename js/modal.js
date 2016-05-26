var aboutModal = document.getElementById("aboutModal");
var aboutButton = document.getElementById("aboutButton");
var loginModal = document.getElementById("loginModal");
var loginButton = document.getElementById("loginButton");
var closeButton = document.getElementsByClassName("close")[0];

aboutButton.onclick = function() {
  aboutModal.style.display = "block";
}

loginButton.onclick = function() {
  loginModal.style.display = "block";
}

closeButton.onclick = function() {
  aboutModal.style.display = "none";
}
