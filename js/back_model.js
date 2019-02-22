//submenu toggle顯示/不顯示
function showmenu(){
  var menu__itinerary = document.querySelector("#menu__itinerary");
  if(submenu__itinerary.style.display == "block"){
    submenu__itinerary.style.display = "none";
    menui.style.transform = "rotateZ(0deg)";
  }else{
    submenu__itinerary.style.display = "block";
    menui.style.transform = "rotateZ(-180deg)";
  }
}
//toggleTab
function toggleTab(e) {
  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  if(tabcontent.length == 1){
    return;
  }else{
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].className = tabcontent[i].className.replace(" active", "");
    }
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (let j = 0; j < tablinks.length; j++) {
      tablinks[j].className = tablinks[j].className.replace(" active", "");
    }
    // Show the current tab, and add an "active" class to the button that opened the tab
    showTab = this.value;
    document.getElementById(showTab).className += " active";
    e.currentTarget.className += " active";
  }
}
//editPage
function deletePage(e){

}
window.addEventListener("load", ()=>{
  menuli = document.querySelector("#menu > li");
  menui = document.querySelector("#menu i");
  menuul = document.querySelector("#menu ul");
  submenu__itinerary = document.getElementById("submenu__itinerary");
  submenu__journal = document.getElementById("submenu__journal");
  submenu__tech = document.getElementById("submenu__tech");
  submenu__robot = document.getElementById("submenu__robot");
  submenu__member = document.getElementById("submenu__member");
  tablinks = document.getElementsByClassName("tablinks");
  tabcontent = document.getElementsByClassName("tabcontent");
  menuli.addEventListener("click", showmenu);
  for (var a=0; a<tablinks.length; a++){
    tablinks[a].addEventListener("click", toggleTab);
  }
})