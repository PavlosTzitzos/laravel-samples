window.addEventListener("load", () => {
// (A) AUDIO OBJECT + HTML CONTROLS
var audio = new Audio("http://83.212.141.202:8000/radio.mp3"), // change to your own!

var audio = new Audio(
$(function() {
$('#videoPlayer').player('play', 'http://www.undergroundradio.gr/listen/live.html');
})
),
aPlay = document.getElementById("aPlay"),
aPlayIco = document.getElementById("aPlayIco"),
aNow = document.getElementById("aNow"),
aTime = document.getElementById("aTime"),
aSeek = document.getElementById("aSeek"),
aVolume = document.getElementById("aVolume"),
aVolIco = document.getElementById("aVolIco");

// (B) PLAY & PAUSE
// (B1) CLICK TO PLAY/PAUSE
aPlay.onclick = () => {
if (audio.paused) { audio.play(); }
else { audio.pause(); }
};

// (B2) SET PLAY/PAUSE ICON
audio.onplay = () => { aPlayIco.innerHTML = "pause"; };
audio.onpause = () => { aPlayIco.innerHTML = "play_arrow"; };

// (C) TRACK PROGRESS & SEEK TIME
// (C1) SUPPORT FUNCTION - FORMAT HH:MM:SS
var timeString = (secs) => {
// HOURS, MINUTES, SECONDS
let ss = Math.floor(secs),
hh = Math.floor(ss / 3600),
mm = Math.floor((ss - (hh * 3600)) / 60);
ss = ss - (hh * 3600) - (mm * 60);

// RETURN FORMATTED TIME
if (hh>0) { mm = mm<10 ? "0"+mm : mm; }
ss = ss<10 ? "0"+ss : ss;
return hh>0 ? `${hh}:${mm}:${ss}` : `${mm}:${ss}` ;
};

// (C2) TRACK LOADING
audio.onloadstart = () => {
//aNow.innerHTML = "Loading";
aTime.innerHTML = "";
};

// (C3) ON META LOADED



// (D) VOLUME
aVolume.onchange = () => {
audio.volume = aVolume.value;
aVolIco.innerHTML = (aVolume.value==0 ? "volume_mute" : "volume_up");
};

// (E) ENABLE/DISABLE CONTROLS
audio.oncanplaythrough = () => {
aPlay.disabled = false;
aVolume.disabled = false;
aSeek.disabled = false;
};
audio.onwaiting = () => {
aPlay.disabled = true;
aVolume.disabled = true;
aSeek.disabled = true;
};
});
