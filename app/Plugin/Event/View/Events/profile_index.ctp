<?php 
echo $this->Facebook->login(array(
 'perms' => 'email,user_events,user_activities,user_interests,user_likes'
));
debug($facebook_user);



 ?>
<br>
<?php echo $this->Facebook->logout(array('redirect' => array('controller' => 'users', 'action' => 'logout'))); ?>