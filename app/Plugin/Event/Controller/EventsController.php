<?php
App::uses('EventAppController', 'Event.Controller');
// App::uses('PullFacebook', 'Facebook.Lib');
// big hand
include_once App::pluginPath('Facebook') . 'Lib/PullFacebook.php';


/**
 * Paper  Controller
 *
 * PHP version 5
 */
class EventsController extends EventAppController {

    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Events';
    public $entity = 'Event';

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */

    public $uses = array('Event.Event', 'Event.Tag');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function profile_event($eid = 0) {
        
        $membersId = array();

        //pass appId, appSecret, and page number
        $pull_fb = new PullFb( Configure::read("Facebook.apiKey"), Configure::read("Facebook.secret"), 1 );

        //get people invited to the event
            $event_members = $pull_fb->getEventMembers($eid);

            foreach( $event_members as &$event_member ){
                $event_member['user_details'] =  $pull_fb->getUserDetails( $event_member['uid'] );
                $event_member['profile_details'] =  $pull_fb->getProfileDetails( $event_member['uid'] );
            }
            
            //loop through event members
            $tags = array();
            
            $this->set('event_members', $event_members);
            
            $this->set('membersId', implode(',', $membersId));
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function profile_index() {
    	
        //get page number
        //if page num was not set, default to page 1
        $page_num = 1;

        //pass appId, appSecret, and page number
        $pull_fb = new PullFb( '489950941015377', '65c1c96c3b9e6bd5d516277446118597', $page_num );

        $events = $pull_fb->getEvents( $this->Session->read('FB.Me.id') );

        
        foreach ($events as $event) {
            
            if(!$this->Session->check($event['eid'])) {
               $this->Session->write($event['eid'], $event);
            }

            // before, check CACHE!
            if(!$this->Event->find('first', array('conditions' => array('Event.eid' => $event['eid'])))) {
                $data[] = array('Event' => array(
                    'eid' => $event['eid'],
                    'user_facebook_id' => $event['creator']
                ));
                $this->Event->saveAll($data);
                $this->Event->id = false;
            }
        }

        //pass your fan page id
        $this->set('events', $events);

        
    }
}