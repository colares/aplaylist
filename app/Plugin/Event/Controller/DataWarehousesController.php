<?php
App::uses('EventAppController', 'Event.Controller');
include_once App::pluginPath('Facebook') . 'Lib/PullFacebook.php';


/**
 * Events  Controller
 *
 * PHP version 5
 */
class DataWarehousesController extends EventAppController {

    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'DataWarehouses';
    public $entity = 'DataWarehouse';

    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */

    public $uses = array('Event.Event', 'Event.Tag', 'User', 'Event.DataWarehouseEvent');

    public function beforeFilter() {
        parent::beforeFilter();
    }


    public function profile_uploadTags($eid = 0) {
		$membersId = array();

        //pass appId, appSecret, and page number
        $pull_fb = new PullFb( Configure::read("Facebook.apiKey"), Configure::read("Facebook.secret"), 1 );

        //get people invited to the event
        $event_members = $pull_fb->getEventMembers($eid);
            
        //loop through event members
        $tags = array();
        foreach( $event_members as $event_member ){
            if ($event_member['rsvp_status'] == 'attending') { 
                //get profile pic and name of the event member
                $result =  $pull_fb->getUserDetails( $event_member['uid'] );

                $tags[$event_member['uid']] = $this->_grabValues($result, $event_member['uid']);
                $this->Tag->saveAll($tags[$event_member['uid']]);
                
                $membersId[] = $event_member['uid'];
                
                $proResult =  $pull_fb->getProfileDetails( $event_member['uid'] );
                $pic_square = $proResult[0]['pic_square'];
                $name = $proResult[0]['name'];
   			}
		}	
		$this->Session->setFlash(__('Event tags has been uploaded.'), 'default', array('class' => 'alert alert-success'));
		$this->redirect('/profile/events');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function profile_uploadData($eid = 0) {
    	// Event
    	$pull_fb = new PullFb( '489950941015377', '65c1c96c3b9e6bd5d516277446118597', 1 );
		$event = $pull_fb->getEvent( $eid );

    	// Fetching all tags
    	$options['recursive'] = -1;
		$options['group'] = 'Tag.key'; //, Tag.value';
		$options['fields'] = 'Tag.key';
    	$tagsKey = $this->Tag->find('all', $options);

    	$data = array();
    	$res = array();
		foreach ($tagsKey as $value) {
			$tagRes = $this->Tag->query("
	    		SELECT
	    			TagRes.value, count(*) as counter
	    		FROM 
					(SELECT 
						Tag.value, count(Tag.value)
					FROM
						tags as Tag
					WHERE 
						Tag.key = '" . $value['Tag']['key'] . "'
					GROUP BY 
						Tag.key, Tag.value, Tag.facebook_id
					)
					as TagRes
				WHERE 
					1=1 
				GROUP BY TagRes.value
    		");
    		
    		
    		foreach ($tagRes as $resultado) {
				$data[] = array('DataWarehouseEvent' => array(
					'key' => $value['Tag']['key'],
					'value' => $resultado['TagRes']['value'],
					'occurrences' => (100 * $resultado[0]['counter']) / $event[0]['attending_count'],
					'eid' => $eid
				));
			}
		}
		
		$this->DataWarehouseEvent->saveAll($data);
		$this->Session->setFlash(__('Event data has been uploaded.'), 'default', array('class' => 'alert alert-success'));
		$this->redirect('/profile/events');
		
    }
}