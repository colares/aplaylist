<ul class="nav nav-pills">
  <li <?php if($this->params->action == 'display') { print 'class="active"'; } ?> >
    <a href="/">Home</a>
  </li>
  <li <?php if($this->params->action == 'profile_index') { print 'class="active"'; } ?>><a  href="/profile/events">Your Events</a></li>
  <li><a href="#">Logout</a></li>
  
</ul>	