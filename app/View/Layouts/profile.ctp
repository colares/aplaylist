<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> -->
<?php echo $this->Facebook->html(); ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php print Configure::read('ProjectName'); ?> | <?php echo $title_for_layout; ?></title>
    <?php
	  //   echo $this->Html->css(array(
	  //       '960',
			// 'bootstrap.min',
			// 'docs',
	  //       // 'admin',
	  //       'profile',
	  //       'thickbox',
			// '/ui-themes/smoothness/jquery-ui',
			// 'auth-buttons'
	  //   ));

	    echo $this->Layout->js();
	    echo $this->Html->script(array(
	        'jquery/jquery.min',
	  //       'jquery/jquery-ui.min',
	  //       'jquery/jquery.slug',
	  //       'jquery/jquery.uuid',
	  //       'jquery/jquery.cookie',
	  //       'jquery/jquery.hoverIntent.minified',
	  //       'jquery/superfish',
	  //       'jquery/supersubs',
	  //       'jquery/jquery.tipsy',
	  //       'jquery/jquery.elastic-1.6.1.js',
	  //       'jquery/thickbox-compressed',
	  //       'admin',
			// // TinyMCE
			// 'tiny_mce/tiny_mce.js',
			// 'tiny_mce_buttons.js',
			// // Bootstrap stuffs
			// 'bootstrap-popover',
	    ));
        echo $scripts_for_layout;


 //        <script type="text/javascript">
	//   var uvOptions = {};
	//   (function() {
	//     var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
	//     uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/sqvuDcU2fGbm6aP53IdNhQ.js';
	//     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
	//   })();
	// </script>
    ?>

	
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-12359215-17']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</head>

<body>
	<div class="navbar navbar-fixed-top">
		<?php 
			echo $this->element("default/header");
			//echo $this->element('profile/header');
		?>
	</div>
	
	<div class="container">
      <div class="row">
        <!-- <div class="span2">
          <div class="sidebar-nav">
			<a href="/profile/issues/add" class="btn btn-primary"><i class="icon-plus icon-white"></i> <?php print __('Add Issue'); ?></a>
            <ul class="nav nav-list">
              <li class="nav-header"><?php print __('My Issues'); ?></li>
              <li><a href="#"><i class="icon-list"></i> <?php print __('All Issues');  ?></a></li>
              <li><a href="#"><i class="icon-warning-sign"></i> <?php print __('Unsoved Issues');  ?></a></li>
              <li><a href="#"><i class="icon-ok"></i> <?php print __('Soved Issues');  ?></a></li>
            </ul>
          </div>
        </div> -->
        <div class="span9">
            <?php
                echo $this->Layout->sessionFlash();
                echo $content_for_layout;
            ?>	
        </div><!--/span-->
      </div><!--/row-->

      <hr>

		<?php echo $this->element('footer'); ?>

    </div><!--/.fluid-container-->





    
	<?php echo $this->Facebook->init(); ?>
    </body>
</html>