<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
  //sidebar
  $this->registerCssFile('@web/js/simple-sidebar/simple-sidebar.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="image/favicon.png">

</head>
<body>
<?php $this->beginBody() ?>

      <div id="wrapper">
        <div id="sidebar-wrapper" >
            <ul class="sidebar-nav" style=" padding-top: 30px">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="index.php?r=site%2Ftabeldinamis">Data Dinamis</a></li>
                <li><a href="index.php?r=site%2Finfografis2">Infografis</a></li>
                <?php
                  if (Yii::$app->user->isGuest) {
                      echo '<li><a href="index.php?r=site%2Flogin">Login</a></li>';
                  } else {
                      echo '<li><a href="index.php?r=site%2Flogout" data-method="post">Logout (' . Yii::$app->user->identity->username . ')</a></li>';
                  }
                ?>
            </ul>
        </div>        
      </div>  
              <a id="cd-menu-trigger" href="#cd-menu-trigger" class="hidden-sm hidden-md hidden-lg hidden-xl"><span class="cd-menu-icon"></span></a>

<div class="wrap">
    <header class="header">
        <nav id="global-nav" class="nav">
          <div class="container">
            <div class="pull-left">
                <div class="logo"></div>
                <!-- <h1 class="site-title">BEKRAF</h1> -->
            </div>
            <div class="pull-right hidden-xs">

            <!-- <a id="cd-menu-trigger" href="#"><i class="glyphicon glyphicon-menu-hamburger"></i></a> -->
              <ul class="nav-list">
                <li><a class="nav-link" href="index.php">Beranda</a></li>
                <li><a class="nav-link" href="index.php?r=site%2Ftabeldinamis">Data Dinamis</a></li>
                <li><a class="nav-link" href="index.php?r=site%2Finfografis2">Infografis</a></li>
                <?php
                  if (Yii::$app->user->isGuest) {
                      echo '<li><a class="nav-link" href="index.php?r=site%2Flogin">Login</a></li>';
                  } else {
                      echo '<li><a class="nav-link" href="index.php?r=site%2Flogout" data-method="post">Logout (' . Yii::$app->user->identity->username . ')</a></li>';
                  }
                ?>
                <li>
                </li>
              </ul>
            </div>

            <!-- <div class="hidden-sm hidden-md hidden-lg hidden-xl"> -->
            <!-- </div> -->
                  <!-- <a href="#cd-menu-trigger" class="btn btn-secondary" style="color: white; background-color: black; border-radius: 0;" id="cd-menu-trigger"><span class="glyphicon glyphicon-chevron-right"></span></a> -->
          </div>
        </nav>
        
    </header>


    <?php //echo"<br/><br/><br/><h1>".Url::current()."</h1>";
      $base="/pivot/frontend/web/";
      if(Yii::$app->request->url==$base."index.php"||Yii::$app->request->url==$base."index.php?r=site%2Findex"||substr(Yii::$app->request->url,0,51)==$base."index.php?r=site%2Ftabeldinamis"||substr(Yii::$app->request->url,0,50)==$base."index.php?r=site%2Fdaftartabel"||Yii::$app->request->url==$base."index.php?r=site%2Flogin"||Yii::$app->request->url==$base."index.php?r=site%2Flogout"||Yii::$app->request->url==$base."index.php?r=site%2Fsignup"){}else{
    ?> 
      <div id="wrapper2">
        <div id="sidebar-wrapper2" >
          <ul class="sidebar-nav" style=" padding-top: 160px">
                <li class="sidebar-brand">
                    <a href="#">
                        Pilihan Library Infografis
                    </a>
                </li>
                <li>
                    <a href="index.php?r=site%2Fmultichart">Pekerja Ekonomi Kreatif</a>
                </li>
                <li>
                    <a href="index.php?r=site%2Fwatercontent">Peran Wanita di E-Kraf</a>
                </li>
                <li>
                    <a href="index.php?r=site%2Finfografis2">Subsektor Ekonomi Kreatif</a>
                </li>
                <!-- <li>
                    <a href="index.php?r=site%2Fmultibar">Multibar</a>
                </li>
                <li>
                    <a href="index.php?r=site%2Fbaricon">Baricon</a>
                </li> barmaxicon piesubsektor-->
                <li>
                    <a href="index.php?r=site%2Fcomingsoon">Sumbangan E-Kraf dalam PDRB</a>
                </li>
                <li>
                    <a href="index.php?r=site%2Fcomingsoon">Upah/Gaji Pekerja E-Kraf</a>
                </li>
                <li>
                    <a href="index.php?r=site%2Fcomingsoon">Blue Collar vs White Collar</a>
                </li>
                <li>
                    <a href="index.php?r=site%2Fcomingsoon">Peta E-Kraf di 99 Kota</a>
                </li>
                <!-- <li>
                    <a href="index.php?r=site%2Fmultipie">Multipie</a>
                </li>
                <li>
                    <a href="index.php?r=site%2Fmaps1">HighCharts Maps 1</a>
                </li>
                <li>
                    <a href="index.php?r=site%2Fmaps2">HighCharts Maps 2</a>
                </li>
                <li>
                    <a href="index.php?r=site%2Fjchart1">jChartFX 1</a>
                </li>
                <li>
                    <a href="index.php?r=site%2Fjchart2">jChartFX 2</a>
                </li> -->
            </ul>
        </div>        
        <a href="#menu-toggle" class="btn btn-secondary" style="color: white; background-color: black; border-radius: 0;" id="menu-toggle"><span id="text">Pilihan ... </span><span class="glyphicon glyphicon-menu-hamburger"></span></a>   
    <?php  
      }
    ?>

    <div class="container content">
      <div id="wrapper">
          <?= $content ?>
      </div>
    </div>
    <footer class="footer">
          <div class="container">
              <div class="row">

                  <div class="col-sm-4">
                      <img src="http://www.bekraf.go.id/assets/images/logo.png" class="footer-logo" width="74">
                      <p>Badan Ekonomi Kreatif adalah Lembaga Pemerintah Non Kementerian yang bertanggungjawab di bidang ekonomi kreatif dengan enam belas subsektor.</p>
                      <p><a href="http://www.bekraf.go.id/profil" class="readon"><i class="fa fa-angle-right"></i> Selengkapnya</a></p>
                  </div>
                  <div class="col-sm-3">
                      <div class="footer-widget">
                          <div class="line-top"></div>
                          <div class="footer-list">
                              <div class="footer-media">
                                  <img src="http://www.bekraf.go.id/uploads/icon/map-marker.png">
                              </div>
                              <h4>Kantor</h4>
                              <a href="https://goo.gl/maps/YEons8wndgk" target="_blank">
                              <p>Gedung Kementerian BUMN, Lt 15<br>
                              Jl. Merdeka Selatan No. 13, <br>
                  Jakarta Pusat - 10110. <br></p>
                              </a>
                          </div>
                          <div class="footer-list">
                              <div class="footer-media">
                                  <img src="http://www.bekraf.go.id/uploads/icon/phone.png">
                              </div>
                              <h4>Telepon</h4>
                              <a href="tel://62-21-2120-2363"><p>+62-21-2120-2363</p></a>
                          </div>
                          <div class="footer-list">
                              <div class="footer-media">
                                  <img src="http://www.bekraf.go.id/uploads/icon/phone.png">
                              </div>
                              <h4>Faksimile</h4>
                              <a href="tel://62-21-2120-2363"><p>+62-21-2120-2363</p></a>
                          </div>
                          <div class="footer-list">
                              <div class="footer-media">
                                  <img src="http://www.bekraf.go.id/uploads/icon/email.png">
                              </div>
                              <h4>Email</h4>
                              <a href="mailto:info@bekraf.go.id"><p>info@bekraf.go.id</p></a>
                          </div>
                          <div class="footer-list">
                              <div class="footer-media">
                                  <img src="http://www.bekraf.go.id/uploads/icon/twitter.png">
                              </div>
                              <h4>Twitter</h4>
                              <a href="https://twitter.com/BekrafID" target="_blank"><p>@bekrafid</p></a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-2">
                      <div class="footer-widget">
                          <div class="line-top"></div>
                          <ul>
                              <li data-index="9"><a href="http://www.bekraf.go.id/profil">Bekraf</a></li>
                              <li data-index="10"><a href="http://www.bekraf.go.id/subsektor">Subsektor</a></li>
                  <li data-index="11"><a href="http://www.bekraf.go.id/faq">FAQ</a></li>
                              <li data-index="12"><a href="http://www.bekraf.go.id/hubungi_kami">Hubungi Kami</a></li>
                              <li data-index="13"><a href="http://www.bekraf.go.id/profil/sitemap">Peta Situs</a></li>
                              <li data-index="14"><a href="http://www.bekraf.go.id/feed/latest" target="_blank">RSS Feed</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="footer-widget">
                          <div class="line-top"></div>
                          <ul>
                              <li data-index="15"><a href="http://www.bekraf.go.id/berita/indeks/15">Pejabat Pengelola Informasi dan Dokumentasi</a></li>
                              <li data-index="16"><a href="http://www.bekraf.go.id/berita/indeks/14">Jaringan Dokumentasi Dan Informasi Hukum</a></li>
                              <li data-index="17"><a href="http://www.bekraf.go.id/berita/indeks/11">Pengumuman</a></li>
                              <!-- <li><a href="#">Hubungi Kami</a></li> -->
                              <li data-index="18"><a href="http://www.bekraf.go.id/unduh">Unduh Aplikasi</a></li>
                          </ul>
                      </div>
                  </div>

              </div>
          </div>
    <!-- 
        <div class="container">
            <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div> -->
    </footer>
    <div class="copyright">
      <div class="container">
          <span class="pull-right">Copyright © <a href="http://www.bekraf.go.id/">bekraf.go.id</a> 2018</span>
      </div>
    </div>

</div>



<?php $this->endBody() ?>
<script type="text/javascript">
$(document).ready(function(){
  var scrollTop = 0;
  $(window).scroll(function(){
    scrollTop = $(window).scrollTop();
     $('.counter').html(scrollTop);
    
    if (scrollTop >= 30) {
      $('#global-nav').addClass('scrolled-nav');
      $('#cd-menu-trigger').addClass('scrolled-nav');
    } else if (scrollTop < 30) {
      $('#global-nav').removeClass('scrolled-nav');
      $('#cd-menu-trigger').removeClass('scrolled-nav');
    } 
    
  }); 
  
});

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper2").toggleClass("toggled");
        $("#menu-toggle .glyphicon").toggleClass("toggled");
        $("#menu-toggle #text").toggleClass("toggled");
        //$(".wrap").toggleClass("toggled");
    });

    $("#cd-menu-trigger").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $("#cd-menu-trigger .glyphicon").toggleClass("toggled");        
        $("#cd-menu-trigger").toggleClass("is-clicked");
        $(".wrap").toggleClass("toggled");
        $("#global-nav .pull-right").toggleClass("toggled");
    });
</script>
<style type="text/css">
body {
  padding-top: 150px;
}

.wrap {
    margin-right: 0;
}

.wrap.toggled {
    margin-right: 250px;
}

.glyphicon {
  transition: transform .2s;
}

.glyphicon.toggled{
  transform: rotateZ(180deg);
}

#menu-toggle #text.toggled{
  display: none;
}

#cd-menu-trigger { position: relative; height: 40px; width: 40px; border-radius: 50%; border: 2px solid #AF966C; float: right; margin: -100px 30px 0 0;z-index: 20;}
#cd-menu-trigger.is-clicked {position: fixed;z-index: 20;right:0;margin: -100px 30px 0 0;}
#cd-menu-trigger .cd-menu-icon { position: absolute; left: 50% !important; top: 50%; -webkit-transform: translateX(-50%) translateY(-50%); -moz-transform: translateX(-50%) translateY(-50%); -ms-transform: translateX(-50%) translateY(-50%); -o-transform: translateX(-50%) translateY(-50%); transform: translateX(-50%) translateY(-50%); width: 18px; height: 2px; background-color: #AF966C; }
#cd-menu-trigger .cd-menu-icon::before, #cd-menu-trigger .cd-menu-icon:after { content: ''; width: 100%; height: 100%; position: absolute; background-color: inherit; left: 0; }
#cd-menu-trigger .cd-menu-icon::before { bottom: 5px; }
#cd-menu-trigger .cd-menu-icon::after { top: 5px; }
#cd-menu-trigger.is-clicked .cd-menu-icon { background-color: rgba(255, 255, 255, 0); }
#cd-menu-trigger.is-clicked .cd-menu-icon::before, #cd-menu-trigger.is-clicked .cd-menu-icon::after { background-color: #AF966C; }
#cd-menu-trigger.is-clicked .cd-menu-icon::before { bottom: 0; -webkit-transform: rotate(45deg); -moz-transform: rotate(45deg); -ms-transform: rotate(45deg); -o-transform: rotate(45deg); transform: rotate(45deg); }
#cd-menu-trigger.is-clicked .cd-menu-icon::after { top: 0; -webkit-transform: rotate(-45deg); -moz-transform: rotate(-45deg); -ms-transform: rotate(-45deg); -o-transform: rotate(-45deg); transform: rotate(-45deg); }

#cd-menu-trigger.scrolled-nav { position: fixed; height:40px !important;z-index: 20;right:0;margin: -140px 30px 0 0;}
#cd-menu-trigger.is-clicked.scrolled-nav {position: fixed;z-index: 20;right:0;margin: -140px 30px 0 0;}

#global-nav {
  position: fixed;
  top: 0;
  z-index: 2;
  height: 150px;
  width: 100%;
  background: #000;
  color: #fff;
  line-height: 150px;
    -webkit-transition: height .5s, line-height .5s; /* Safari */
    transition: height .5s, line-height .5s;
}

#global-nav .pull-right.toggled {
  display: none;
}

.site-title {
  display: inline-block;
  -webkit-transition: all .5s;
    transition: all .5s;
}

.logo {
    background-image: url("image/logo.png");
    display: inline-block;
    width: 120px;
    height: 120px;
    background-repeat: no-repeat;
    background-size: 120px 120px;
    margin: 13px 30px -45px 0px;
  -webkit-transition: all .5s;
    transition: all .5s;
}

.scrolled-nav .site-title  {
  font-size: 14px;
}

.scrolled-nav .logo {
    background-image: url("image/logo.png");
    display: inline-block;
    width: 40px;
    height: 40px;
    background-repeat: no-repeat;
    background-size: 40px 40px;
    margin: 8px;
}

.nav-list {
  list-style: none;
}

.nav-list li {
  list-style: none;
  display: inline-block;
  padding-left: 20px;
}

.nav-link {
  font-size: 16px;
  color: #fff;
  -webkit-transition: all .5s;
    transition: all .5s;
}

.scrolled-nav .nav-link {
  font-size: 14px;
  color: #fff;
}

.scrolled-nav {
  height: 60px !important;
  line-height: 60px !important;
}

.footer { background: #1D1D1B; padding: 30px 0; font-size: 12px; color: #fff; margin-top: 30px;}
.footer-logo { height: auto; margin-bottom: 20px; }
.footer a { color: #fff; }
.footer a:hover,.footer .readon { color: #B0976D; }
.footer-widget { border-top: 1px solid #868686; }
.line-top { width: 70px; height: 5px; max-height: 5px; background: #B0976D; }
.footer-widget h4 { font-size: 14px; margin: 20px 0px 0px; line-height: 18px; }
.footer-widget p { line-height: 14px; }
.footer-media { width: 30px; height: 50px; float: left; }
.footer-widget ul { list-style-type: none; margin: 20px 0 0; padding: 0; font-size: 12px }
.footer-widget ul li { margin-bottom: 5px; line-height: 18px; }

.copyright { background: #B0976D; padding: 10px 0; color: #fff; font-size: 14px; }
.copyright a { color: #1D1D1B; }
.copyright a:hover { color: #1D1D1B; }

@media(max-width:620px) {
  /*#global-nav .pull-right{
    display: none;
  }*/
  /*#cd-menu-trigger{
    position: relative; margin: 55px 0px 0 0;
  }
  #cd-menu-trigger.scrolled-nav{
    position: relative; margin: 10px 0px 0 0;
  }
  #cd-menu-trigger.is-clicked{
    position: relative; margin: 55px 250px 0 0;
  }
  #cd-menu-trigger.is-clicked.scrolled-nav{
    position: relative; margin: 10px 250px 0 0;
  }*/
}

</style>
</body>
</html>
<?php $this->endPage() ?>
