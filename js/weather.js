var requestURL = 'http://api.openweathermap.org/data/2.5/forecast/?id=524901&appid=d4c1228fca20209127f8a9b36b3fec11&units=metric';
var request = new XMLHttpRequest();
request.open('GET', requestURL);
request.responseType = 'json';
request.send();

function showWeather(weatherJson){
  var stage = document.getElementById("stage");
  var hTemp, lTemp;
  console.log(weatherJson.list);
  for (var i=3; i<40; i+=8){
    var weatherdiv = document.createElement('div'); // create a new em element
    weatherdiv.className = "weather";
    stage.appendChild(weatherdiv);
    if(weatherJson.list[i].weather[0].main == "Snow"){
      var svg = document.createElement("svg");
      svg.className = "snow-cloud";
      svg.setAttribute("viewBox", "0 0 512 512");
      let text = "<path d='M400,64c-5.3,0-10.6,0.4-15.8,1.1C354.3,24.4,307.2,0,256,0s-98.3,24.4-128.2,65.1c-5.2-0.8-10.5-1.1-15.8-1.1C50.2,64,0,114.2,0,176s50.2,112,112,112c13.7,0,27.1-2.5,39.7-7.3c12.3,10.7,26.2,19,40.9,25.4l24.9-24.9c-23.5-7.6-44.2-21.3-59.6-39.9c-13,9.2-28.8,14.7-45.9,14.7c-44.2,0-80-35.8-80-80s35.8-80,80-80c10.8,0,21.1,2.2,30.4,6.1C163.7,60.7,206.3,32,256,32s92.3,28.7,113.5,70.1c9.4-3.9,19.7-6.1,30.5-6.1c44.2,0,80,35.8,80,80s-35.8,80-80,80c-17.1,0-32.9-5.5-45.9-14.7c-10.4,12.5-23.3,22.7-37.6,30.6L303,312.2c20.9-6.6,40.5-16.9,57.3-31.6c12.6,4.8,26,7.3,39.7,7.3c61.8,0,112-50.2,112-112S461.8,64,400,64z' /><polygon class='bolt' points='192,352 224,384 192,480 288,384 256,352 288,256 ' />";
      svg.innerHTML = text;
      weatherdiv.appendChild(svg);
    }
    hTemp = -100;
    lTemp = 100;
    for(var j=i; j<i+8; j++){
      if(j === 40){break;}
      if(Math.ceil(weatherJson.list[j].main.temp_max) > hTemp){
        hTemp = Math.ceil(weatherJson.list[j].main.temp_max);
      }
      if(Math.ceil(weatherJson.list[j].main.temp_min) < lTemp){
        lTemp = Math.ceil(weatherJson.list[j].main.temp_min);
      }
    }
    var highTemp = document.createElement("p");
    highTemp.className = "highTemp";
    highTemp.textContent = hTemp + "°";
    weatherdiv.appendChild(highTemp);
    var lowTemp = document.createElement("p");
    lowTemp.className = "lowTemp";
    lowTemp.textContent = lTemp + "°";
    weatherdiv.appendChild(lowTemp);
    var weatherDate = document.createElement("p");
    weatherDate.className = "weather__date";
    var date = new Date(weatherJson.list[i].dt_txt);
    var month = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
    weatherDate.textContent = month[date.getMonth()] + " " + date.getDate();
    weatherdiv.appendChild(weatherDate);
  }
  console.log(stage);
}

request.onload = function() {
  var weatherJson = request.response;
  showWeather(weatherJson);
}