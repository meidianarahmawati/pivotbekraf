<?php
	use yii\bootstrap\Collapse;
	//item1 buletbulet
	    $this->registerJsFile('@web/js/infographic/js/modernizr.custom.js');
        $this->registerJsFile('@web/js/infographic/js/interactive-svg.js');
        $this->registerCssFile('@web/js/infographic/css/default.css');
        $this->registerCssFile('@web/js/infographic/css/interactive-svg.css');
        $this->registerCssFile('@web/js/infographic/css/top.css');
    //item2
        $this->registerJsFile('@web/js/timelinr/js/jquery.timelinr-0.9.7.js', ['position' => $this::POS_HEAD, 'depends' => [yii\web\JqueryAsset::className(), yii\bootstrap\BootstrapPluginAsset::className()]]);
        $this->registerCssFile('@web/js/timelinr/css/style.css');

    //item3 snake
        $this->registerJsFile('@web/js/snake/snake.js', ['position' => $this::POS_HEAD, 'depends' => [yii\web\JqueryAsset::className(), yii\bootstrap\BootstrapPluginAsset::className()]]);
        $this->registerCssFile('@web/js/snake/jquerysctipttop.css');

$this->title = 'BEKRAF Data';
?>
	<style type="text/css">
    	.main{
			display: inline-block;
			padding: 0;
			width: 200px;
    		height: 200px;
		}
		.main img{
			width: 100%;
			height: 100%;
		}
		.main .icon{
			width: 100%;
			height: 100%;
		}
		.glyphicon {
		    font-size: 100px;
		    color: antiquewhite;
		    margin-top: 50px;
		    margin-left: 50px;
		}		
		.main:hover .glyphicon{
		  display:none;
		}
    	.snake{
    		position: relative;
    		overflow: hidden;
    	}
    	.overlay{
    		position: absolute;
    		opacity: 0.9;

    		text-align: center;
    		padding-top: 60px;
    		background-color: #fff;
        	color:#222;
    	}
    	.overlay .title{
    		font-size: 15px;
    		font-weight: bold;
    		display: block;
    		width: 100%;
    	}
    </style>

<div id="accordion" class="row">
	<div >	
		<ul id="w0" class="nav-tabs nav">
			<li class="active"><a data-toggle="tab" href="#item1">Top 5 Subsektor</a></li>
			<li><a data-toggle="tab" href="#item2">Timeline</a></li>
			<li><a data-toggle="tab" href="#item3">Data berdasarkan ..... Subsektor</a></li>
		</ul>		
	</div>
	<div class="col-sm-12 tab-content">
		<div id="item1" class="tab-pane fade in active"><div id="stage"></div></div>
		<div id="item2" class="tab-pane fade">
			<div id="timeline">
			    <ul id="dates">
			      <li><a href="#1900">1900</a></li>
			      <li><a href="#1930">1930</a></li>
			      <li><a href="#1944">1944</a></li>
			      <li><a href="#1950">1950</a></li>
			      <li><a href="#1971">1971</a></li>
			      <li><a href="#1977">1977</a></li>
			      <li><a href="#1989">1989</a></li>
			      <li><a href="#1999">1999</a></li>
			      <li><a href="#2001">2001</a></li>
			      <li><a href="#2011">2011</a></li>
			    </ul>
			    <ul id="issues">
			      <li id="1900">
			        <img src="js/timelinr/images/1.png" width="256" height="256" />
			        <h1>1900</h1>
			        <p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			      </li>
			      <li id="1930">
			        <img src="js/timelinr/images/2.png" width="256" height="256" />
			        <h1>1930</h1>
			        <p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			      </li>
			      <li id="1944">
			        <img src="js/timelinr/images/3.png" width="256" height="256" />
			        <h1>1944</h1>
			        <p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			      </li>
			      <li id="1950">
			        <img src="js/timelinr/images/4.png" width="256" height="256" />
			        <h1>1950</h1>
			        <p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			      </li>
			      <li id="1971">
			        <img src="js/timelinr/images/5.png" width="256" height="256" />
			        <h1>1971</h1>
			        <p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			      </li>
			      <li id="1977">
			        <img src="js/timelinr/images/6.png" width="256" height="256" />
			        <h1>1977</h1>
			        <p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			      </li>
			      <li id="1989">
			        <img src="js/timelinr/images/7.png" width="256" height="256" />
			        <h1>1989</h1>
			        <p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			      </li>
			      <li id="1999">
			        <img src="js/timelinr/images/8.png" width="256" height="256" />
			        <h1>1999</h1>
			        <p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			      </li>
			      <li id="2001">
			        <img src="js/timelinr/images/9.png" width="256" height="256" />
			        <h1>2001</h1>
			        <p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			      </li>
			      <li id="2011">
			        <img src="js/timelinr/images/10.png" width="256" height="256" />
			        <h1>2011</h1>
			        <p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultjs/timelinr/rices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			      </li>
			    </ul>
			    <div id="grad_left"></div>
			    <div id="grad_right"></div>
			    <a href="#" id="next">+</a>
			    <a href="#" id="prev">-</a>
			</div>
		</div>
		<div id="item3" class="tab-pane fade">
			<div class="container">
			<h1>Data Subsektor</h1>
				<div class="main col-md-4 snake">
						<div class="overlay"><span class="title">Image #1</span>
						<span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus bibendum mollis.</span></div>
						<img class="" src="https://unsplash.it/300/300?image=585"/>
				</div>
				<div class="main col-md-4 snake">
						<div class="overlay"><span class="title">Image #2</span>
						<span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus bibendum mollis.</span></div>
						<div class="icon" style="background-color: red;"><span class="glyphicon glyphicon-music"></span></div>
				</div>
				<div class="main col-md-4 snake">
						<div class="overlay"><span class="title">Image #3</span>
						<span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus bibendum mollis.</span></div>
						<img class="" src="https://unsplash.it/300/300?image=583"/>
				</div>
				<div class="main col-md-4 snake">
						<div class="overlay"><span class="title">Image #4</span>
						<span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus bibendum mollis.</span></div>
						<div class="icon" style="background-color: blue;"><span class="glyphicon glyphicon-cutlery"></span></div>
				</div>
				<div class="main col-md-4 snake">
						<div class="overlay"><span class="title">Image #5</span>
						<span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus bibendum mollis.</span></div>
						<img class="" src="https://unsplash.it/300/300?image=579"/>
				</div>
				<div class="main col-md-4 snake">
						<div class="overlay"><span class="title">Image #6</span>
						<span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus bibendum mollis.</span></div>
						<div class="icon" style="background-color: aqua;"><span class="glyphicon glyphicon-home"></span></div>
				</div>
				<div class="main col-md-4 snake">
						<div class="overlay"><span class="title">Image #7</span>
						<span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus bibendum mollis.</span></div>
						<img class="" src="https://unsplash.it/300/300?image=550"/>
				</div>
				<div class="main col-md-4 snake">
						<div class="overlay"><span class="title">Image #8</span>
						<span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus bibendum mollis.</span></div>
						<div class="icon" style="background-color: purple;"><span class="glyphicon glyphicon-picture"></span></div>
				</div>
				<div class="main col-md-4 snake">
						<div class="overlay"><span class="title">Image #9</span>
						<span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus bibendum mollis.</span></div>
						<img class="" src="https://unsplash.it/300/300?image=576"/>
				</div>
				<div class="main col-md-4 snake">
						<div class="overlay"><span class="title">Image #10</span>
						<span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce maximus bibendum mollis.</span></div>
						<div class="icon" style="background-color: lightblue;"><span class="glyphicon glyphicon-facetime-video"></span></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>$(".snake").snakeify({speed: 200});</script>
  <script>
    $(function(){
      $().timelinr({
        arrowKeys: 'true'
      })
    });
  </script>