<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> -->
<?php echo $this->Facebook->html(); ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php print Configure::read('ProjectName'); ?> | <?php echo $title_for_layout; ?></title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
    <?php
	  //   echo $this->Html->css(array(
	  //       // '960',

			// 'bootstrap.min',

			// // 'docs',
	  //       // 'admin',
	  // //       'profile',
	  // //       'thickbox',
			// // '/ui-themes/smoothness/jquery-ui',
			// // 'auth-buttons'
	  //   ));

	    // echo $this->Layout->js();

		// echo $this->fetch('script');
		// echo $this->Html->script(array(
		// 	'jquery/jquery',
		// 	'bootstrap/bootstrap'
		// ));


 //        <script type="text/javascript">
	//   var uvOptions = {};
	//   (function() {
	//     var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
	//     uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/sqvuDcU2fGbm6aP53IdNhQ.js';
	//     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
	//   })();
	// </script>
    ?>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap/bootstrap.js"></script>
	
	

</head>

<body>

	<div class="navbar navbar-fixed-top">
		<?php 
			echo $this->element("default/header");
			//echo $this->element('profile/header');
		?>
	</div>
	<br><Br><br>

	<div class="container">
			
            <?php
            	echo $this->element("default/navigation");
                echo $this->Layout->sessionFlash();
                echo $content_for_layout;
            ?>	
        
      <hr>

		<?php echo $this->element('footer'); ?>

    </div><!--/.fluid-container-->





    
	<?php echo $this->Facebook->init(); ?>
    </body>
</html>