  <!DOCTYPE html>
  <html>
  <head>
    <title><?=$title_for_layout?></title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="keyword" content="">
    <meta name="description" content="">
    <meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.fullPage.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/slide.min.css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css" media="screen" />
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="js/icon.js" type="text/javascript"></script>
  </head>
  
  <body class="main second-page ">
  <div class="page">
    <header class="header fixed">
      <div class="header-top-line">
        <div class="cr">
          <ul class="header-item header-item--lang">
            <li>
              <a href=""><img src="img/kz.jpg" alt=""></a>
            </li>
            <li>
              <a href=""><img src="img/ru.jpg" alt=""></a>
            </li>
            <li>
              <a href=""><img src="img/eng.jpg" alt=""></a>
            </li>
          </ul>
          <ul class="header-item soc-seti">
            <li>
              <a href="" class="face"></a>
            </li>
            <li>
              <a href="" class="twit"></a>
            </li>
            <li>
              <a href="" class="google"></a>
            </li>
            <li>
              <a href="" class="in"></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="header-fix">
        <div class="header-bottom-height"></div>
        <div class="header-bottom">
          <div class="cr">
            <a href="/<?=$lang?>" class="header-logo">
              <img src="img/logo.png" alt="">
            </a>
            <div class="searach-container">
              <div class="searach-container__icon">
                <img src="img/search.png" alt="">
              </div>
              <div class="searach-container__input">
                <input type="text" placeholder="Поиск по сайту">
              </div>
            </div>
            <div class="menu-container">
            <?php echo $this->element('header') ?>
            </div>
          </div>
        </div>
      </div>    
    </header> 
  <div id="fullpage">
    <div class="section">
    <section class="pages pages--programm">
      <div data-js="cover" class="cover">
        <div data-js="item" class="cover_item">
          <div class="cover_frame cover_frame--desktop" style="background-image:url(img/slider-krug.jpg);">
            <span class="cover_preview" style="background-image:url(img/2.jpg);"></span>          
            
          </div>
          <div class="cover_frame cover_frame--mobile" style="background-image:url(img/slider-krug.jpg);">
                <!-- <div class="column"> -->
            <span class="cover_preview" style="background-image:url(img/2.jpg);"></span>
                <!-- </div> -->
          
          </div>
        </div>
        <div data-js="item" class="cover_item">
          <div class="cover_frame cover_frame--desktop" style="background-image:url(img/2.jpg);">
                <!-- <div class="column"> -->
            <span class="cover_preview" style="background-image:url(img/slider-krug-mini.jpg);"></span>
                  <!-- </div> -->
          
          </div>
          <div class="cover_frame cover_frame--mobile" style="background-image:url(img/2.jpg);">
                <!-- <div class="column"> -->
            <span class="cover_preview" style="background-image:url(img/slider-krug-mini.jpg);"></span>
                <!-- </div> -->
            
          </div>
        </div>
        <div data-js="item" class="cover_item">
          <div class="cover_frame cover_frame--desktop" style="background-image:url(img/slider-krug.jpg);">
                <!-- <div class="column"> -->
            <span class="cover_preview" style="background-image:url(img/2.jpg);"></span>
                  <!-- </div> -->
          
          </div>
          <div class="cover_frame cover_frame--mobile" style="background-image:url(img/slider-krug.jpg);">
                <!-- <div class="column"> -->
            <span class="cover_preview" style="background-image:url(img/2.jpg);"></span>
                <!-- </div> -->
            
          </div>
        </div>
        <div data-js="item" class="cover_item">
          <div class="cover_frame cover_frame--desktop" style="background-image:url(img/2.jpg);">
                <!-- <div class="column"> -->
            <span class="cover_preview" style="background-image:url(img/slider-krug-mini.jpg);"></span>
                  <!-- </div> -->
          
          </div>
          <div class="cover_frame cover_frame--mobile" style="background-image:url(img/2.jpg);">
                <!-- <div class="column"> -->
            <span class="cover_preview" style="background-image:url(img/slider-krug-mini.jpg);"></span>
                <!-- </div> -->
            
          </div>
        </div>
        <div class="cover_gradBottom"></div>
        <div class="cover_gradLeft"></div>

          <div data-timer="{&quot;className&quot;:&quot;pointTimer_point&quot;, &quot;r&quot;:30, &quot;points&quot;:30, &quot;time&quot;:40}" class="cover_timer pointTimer"></div>

        <a data-js="next-btn" class="cover_next" href="#">
          <span class="cover_nextCenter">
            
          </span>
        </a>

        <div class="cover_mnav">
                 <a href="javascript:void(0)" class="cover_mnav-dot"></a>
                 <a href="javascript:void(0)" class="cover_mnav-dot"></a>
                 <a href="javascript:void(0)" class="cover_mnav-dot"></a>
                  <a href="javascript:void(0)" class="cover_mnav-dot"></a>
          </div>


      </div>
      
    </section>
    </div>
    <div class="section">
      <section class="pages pages--second">
      <div class="cr cr-index">
        <div class="cr-item">
          <div class="card-box">
            <div class="card-box__item ">
              <a href="/<?=$lang?>page/mission" class="card-item h_height card-item--left missia">
                <div class="float-right-block">
                <div class="inset-box">
                  <div class="missia-title">
                    МИССИЯ И СТРАТЕГИЯ
                  </div>
                  <p>
                    Краткое описание раздела
  “Миссия и стратегия”,
  в данный момент здесь
  находится “Рыба-текст”...
                  </p>
                </div>
                </div>   
              </a>
              <div class="card-item  h_height card-item--right">
                <a href="" class="card-item_mini-card prioritet">
                 <div>Приоритеты <br>
и ценности</div>
                </a>
                <a href="/<?=$lang?>page/word-from-principle" class="card-item_mini-card slovo">
                  <div>слова <br>
руководства</div>
                </a>
              </div>
            </div>
            <div class="card-box__item ">
              <div class="card-item rukovodstvo">
                <div class="inset-box">
                  <div class="card-item__title">
                    руководство
                  </div>
                  <p>
                  Краткое описание раздела
                    “Миссия и стратегия”,
                    в данный момент здесь
                    находится “Рыба-текст”...
                  </p>
                  <a href="/<?=$lang?>leaderships" class="button">
                    Узнать подробнее
                  </a>
                </div>
              </div>
              <div class="card-item card-item-small">
                <a href="/<?=$lang?>page/about" class="card-item-children">
                  <div class="inset-box">
                    <div class="missia-title">
                      О компании
                    </div>
                    <p>
                      Краткое описание раздела
    “Миссия и стратегия”,
    в данный момент здесь
    находится “Рыба-текст”...
                    </p>
                  </div>
                </a>
                <div class="card-item_mini-card-container h_height">
                  <a href="/<?=$lang?>reviews" class="card-item_mini-card card-item_mini-card-preimushestvo">
                   Отзывы
                  </a>
                   <a href="/<?=$lang?>presentations" class="card-item_mini-card card-item_mini-card-prezintacia">
                   ПРЕЗЕНТАЦИЯ и видео
                  </a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      </section>
    </div>
  </div>
</div>
    <footer class="footer">
      
    </footer>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.fullPage.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#fullpage').fullpage({
          anchors:['Main','Programm','Pre','Review','Contact'],
          menu:"#rightMenu",
          navigation: true,           
        });
      });
    </script>
    <script src="js/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="js/app.js" type="text/javascript"></script>
    <script src="js/bee3D.js" type="text/javascript"></script>
    <script src="js/classie.js" type="text/javascript"></script>
     <script>
    var element = document.querySelector('.example');

    var slider = new Bee3D(element, {
      effect: 'concave',
      listeners: {
        keys: true
      },
      navigation: {
        enabled: true
      }
    });
  </script>
</body>
</html>