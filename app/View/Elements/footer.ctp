<footer>
	<p><?php
		echo Configure::read('ProjectName') . ' – ' . __('Powered by %s',$this->Html->link('Apimenti', 'http://www.apimenti.com.br'));
	?></p>
	<div id="flashMessage" class="alert alert-error"><?php print __('<strong>Warning:</strong> this is an experimental <em>alpha</em> version for testing. Use carefully.') ?></div>
  	<p><?php 
		echo '<small>' . __('Last Update: %s, Version: %s.', Configure::read('LastDate'), Configure::read('Version'));
		echo '</small> ';
	?></p>
	

</footer>