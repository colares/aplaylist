<div class="navbar-inner">
	<div class="container">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
    	</a>
		<?php
			echo $this->Html->link(
				Configure::read('ProjectName'),
				'/',
				array('class' => 'brand')
			);
		?>
		
    	<div class="nav-collapse">

      		<ul class="nav"> 
      			<li><a class="brand" >The <Strong>Awereness</strong> Playlist <span class="label label-warning">Beta 'n' Live</span></a></li>
				<?php
					// if($this->Session->read('Auth.User')){
					// 	print '<li>';
					// 	echo $this->Html->link(__('Issues'),
					// 		array('profile' => true, 'plugin' => null, 'controller' => 'issues', 'action' => 'index')
					// 	);
					// 	print '</li>';
					// }
				?>
		        <li><?php // print $this->Html->link(__('More Information and Contacts'),"/pages/contact"); ?></li>

      		</ul>
      		<p class="navbar-text pull-right">
				<?php
					// Show login buttom if user is not logged
					// Show face and user name if is logged
					//print $this->Facebook->login(array('size' => 'large'));

					// If is logged, show logout button
					// if(isset($facebook_user) && !empty($facebook_user)){
					// 	print ' ' . $this->Facebook->logout(array(
					// 		'redirect' => '/',
					// 		'size' => 'xlarge',
					// 		'id' => 'user-logout',
					// 		 'label' => __('Logout')
					// 	));
					// }
				?>
			</p>
    	</div><!--/.nav-collapse -->
  	</div>
</div>

<!-- <ul class="pills">
	<li class="<?php echo ($this->request->here == '/' || $this->request->here == '/pages/home') ? 'active' : ''; ?>">
		<?php
			echo $this->Html->link(__('Home'),
				//array('plugin' => null, 'controller' => 'pages', 'action' => 'home')
				'/'
			);
 		?>
	</li>
	<li class="<?php echo ($this->request->here == '/registrations') ? 'active' : ''; ?>">
		<?php
			echo $this->Html->link(__('Register'),
				array('plugin' => null, 'controller' => 'registrations', 'action' => 'index')
			);
 		?>
	</li>
	<li class="<?php echo ($this->request->here == '/pages/precos') ? 'active' : ''; ?>">
		<?php
			echo $this->Html->link(__('Prices and Deadlines'),
				array('plugin' => null, 'controller' => 'pages', 'action' => 'precos')
			);
 		?>
	</li>
	<li class="<?php echo ($this->request->here == '/login') ? 'active' : ''; ?>">
		<?php
			echo $this->Html->link(__('Login'),
				array('plugin' => null, 'controller' => false, 'action' => 'login')
			);
 		?>
	</li>
	<li class="<?php echo ($this->request->here == '/pages/contato') ? 'active' : ''; ?>">
		<?php
			echo $this->Html->link(__('Contact'),
				array('plugin' => null, 'controller' => 'pages', 'action' => 'contato')
			);
 		?>
	</li>
</ul> -->
