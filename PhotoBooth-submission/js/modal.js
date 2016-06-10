var aboutModal = document.getElementById("aboutModal");
var aboutButton = document.getElementById("aboutButton");

var loginModal = document.getElementById("loginModal");
var loginButton = document.getElementById("loginButton");

var closeAbout = document.getElementById("closeAbout");
var closeLogin = document.getElementById("closeLogin");

//changes modals from dispaly none to display block
aboutButton.onclick = function() {
  aboutModal.style.display = "block";
}

closeAbout.onclick = function() {
  aboutModal.style.display = "none";
}

loginButton.onclick = function() {
  loginModal.style.display = "block";
}

closeLogin.onclick = function() {
  loginModal.style.display = "none";
}
