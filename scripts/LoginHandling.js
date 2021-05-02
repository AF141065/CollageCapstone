/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Change the selector if needed
//window.onload = function(){
//    document.getElementsByName("verify").onclick = function(){
//        document.forms.myform.submit();
//    };
//    document.getElementsByName("reject").onclick = function(){
//        document.forms.myform.submit();
//    };
//};
// Get the modal
var conf = document.getElementById("Conf");
var ckin = document.getElementById("CKIN");
var ckou = document.getElementById("CKOU");
var adpr = document.getElementById("ADPR");
var adpu = document.getElementById("ADPU");
var adcl = document.getElementById("ADCL");

// Get the button that opens the modal
var confbtn = document.getElementById("Settings");
var ckinbtn = document.getElementById("Checkin");
var ckoubtn = document.getElementById("Checkout");
var adprbtn = document.getElementById("AddPunch");
var adpubtn = document.getElementById("AP");
var adclbtn = document.getElementById("AC");

// When the user clicks the button, open the modal 
confbtn.onclick = function() {
  conf.style.display = "block";
};
ckinbtn.onclick = function() {
  ckin.style.display = "block";
  var dt = new Date();
};
ckoubtn.onclick = function() {
  ckou.style.display = "block";
};
adprbtn.onclick = function() {
  adpr.style.display = "block";
};
adpubtn.onclick = function() {
  adpu.style.display = "block";
};
adclbtn.onclick = function() {
  adcl.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
$(".close").onclick = function() {
    switch(event.target) {
        case conf: conf.style.display = "none";
            break;
        case ckin: ckin.style.display = "none";
            break;
        case ckou: ckou.style.display = "none";
            break;
        case adpr: adpr.style.display = "none";
            break;
        case adpu: adpu.style.display = "none";
            break;
        case adcl: adcl.style.display = "none";
            break;
  }
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
      switch(event.target) {
        case conf: conf.style.display = "none";
            break;
        case ckin: ckin.style.display = "none";
            break;
        case ckou: ckou.style.display = "none";
            break;
        case adpr: adpr.style.display = "none";
            break;
        case adpu: adpu.style.display = "none";
            break;
        case adcl: adcl.style.display = "none";
            break;
  }
};