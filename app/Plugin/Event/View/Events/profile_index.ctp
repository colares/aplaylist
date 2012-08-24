

        

<?php 




//looping through retrieved data
$index = 0;
foreach( $events as $key => $value ){
    $index++;

    //see here http://php.net/manual/en/function.date.php for the date format I used
    //The pattern string I used 'l, F d, Y g:i a'
    //will output something like this: July 30, 2015 6:30 pm

    //getting 'start' and 'end' date,
    //'l, F d, Y' pattern string will give us
    //something like: Thursday, July 30, 2015

    $start_date = date( 'l, F d, Y', strtotime($value['start_time']) );
    $end_date = date( 'l, F d, Y', strtotime($value['end_time']) );

    //getting 'start' and 'end' time
    //'g:i a' will give us something
    //like 6:30 pm
    $start_time = date( 'g:i a', strtotime($value['start_time']) );
    $end_time = date( 'g:i a', strtotime($value['end_time']) );
?>



<script type="text/javascript">
        $(document).ready(function() {
            $('#myModal<?php print $index; ?>').modal({
                show: false
            });
            /*
             *  Simple image gallery. Uses default settings
             */
        });

    </script>

<div id="myModal<?php print $index; ?>" class="modal hide fade">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h3><?php print $value['name']; ?></h3>
    </div>
    <div class="modal-body">
     
    </div> <!-- modal body -->
    <div class="modal-footer">
        <input type="submit" value="Publicar Idéias" class="btn btn-primary btn-large">
        <a href="#" class="btn" data-dismiss="modal" >Fechar</a>
    </div>
    </form>
</div><!-- modal -->




    <div class="row">
        <div class="span3">
            <?php print $this->Html->Image($value['pic_big']); ?>
        </div>
        <div class="span9">
            <h1><?php print $value['name']; ?></h1>
            <?php

                if( $start_date == $end_date ){
                        //if $start_date and $end_date is the same
                        //it means the event will happen on the same day
                        //so we will have a format something like:
                        //July 30, 2015 - 6:30 pm to 9:30 pm
                        $datePeriod = "on {$start_date} - {$start_time} to {$end_time}";
                }else{
                        //else if $start_date and $end_date is NOT the equal
                        //it means that the event will will be
                        //extended to another day
                        //so we will have a format something like:
                        //July 30, 2013 9:00 pm to Wednesday, July 31, 2013 at 1:00 am
                        $datePeriod = "on {$start_date} {$start_time} to {$end_date} at {$end_time}";
                }
            ?>
            <h5><?php print $datePeriod; ?></h5>
            <a data-toggle="modal" href="#myModal<?php print $index; ?>" class="btn btn-warning"><i class="icon-play icon-white"></i> Playlist</a>
            <a class="btn" href="/profile/events/event/<?php print $value['eid'];?>"type="button">See more...</a>
            <dl class="dl-horizontal">
                <dt>Location</dt>
                <dd><?php print $value['location']; ?></dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>More Info</dt>
                <dd><?php print $value['description']; ?></dd>
            </dl>
        </div>
    </div>
    <hr>

<?php
}
?>