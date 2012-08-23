

	<div class="row">
		<div class="span6">
	        <h2>Audience-based music playlists for your events.</h2>
	        <p>
	        	Resumé:
	        	<ul>
	        		<li>Do you have an event with friends? Party, travel, open-house etc.</li>
	        		<li>What about build some awesome playlists based on <Strong>your and theirs preferences</strong>?</li>
	        		<li>The aim of this app: to create playlist for an event created at Facebook bases on members preferences!</li>
	        	</ul>
	        </p>
      	</div>
		<div class="span6">
	        <h3>You're a special beta-users</h3>
	       	<p><strong>
	       		I need your help right now. To do so, just login with your Facebook account and accept the terms. </strong>

	       		</p>
	  
	        <p>
	        	<?php 
					echo $this->Facebook->login(array(
					'perms' => 'email, user_hometown, user_location, user_interests, user_likes, user_about_me, user_birthday, user_actions.music'
					));
					print '<br>';
					if(isset($facebook_user) && !empty($facebook_user)){
						print ' ' . $this->Facebook->logout(array(
							'redirect' => '/',
							'size' => 'xlarge',
							'id' => 'user-logout',
							 'label' => __('Logout')
						));
					}

 ?>
	        </p>
	        <p>I'll use some of your data as the very-first input to this app. 

	       		No matter what, I'll <strong>not</strong> use this for other propourses. This is a pink promise! :)
	       	</p>
      	</div>
	</div>

<br>
<?php echo $this->Facebook->logout(array('redirect' => array('controller' => 'pages', 'action' => 'display/home'))); ?>