<button class="rbcircle" type="image" src="img/comment-dots.png">
    <span class="rbicon-elements">
    </span>
  </button>
  <!-- robot -->
  <div class="rbmodal-wrapper" id="model">
        <div class="rbhead">
            <div class="rbhead__box">
                <div class="rblogo__box">
                    <div class="rblogo"><img src="img/logo.png" alt="logo"></div>
                    <div id="rb_return" alt="close" > <i class="material-icons">keyboard_arrow_left</i></div>
                    <!-- <div class="rbarrow"><img src="img/baseline_keyboard_arrow_left_black_24dp.png" alt="arrow"></div> -->
                    <h1>山行者</h1>
                    <div class="rbmtsss"><img src="img/mtsss.png" alt="mtsss"></div>
                </div>
                
                    <!-- <div class="rbreturn" src="img/baseline_keyboard_arrow_left_white_24dp.png" alt="close"></div> -->

            </div>
        </div>

        <div id="rb__message">
            <div class="rbtext__show">
                <img  class=rb_img src="img/logo-1.png">
                <div class="rbp_box"> <span class="rbp_box_cor"></span>
                <span class="rbp_box_cor2"></span>您好,我是山行者，請問您在找什麼呢? </div>
                <!-- <div class="rbp-box"></div>
                <div class="rbp-frame"></div>
                <p>您好,我是山行者，請問您在找什麼呢?</p><BR /> -->
            </div>


            <!-- QA資料套入 -->
            <?php
                require_once("connectDb.php");
                $sql = "SELECT * FROM `robot` ORDER BY `qsNo` ASC";
                $sql = 'SELECT defaultQ Q, concat(IFNULL(ans1,""),"|",IFNULL(ans2,""),"|",IFNULL(ans3,""),"|",IFNULL(ans4,"")) A 
                FROM `robot` ORDER BY `qsNo` ASC';
                       // $techNo = $_REQUEST["techNo"];
                    $products = $pdo->prepare($sql); 
                       // $products->bindValue(":qsNo", $_REQUEST["qsNo"]); 
                    $products->execute(); 
                    $QAs = $products->fetchAll(PDO::FETCH_ASSOC);
                    $jsonStr = json_encode($QAs);
            ?> 

            <!-- QA資料套入 -->

        </div>
        <div class="rb-button">
            <button class="rbkeyWord-btn" onclick="btn1()">推薦</button>
            <button class="rbkeyWord-btn" onclick="btn2()">官方</button>
            <button class="rbkeyWord-btn" onclick="btn3()">自行</button>      
        </div>


        <!----滑動測試----->
        <!-- <section id="demos">
                <div class="row">
                  <div class="large-12 columns">
                    <div class="owl-carousel owl-theme">
                      <div class="item">
                      <button class="rbkeyWord-btn" onclick="btn1()">推薦</button>
                      </div>
                      <div class="item">
                        <button class="rbkeyWord-btn" onclick="btn2()">官方</button>  
                        <button class="rbkeyWord-btn"  data-val="官方" data-upval="官方">官方</button>
                      </div>
                      <div class="item">
                        <button class="rbkeyWord-btn" onclick="btn3()">自行</button>
                        <button class="rbkeyWord-btn"  data-val="自行" data-upval="自行">自行</button>
                      </div>
                      <div class="item">
                        <button class="rbkeyWord-btn" onclick="btn4()">技巧</button>
                        <button class="rbkeyWord-btn"  data-val="技巧" data-upval="技巧">技巧</button>
                      </div>
                    </div> -->

                    
                    


                     <script type="text/javascript">
                    var qaList= <?php echo $jsonStr; ?>
                    
                      // $(document).ready(function() {
                      //   $('.owl-carousel').owlCarousel({
                      //     loop: true,
                      //     margin: 10,
                      //     responsiveClass: true,
                      //     responsive: {
                      //       0: {
                      //         items: 1,
                      //         nav: true
                      //       },
                      //       300: {
                      //         items: 2,
                      //         nav: false
                      //       },
                      //       600: {
                      //         items: 3,
                      //         nav: true,
                      //       //   loop: false,
                      //         margin:10
                      //       }
                      //     }
                      //   })
                      // })
                      
                    </script>
                  <!-- </div>
                </div>
              </section>
          
             
              <script src="js/highlight.js"></script>
              <script src="js/app.js"></script> -->
              
    
        
        

        <div class="rbinput__text">
            <div class="rbtext__input">
                <!-- <input type="text"> -->
                <input id="say" name="say" type="text" cols="1" rows="1" onkeyup="keyin(event)">
                <!-- <input id="say" name="say" type="text" onkeydown="keyin(event)"/> -->
                <!-- <textarea class="butn" type="image"  onclick="say()" src="baseline_send_black_24dp.png"></textarea> -->
                <div class="rbbutn" id="input" onclick="say()"><i class="material-icons">send</i></div>
            </div>

        </div>
    <!-- <header class="modal-header">
        
      </header>
      <input class="modal-input" type="text" placeholder="Schreib uns deine Frage ..."> -->
  </div>