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

    public $uses = array();

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
        $pull_fb = new PullFb( '489950941015377', '65c1c96c3b9e6bd5d516277446118597', 1 );

        //get people invited to the event
            $event_members = $pull_fb->getEventMembers('275959312512416');
            
            //loop through event members
            foreach( $event_members as $event_member ){
                if ($event_member['rsvp_status'] == 'attending') { 
                                    //get profile pic and name of the event member
                $result = $pull_fb->getUserDetails( $event_member['uid'] );
                $membersId[] = $event_member['uid'];
                debug($result);
                $pic_square = $result[0]['pic_square'];
                $name = $result[0]['name'];


                
                //display event member details
                echo "<div style='padding:8px 0; text-align:left;'>";
                
                    //small square profile pic
                    echo "<div style='float:left; width:40px;'>";
                        echo "<img src='{$pic_square}' width='30px' height='30px' />";
                    echo "</div>";
                    
                    //provide link to event member profile
                    echo "<div>Name: ";
                        echo "<a href='https://www.facebook.com/profile.php?id={$event_member['uid']}' target='_blank'>";
                            echo $name;
                        echo "</a>";
                    echo "</div>";
                    
                    //rsvp status
                    echo "<div>RSVP Status: {$event_member['rsvp_status']}</div>";

                    debug($pull_fb->getProfileDetails( $event_member['uid'] ));
                    
                echo "</div>";
                }
            
            }
            $this->set('membersId', implode(',', $membersId));
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function profile_index() {
    	print 'halo!';



//get page number
//if page num was not set, default to page 1
$page_num = isset( $_GET['page'] ) ? $_GET['page'] : 1;

//pass appId, appSecret, and page number
$pull_fb = new PullFb( '489950941015377', '65c1c96c3b9e6bd5d516277446118597', $page_num );

//just a heading
echo "<div style='font-weight: bold; margin: 0 0 20px 0;'>";
echo "This event list is synchronized with this ";
echo "<a href='https://www.facebook.com/pages/COAN-Dummy-Page/1583988933?sk=events'>";
echo "COAN Dummy Page Events</a></div>";

//pass your fan page id
$event_result = $pull_fb->getEvents( '1583988933' );

//looping through retrieved data
foreach( $event_result as $key => $value ){

    //see here http://php.net/manual/en/function.date.php for the date format I used
    //The pattern string I used 'l, F d, Y g:i a'
    //will output something like this: July 30, 2015 6:30 pm

    //getting 'start' and 'end' date,
    //'l, F d, Y' pattern string will give us
    //something like: Thursday, July 30, 2015
    $start_date = date( 'l, F d, Y', $value['start_time'] );
    $end_date = date( 'l, F d, Y', $value['end_time'] );

    //getting 'start' and 'end' time
    //'g:i a' will give us something
    //like 6:30 pm
    $start_time = date( 'g:i a', $value['start_time'] );
    $end_time = date( 'g:i a', $value['end_time'] );

    //display the album details
    echo "<div class='object_item'>";
    
    //event image
    echo "<div style='float: left; margin: 0 8px 0 0;'>";
            echo "<img src={$value['pic_big']} />";
    echo "</div>";
        
        echo "<div style='float: left;'>";
            
            //event name
            echo "<div class='field_item'>";
                echo "<div class='val' style='font-size: 26px'>";
                    echo "<a href='https://www.facebook.com/events/{$value['eid']}/' target='_blank'>";
                        echo $value['name'];
                    echo "</a>  ";
                    echo "<a href='https://www.facebook.com/events/{$value['eid']}/' target='_blank'>";
                        echo 'Playlist';
                    echo "</a>";
                echo "</div>";
            echo "</div>";
            
            //event date / time
            echo "<div class='field_item'>";
                echo "<div class='val'>";
                if( $start_date == $end_date ){
                        //if $start_date and $end_date is the same
                        //it means the event will happen on the same day
                        //so we will have a format something like:
                        //July 30, 2015 - 6:30 pm to 9:30 pm
                        echo "on {$start_date} - {$start_time} to {$end_time}";
                }else{
                        //else if $start_date and $end_date is NOT the equal
                        //it means that the event will will be
                        //extended to another day
                        //so we will have a format something like:
                        //July 30, 2013 9:00 pm to Wednesday, July 31, 2013 at 1:00 am
                        echo "on {$start_date} {$start_time} to {$end_date} at {$end_time}";
                }
                echo "</div>";
            echo "</div>";
            
            //event location
            echo "<div class='field_item'>";
                echo "<div class='lbl'>Location:</div>";
                echo "<div class='val'>" . $value['location'] . "</div>";
            echo "</div>";
            
            //event description
            echo "<div class='field_item'>";
                echo "<div class='lbl'>More Info:</div>";
                echo "<div class='val'>" . $value['description'] . "</div>";
            echo "</div>";
        
            echo "<div style='clear: both'></div>";
            
            // //get people invited to the event
            // $event_members = $pull_fb->getEventMembers( $value['eid'] );
            
            // //loop through event members
            // foreach( $event_members as $event_member ){
            
            //     //get profile pic and name of the event member
            //     $result = $pull_fb->getProfileDetails( $event_member['uid'] );
            //     $pic_square = $result[0]['pic_square'];
            //     $name = $result[0]['name'];
                
            //     //display event member details
            //     echo "<div style='padding:8px 0; text-align:left;'>";
                
            //         //small square profile pic
            //         echo "<div style='float:left; width:40px;'>";
            //             echo "<img src='{$pic_square}' width='30px' height='30px' />";
            //         echo "</div>";
                    
            //         //provide link to event member profile
            //         echo "<div>Name: ";
            //             echo "<a href='https://www.facebook.com/profile.php?id={$event_member['uid']}' target='_blank'>";
            //                 echo $name;
            //             echo "</a>";
            //         echo "</div>";
                    
            //         //rsvp status
            //         echo "<div>RSVP Status: {$event_member['rsvp_status']}</div>";
                    
            //     echo "</div>";
            // }
            
        echo "</div>";
    
    echo "<div style='clear: both'></div>";
    
    echo "</div>";
        
}






    }
}