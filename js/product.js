var lastScrollY = 0;
function scrollToPosition(e){
  var product__submenu = document.getElementById("product__submenu");
  var productLink = document.querySelectorAll(".product__wrap a");
  var product__itineraryTitle = document.getElementById("product__itineraryTitle");
  var product__routeTitle = document.getElementById("product__routeTitle");
  var product__timeTitle = document.getElementById("product__timeTitle");
  var product__guideTitle = document.getElementById("product__guideTitle");
  
  e.preventDefault();
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
  }else if(this == productLink[2]){
    window.scrollTo({
      left: 0,
      top: product__timeTitle.offsetTop - 55,
      behavior: "smooth",
    });
  }else if(this == productLink[3]){
      // console.log(product__guideTitle.offsetTop);
    window.scrollTo({
      left: 0,
      top: product__guideTitle.offsetTop - 55,
      behavior: "smooth",
    });
  }else if(this == productLink[4]){
    // console.log(this.offsetTop);
    console.log(this);
    console.log(product__reviewTitle);
    console.log(product__reviewTitle.offsetTop);
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

window.addEventListener("scroll", ()=>{
  var st = this.scrollY;
  var product__submenu = document.getElementById("product__submenu");
  if(st < lastScrollY && st > (product__submenu.offsetTop+500)){
    product__submenu.classList.add("fixed");
  }else{
    product__submenu.classList.remove("fixed");
  }
  lastScrollY = st;
})

window.addEventListener("load", ()=>{
  var productLink = document.querySelectorAll(".product__wrap a");
  for( i=0; i<productLink.length; i++){
    productLink[i].addEventListener("click", scrollToPosition);
  }
  var product__submenu = document.getElementById("product__submenu");
})