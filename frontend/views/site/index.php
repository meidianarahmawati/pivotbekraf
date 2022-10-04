<?php
        $this->registerCssFile('@web/css/heroic-features.css');

        $this->registerCssFile('@web/css/camera.css');
        $this->registerCssFile('@web/css/style.css');
        
        $this->registerCssFile('@web/css/superfish.css');
        $this->registerCssFile('@web/css/skeleton.css');
        $this->registerCssFile('@web/css/reset.css');

        $this->registerJsFile('@web/js/slide/jquery.js');
        $this->registerJsFile('@web/js/slide/jquery-migrate-1.1.1.js');
        $this->registerJsFile('@web/js/slide/script.js');
        $this->registerJsFile('@web/js/slide/jquery.equalheights.js');
        $this->registerJsFile('@web/js/slide/superfish.js');
        $this->registerJsFile('@web/js/slide/jquery.responsivemenu.js');
        $this->registerJsFile('@web/js/slide/jquery.mobilemenu.js');
        $this->registerJsFile('@web/js/slide/jquery.easing.1.3.js');
        $this->registerJsFile('@web/js/slide/camera.js');
        $this->registerJsFile('@web/js/slide/jquery.carouFredSel-6.1.0-packed.js');
?>

<style type="text/css">
  .slider_wrapper::after{ display: none; }
  .card-img-top{ height: 172px; }
  .narasi { font-size: 14px; }
  .sambutan { padding-top: 50px; padding-bottom: 50px; background-color: #ededed;}
  .menu {padding-top: 50px; padding-bottom: 50px; }
</style>

<div class="container">
    <div class="container_12">
      <div class="grid_12">
        <div class="slider_wrapper">
          <div>
            <div id="camera_wrap" class="">
               <div data-src="images/table.png">
                 <div class="caption fadeIn">
                   <h2> Tabel Dinamis </h2> <span style="font-size: 12px;"> Ubah tampilan tabel sesuai dengan kebutuhan anda</span>
                 </div>
               </div>
               <div data-src="images/analyze.png">
                 <div class="caption fadeIn">
                   <h2> Analisa </h2> <span style="font-size: 12px;"> kondisi Ekonomi Kreatif Nasional </span>
                 </div>
               </div>
               <div data-src="images/chart.png">
                 <div class="caption fadeIn">
                   <h2> Grafik Interaktif </h2> <span style="font-size: 12px;"> melihat sisi lain data </span>
                 </div>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <!-- Jumbotron Header -->
      <div class="container_12 sambutan">
        <div class="row">
          <div class="col-md-9 mb-4 ">          
            <h3>Diseminasi Data Badan Ekonomi Kreatif</h3>
            <br>
            <div class="narasi">
              Berbagai data telah dikumpulkan Badan Ekonomi Kreatif (BEKRAF) dalam kiprahnya sebagai badan pengelola ekonomi kreatif nasional. Data dikumpulkan dari hasil kerjasama dengan instansi pemerintah lainnya untuk mendapatkan gambaran kondisi Ekonomi Kreatif Nasional. Situs ini adalah bentuk komitmen BEKRAF untuk menyediakan informasi terkait Ekonomi Kreatif kepada masyarakat dan seluruh pengguna data lainnya. Dengan adanya situs ini diharapkan semua lapisan masyarakat bisa mendapatkan gambaran kondisi Ekonomi Kreatif Nasional, serta dapat memanfaatkan data yang dipresentasikan untuk menunjang analisis maupun pengambilan kebijakan di lingkungan kerja masing-masing. Besar harapan kami untuk untuk semakin membantu peningkatan industri Ekonomi Kreatif di Indonesia.
              <!-- <a href="index.php?r=site%2Ftabeldinamis" class="btn btn-primary btn-lg">Mulai Eksplorasi!</a> -->
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <img src="image/kepala.jpeg">
          </div>
        </div>
      </div>

      <!-- Page Features -->
      <div class="row text-center menu">

        <div class="col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="images/tabeldinamis.png" alt="Tabel Dinamis">
            <div class="card-body">
              <h4 class="card-title">Tabel Dinamis</h4>
              <p class="card-text">Berbagai data yang telah dihasilkan BEKRAF dapat anda eksplorasi disini. Tabel disajikan secara interaktif agar dapat memudahkan pengguna untuk menyesuaikan dengan kebutuhan masing-masing</p>
            </div>
            <div class="card-footer">
              <a href="index.php?r=site%2Ftabeldinamis" class="btn btn-primary">Buka Sekarang</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="images/grafikinteraktif.png" alt="Grafik Interaktif">
            <div class="card-body">
              <h4 class="card-title">Infografis Dinamis</h4>
              <p class="card-text">Beberapa jenis data yang sudah disajikan dalam tabel dinamis juga disajikan dalam konsep Grafik Interaktif yang mana dapat memberikan gambaran secara singkat serta mudah ditangkap untuk membantu pengguna melihat sisi lain data yang ada.</p>
            </div>
            <div class="card-footer">
              <a href="index.php?r=site%2Finfografis2" class="btn btn-primary">Buka Sekarang</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<script>
  $(document).ready(function(){
    jQuery('#camera_wrap').camera({
      loader: false,
      pagination: true,
      thumbnails: false,
      height: '45%',
      caption: false,
      time: 3000,
      navigation: false,
      fx: 'scrollLeft'
    });   
  });

  $(window).load (function(){
    $('.carousel1').carouFredSel({
      auto: false, 
      prev: '.prev1', 
      next: '.next1', 
      width: 940, 
      items: { 
        visible : {min: 1, max: 1 },
        height: 'auto',
        width: 940,
      }, 
      responsive: true, 
      scroll: 1, 
      mousewheel: false,
      swipe: {onMouse: true, onTouch: true}});
  }); 


 </script>