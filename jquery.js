/* only for click expand feature start */
var coll = document.getElementsByClassName("collapsiblea");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
/* click expand end */
/* only for snackbar start*/
function launch_toast(para) {
  var coundownC1 = para+'C1';
    // time counter on page js start
      var timeleft = 3;
    var downloadTimer = setInterval(function(){
   // timeleft--;   document.getElementById("countdowntimer").textContent = timeleft;
      timeleft--;   document.getElementById(coundownC1).textContent = timeleft;
      if(timeleft === 0){ document.getElementById(coundownC1).innerHTML = "Show again"; }
    if(timeleft <= 0)
        clearInterval(downloadTimer);
    },1000); 
  //time counter on page js end
  //time to perform curl
  setTimeout(function(){
    //below is the notification code js
  var param = para+'1';
  var x = document.getElementById(param);
  x.classList.add("show");
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
       } , 2000);  //time remaining to display popup
  } 
/* snackbar end*/
