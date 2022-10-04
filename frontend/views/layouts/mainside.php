<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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

<div class="wrap">
    <header class="header">
        <nav id="global-nav" class="nav">
          <div class="container">
            <div class="pull-left">
                <div class="logo"></div>
                <!-- <h1 class="site-title">BEKRAF</h1> -->
            </div>
            <div class="pull-right">
              <ul class="nav-list">
                <li><a class="nav-link" href="index.php">Beranda</a></li>
                <li><a class="nav-link" href="index.php?r=site%2Ftabeldinamis">Tabel Dinamis</a></li>
                <li><a class="nav-link" href="index.php?r=site%2Fmultichart">Infografis</a></li>
                <?php
                  if (Yii::$app->user->isGuest) {
                      echo '<li><a class="nav-link" href="index.php?r=site%2Flogin">Login</a></li>';
                  } else {
                      echo '<li><a class="nav-link" href="index.php?r=site%2Flogout" data-method="post">Logout (' . Yii::$app->user->identity->username . ')</a></li>';
                  }
                ?>
              </ul>
            </div>
          </div>
        </nav>
        
    </header>

      <div id="wrapper">
        <div id="sidebar-wrapper" style="position:absolute; top:0; bottom:0;">
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
        <a href="#menu-toggle" class="btn btn-secondary" style="color: white; background-color: black; border-radius: 0;" id="menu-toggle"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>  
    <div class="container">        
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

<?php $this->endBody() ?>
<script type="text/javascript">
$(document).ready(function(){
  var scrollTop = 0;
  $(window).scroll(function(){
    scrollTop = $(window).scrollTop();
     $('.counter').html(scrollTop);
    
    if (scrollTop >= 30) {
      $('#global-nav').addClass('scrolled-nav');
    } else if (scrollTop < 30) {
      $('#global-nav').removeClass('scrolled-nav');
    } 
    
  }); 
  
});
</script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $("#menu-toggle .glyphicon").toggleClass("toggled");
    });
    </script>

<style type="text/css">
body {
  padding-top: 150px;
}

.glyphicon {
  transition: transform .2s;
}

.glyphicon.toggled{
  transform: rotateZ(180deg);
}

#global-nav {
  position: fixed;
  top: 0;
  z-index: 9999;
  height: 150px;
  width: 100%;
  background: #000;
  color: #fff;
  line-height: 150px;
    -webkit-transition: height .5s, line-height .5s; /* Safari */
    transition: height .5s, line-height .5s;
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

.footer { background: #1D1D1B; padding: 30px 0; font-size: 12px; color: #fff; }
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
</style>
</body>
</html>
<?php $this->endPage() ?>
