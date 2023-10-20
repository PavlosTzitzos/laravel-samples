function highlight(e) {
    if (selected[0]) selected[0].className = '';
    e.target.parentNode.className = 'selected';
}

var table = document.getElementById('showsTable'),
    selected = table.getElementsByClassName('selected');
table.onclick = highlight;
setTimeout(function(){
   $('.selected').removeClass('selected')
},10800000);

function toDefault(e){
   $('.selected').removeClass('selected')
   $('.default_show').addClass('selected')
   clearTimeout
}

function addShowForm() {
  document.getElementById("popupForm").style.display = "block";
}
function closeForm() {
  document.getElementById("popupForm").style.display = "none";
}