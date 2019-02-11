var qaList = [
  { Q:"謝謝", A:"不客氣!"},
  { Q:"行程|訂購",A:"你想客製行程還是官方行程呢?"},
  { Q:"客製",A:"你有想去的地方嗎?"},
  { Q:"官方",A:"你有看到中意的行程嗎?"},
  { Q:"亞洲",A:"亞洲地區我們推薦富士山喜、馬拉雅山- 珠穆朗瑪峰和玉山"},
  { Q:"歐洲",A:"歐洲我們推薦阿爾卑斯山 -少女峰"},
  { Q:"北美洲",A:"北美洲我們推薦優勝美地"},
  { Q:"南美洲",A:"南美洲我們推薦百內國家公園、馬丘比丘和聖克魯斯山"},
  { Q:"大洋洲",A:"大洋洲我們推薦阿斯帕林山"},
  { Q:"非洲",A:"非洲我們推薦吉力馬札羅山"},
  { Q:"", A:"可以說的更詳細一點嗎?|可否多告訴我一些關鍵字呢?"}
  
  ];  
    // <form keyin="send" onsubmit="return chk();">
    //  function chk(){
    //   if(document.send.account.value==''){
    //     document.send.account.focus();
    //     return false;
    //   }
    // }
  
  
      function random(n) { // 從 0 到 n-1 中選一個亂數
        return Math.floor(Math.random()*n);
      }
      
      function say() { // 當送出鍵按下時，會呼叫這個函數進行回答動作
        // console.log(document.getElementById("say").value);
        append(document.getElementById("say").value);
      
         // 先將使用者輸入的問句放到「對話區」顯示。
        input.value="";
         document.getElementById("say").value="";//輸出後欄位空白,但導致對話判斷失效。
        answer(); // 然後回答使用者的問題。
      }
      
      // function keyin(event) { // 當按下 enter 鍵時，會呼叫此函數進行回答
        // var keyCode = event.which;
        // if (say=="")return=false; // 取出按下的鍵
        // if (keyCode == 13) say(); // 如果是換行字元 \n ，就進行回答動作。
      // }
      
      function append(line) { // 將 line 放到「對話區」顯示。
        var rb__message = document.getElementById("rb__message");
        // 取出對話框 
        rb__message.innerHTML += '<div class="person_text rbtext__show"> <p>'+line+"</p></div><BR/>"+"\n"; // 加入 line 這行文字，並加入換行 <BR/>\n
        rb__message.scrollTop = rb__message.scrollHeight;
        // document.getElementById("massage").style. 
        if ("rb__message") {
          document.getElementById("rb__message").style.color="#484848";
        } else if ("message") {
          document.getElementById("rb__message").style.fontFamily="Microsoft JhengHei";
        } else {
          document.getElementById("rb__massage").style.backgroundcolor="#ffffff";
        }
        // 捲動到最下方。
      }
  
      function append1(line) { // 將 line 放到「對話區」顯示。
        var rb__message = document.getElementById("rb__message");
        // 取出對話框 
        rb__message.innerHTML +="<div class='rbtext__show'>"+line+"<BR/>"+"\n"; // 加入 line 這行文字，並加入換行 <BR/>\n
        rb__message.scrollTop = rb__message.scrollHeight; 
        if ("rb__message") {
          document.getElementById("rb__message").style.color="#484848";
        } else if ("rb__message") {
          document.getElementById("rb__message").style.fontFamily="Microsoft JhengHei";
        } else {
          document.getElementById("rb__massage").style.backgroundcolor="#ffffff";
        }
        // 捲動到最下方。
      }
  
      function answer() { // 回答問題
        setTimeout(function () { // 停頓 1 到 3 秒再回答問題 (因為若回答太快就不像人了，人打字需要時間)
          append1('<img src="../img/logo-1.png">'+"<p>"+ getAnswer()+"</p>");
        }, 1000+random(2000));
      }
  
      function getAnswer() {
        var say = document.getElementById("say").value; // 取得使用者輸入的問句。
        for (var i in qaList) { // 對於每一個 QA 
         try {
          var qa = qaList[i];
          var qList = qa.Q.split("|"); // 取出 Q 部分，分割成一個一個的問題字串 q
          var aList = qa.A.split("|"); // 取出回答 A 部分，分割成一個一個的回答字串 q
          for (var qi in qList) { // 對於每個問題字串 q
            var q = qList[qi];
            if (q=="") // 如果是最後一個「空字串」的話，那就不用比對，直接任選一個回答。
              return aList[random(aList.length)]; // 那就從答案中任選一個回答
            var r = new RegExp("(.*)"+q+"([^?.;]*)", "gi"); // 建立正規表達式 (.*) q ([^?.;]*)
            if (say.match(r)) { // 比對成功的話
              tail = RegExp.$2; // 就取出句尾
              // 將問句句尾的「我」改成「你」，「你」改成「我」。
              tail = tail.replace("我", "#").replace("你", "我").replace("#", "你");
              return aList[random(aList.length)].replace(/\*/, tail); // 然後將 * 改為句尾進行回答
            }
          }
         } catch (err) {}
        }
        return "系統維護中"; // 如果發生任何錯誤，就回答「然後呢？」來混過去。
      }   
  
      //------視窗消失------//
      var modal = document.querySelector("#model");
      var rbcircle = document.querySelector(".rbcircle");
      var on = false;
      var body = document.getElementsByTagName("body")[0];
      rbcircle.addEventListener("click", () => {
          if (!on) {
            model.style.cssText = "bottom:120px;display:block";
              on = true;
          }
          else if (on) {
            model.style.display = "none";
              on = false;
          }
      }, true);
      model.addEventListener("click", () => {
        model.style.display = "block";
      }, true);
      body.addEventListener("click", () => {
        model.style.display = "none";
      }, true);



  
  
      const CLASS_CIRCLE = '.rbcircle';
      const CLASS_ICON = '.rbicon-elements';
      const CLASS_MODAL = '.rbmodal-wrapper';
      const CLASS_ICON_ACTIVE = 'js-icon-active';
      const CLASS_MODAL_ACTIVE = 'js-modal-active';
  
      const elementCircle = document.querySelector(CLASS_CIRCLE);
      const elementIcon = document.querySelector(CLASS_ICON);
      const elementModal = document.querySelector(CLASS_MODAL);
      const elementInput = document.querySelector('#myInput');
  
      const triggerAnimation = () => {
        const isActive = elementIcon.classList.contains(CLASS_ICON_ACTIVE);
        console.log(isActive);
        isActive ? (
          elementIcon.classList.remove(CLASS_ICON_ACTIVE),
          elementModal.classList.remove(CLASS_MODAL_ACTIVE)
        ) : (
          elementIcon.classList.add(CLASS_ICON_ACTIVE),
          elementModal.classList.add(CLASS_MODAL_ACTIVE)
        );
      }
  
      elementCircle.addEventListener('click', () => triggerAnimation());
  
  
      document.querySelector("#rbout").addEventListener("click",()=>{
         elementIcon.classList.remove(CLASS_ICON_ACTIVE),
          elementModal.classList.remove(CLASS_MODAL_ACTIVE);
      })
      window.addEventListener("click",()=>{
         elementIcon.classList.remove(CLASS_ICON_ACTIVE),
          elementModal.classList.remove(CLASS_MODAL_ACTIVE);
  
        },true);
        document.querySelector("#model").addEventListener("click",()=>{
          elementIcon.classList.add(CLASS_ICON_ACTIVE),
          elementModal.classList.add(CLASS_MODAL_ACTIVE)
  
        },true)
