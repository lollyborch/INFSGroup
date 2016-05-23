/*
This Code is based off the following of MDN Tutorial found at
https://developer.mozilla.org/en-US/docs/Web/API/WebRTC_API/Taking_still_photos

getUserMedia() requires HTTPS!!!
*/

// Initial Camera Setting Variables
// Width will need to change on break points height is auto for aspect ratio.
var width = 1020;
var height = 0;

var streaming = false;

//Cookie stuff MOVE TO ANOTHER JS PROBABLY
// Returns a Boolean value indicating whether cookies are enabled or not (read-only).
Navigator.cookieEnabled;

// Initializing Variables and Event Listeners
function assignElements() {
  video = document.getElementById("video");
  video.addEventListener("canplay", configStream);
  canvas = document.getElementById("canvas");
  photo = document.getElementById("photo");
  takePhotoButton = document.getElementById("takePhotoButton");
  takePhotoButton.addEventListener("click",captureImage);
  openCameraButton = document.getElementById("openCameraButton");
  openCameraButton.addEventListener("click", openCamera);
  camera = document.getElementsByClassName("camera")[0];
};

// Open Camera Application
function openCamera() {
    openCameraButton.style.display = "none";
    canvas.style.display = "none";
    photo.style.display = "none";
    camera.style.display = "inline-block";
}

/*
Set Video and Canvas Dimensions once Stream has been captured.
*/
function configStream() {
    if (!streaming) {
      height = video.videoHeight / (video.videoWidth/width);

      if (isNaN(height)) {
        height = width / (4/3);
      }
      console.log(video.width);
      video.setAttribute("width",width);
      video.setAttribute("height",height);
      canvas.setAttribute("width",width);
      canvas.setAttribute("height",height);
      console.log(video.width);
      streaming = true;
    }
};

/*
This function prompts for camera access and gets the media stream.
The media stream is convereted to a url object and passed to the
HTML video element. The video stream is then played.
*/
function getMediaStream() {
  // Prefixes to ensure that the correct function is called.
  navigator.getmedia = (navigator.getUserMedia ||
                          navigator.webkitGetUserMedia ||
                          navigator.mozGetUserMedia ||
                          navigator.msGetUserMedia)
  // navigator.getmedia(constraints,sucess(stream),failure(error))
  navigator.getmedia(
    {
    video: true,
    audio: false,
    },
    function(stream) {
      if(navigator.mozGetUserMedia) {
        video.mozSrcObject = stream;
      }
      else {
        var vendorURL = window.URL || window.webkitURL;
        video.src = vendorURL.createObjectURL(stream);
      }
      video.play();
    },
    function(err) {
      console.log("An error occured! " + err);
    }
  );
};

/*
Clear the current Photo
*/
function clearPhoto() {
  var context = canvas.getContext("2d");
  context.fillStyle = "#AAA";
  context.fillRect(0,0,canvas.width,canvas.height);

  var data = canvas.toDataURL("image/png");
  photo.setAttribute("src",data);
};


/*
Capture the current frame of the Media stream.
*/
function captureImage() {
  var context = canvas.getContext("2d");
  if (width && height) {
    canvas.width = width;
    canvas.height = height;
    context.drawImage(video,0,0,width,height);

    var data = canvas.toDataURL("image/png");
    photo.setAttribute("src",data);
    photo.style.display = "inline-block";
    video.style.display = "none";
  }
  else {
    clearPhoto();
  }
};

assignElements();
getMediaStream();
