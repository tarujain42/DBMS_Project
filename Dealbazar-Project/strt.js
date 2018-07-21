  
 var slideIndex = 0;
 
 var slideIndex2 = 1;
showDivs(slideIndex);
carousel();
fun1();

zoomIn1();
zoomOut1();

zoomIn2();
zoomOut2();

zoomIn3();
zoomOut3();

zoomIn4();
zoomOut4();

zoomIn5();
zoomOut5();

zoomIn6();
zoomOut6();


function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
 
 function fun1(){
	 var x= document.getElementsByClassName("log1");
	 x.style.display = "block";
 }

 
 function fun2(){
	 var x=document.getElementByClassName();
	 x.style.display = "block";
 }
 
 

function plusDivs(n) {
  showDivs(slideIndex2 += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex2 = 1}    
  if (n < 1) {slideIndex2 = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex2 -1].style.display = "block";  
}



function zoomIn1(){
	var x=document.getElementById("electronic");
	x.src="ele1.jpg";
	x.style.width="100%";
}


function zoomOut1(){
	var x=document.getElementById("electronic");
	x.src="electronics.jpg";
}

function zoomIn2(){
	var x=document.getElementById("book");
	x.src="bk2.jpg";
}


function zoomOut2(){
	var x=document.getElementById("book");
	x.src="bk3.jpg";
}
function zoomIn3(){
	var x=document.getElementById("shoes");
	x.src="A1.jpg";
}


function zoomOut3(){
	var x=document.getElementById("shoes");
	x.src="sh1.jpg";
}
function zoomIn4(){
	var x=document.getElementById("sports");
	x.src="sp4.png";
}


function zoomOut4(){
	var x=document.getElementById("sports");
	x.src="f1.jpg";
}
function zoomIn5(){
	var x=document.getElementById("clothes");
	x.src="cl1.jpg";
}


function zoomOut5(){
	var x=document.getElementById("clothes");
	x.src="cll2.png";
}
function zoomIn6(){
	var x=document.getElementById("car");
	x.src="cr2.jpg";
}


function zoomOut6(){
	var x=document.getElementById("car");
	x.src="cr1.jpg";
}