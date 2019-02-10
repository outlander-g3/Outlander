var lastScrollY = 0;
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}
// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("product__img");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}

function scrollToPosition(e){
  var product__submenu = document.getElementById("product__submenu");
  var productLink = document.querySelectorAll(".product__wrap a");
  var product__itineraryTitle = document.getElementById("product__itineraryTitle");
  var product__routeTitle = document.getElementById("product__routeTitle");
  var product__timeTitle = document.getElementById("product__timeTitle");
  var product__guideTitle = document.getElementById("product__guideTitle");
  var checkTime = document.getElementsByClassName("checkTime");
  
  e.preventDefault();

  for(var i=0; i<productLink.length; i++){
    productLink[i].classList.remove("bold");
  }

  if(this.classList.contains("bold") === false){
    this.classList.add("bold");
  }
  
  if(this == productLink[0]){
    window.scrollTo({
      left: 0,
      top: product__itineraryTitle.offsetTop - 55,
      behavior: "smooth",
    });
  }else if(this == productLink[1]){
    window.scrollTo({
      left: 0,
      top: product__routeTitle.offsetTop - 55,
      behavior: "smooth",
    });
  }else if(this == productLink[2] || this == checkTime[0] || this == checkTime[1]){
    window.scrollTo({
      left: 0,
      top: product__timeTitle.offsetTop - 60,
      behavior: "smooth",
    });
  }else if(this == productLink[3]){
    window.scrollTo({
      left: 0,
      top: product__guideTitle.offsetTop - 55,
      behavior: "smooth",
    });
  }else if(this == productLink[4]){
    window.scrollTo({
      left: 0,
      top: product__reviewTitle.offsetTop - 55,
      behavior: "smooth",
    });
  }
  if(product__submenu.classList.contains("fixed")){
    product__submenu.classList.remove("fixed");
  }
}

function showMore(){
  var showMore = document.getElementById("showMore");
  showMore.style.display = "none";
  for (var k=0; k<route.length; k++){
    route[k].style.display = "block";
  }
}

var swiper = new Swiper('.product__guideGroup', {
  spaceBetween: 30,
  effect: 'slide',
  loop: true,
  mousewheel: {
    invert: false,
  },
  // autoHeight: true,
  pagination: {
    el: '.product__guide__pagination',
    clickable: true,
  }
});

window.addEventListener("scroll", (e)=>{
  var product__submenu = document.getElementById("product__submenu");
  if(document.documentElement.scrollTop > 600 || document.body.scrollTop > 600){
    product__submenu.classList.add("fixed");
  }else{
    product__submenu.classList.remove("fixed");
  }
})

window.addEventListener("load", (e)=>{
  var productLink = document.querySelectorAll(".product__wrap a");
  var checkTime = document.getElementsByClassName("checkTime");
  route = document.getElementsByClassName("route");
  var showRoute = document.getElementById("showRoute");
  
  for(var i=0; i<productLink.length; i++){
    productLink[i].addEventListener("click", scrollToPosition);
  }
  for(var j=0; j<checkTime.length; j++){
    checkTime[j].addEventListener("click", scrollToPosition);
  }
  if(document.body.clientWidth < 767){
    for (var k=0; k<route.length; k++){
      route[k].style.display = "none";
    }
    route[1].style.display = "block";
    showRoute.addEventListener("click", showMore);
  }
})