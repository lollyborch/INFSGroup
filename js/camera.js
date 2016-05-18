/*
This Code is based off the following of MDN Tutorial found at
https://developer.mozilla.org/en-US/docs/Web/API/WebRTC_API/Taking_still_photos

getUserMedia() requires HTTPS!!!
*/

// Initial Camera Setting Variables
var width = 320;
var height = 0;

var streaming = false;

var video = null;
var canvas = null;
var photo = null;
var startbutton = null;

//Cookie stuff MOVE TO ANOTHER JS PROBABLY
// Returns a Boolean value indicating whether cookies are enabled or not (read-only).
Navigator.cookieEnabled;

// This function assignts all the Elements on page Load  => null
function assignElements() {
  video = document.getElementById("video");
  canvas = document.getElementById("canvas");
  photo = document.getElementById("photo");
  startButton = document.getElementById("startButton");
};

function getMediaStream() {

  navigator.getmedia = (navigator.getUserMedia ||
                          navigator.webkitGetUserMedia ||
                          navigator.mozGetUserMedia ||
                          navigator.msGetUserMedia)
                          console.log(navigator);
                          console.log(navigator.getmedia);
  navigator.getmedia(
    {
    video: true,
    audio: false,
    },
    function(stream) {
      if(navigator.mozGetUserMedia) {
        video.mozSrcObject = stream;
        console.log("Mozilla Baby");
      }
      else {
        var vendorURL = window.URL || window.webkitURL;
        video.src = vendorURL.createObjectURL(stream);
        console.log("Ended up here");
      }
      video.play();
    },
    function(err) {
      console.log("An error occured! " + err);
    }
  );
};

assignElements();
getMediaStream();
