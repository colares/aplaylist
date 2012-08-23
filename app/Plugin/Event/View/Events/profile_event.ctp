
<script language="javascript">
    // var to="";
    //     for(var j=0 ; j< 50 && j<friends.length ; j++){
    //         if(friends[j].checked == true){
    //             to += friends[j].value;
    //             if(j != friends.length-1 && j != 49){
    //                 to += ',';
    //             }
    //         }
    //     }
    //     var redirect_uri=your_site_url+"?button=inviteresponse";
    //     var callbackto="";
    //     for(var i=j;i<friends.length;i++){
    //         callbackto += friends[i].value;
    //         if(i != friends.length-1){
    //             callbackto += ',';
    //         }
    //     }
    //     document.cookie = "param="+callbackto+";path=/";
    //     var url=;
    //     window.open(url,'', 'width=900,height=500,resizable=yes,scrollbars=yes');  
</script>

<!-- the jQuery -->
<script type="text/javascript">
<!--
        // $(document).ready(function(){
        //     $('#inviteEventMembers').click(function(ev){
        //         window.open(
        //             "https://www.facebook.com/dialog/apprequests?app_id=489950941015377&to=<?php print $membersId; ?>&message=Checkout apps&redirect_uri=http://aplaylist.apimenti.com.br/",
        //             'Continue_to_Application',
        //             'width=200,height=400'
        //         );
        //         ev.preventDefault();
        //         return false;
        //     })
        // });
//-->
</script>

<!-- <input type="button" id="inviteEventMembers"> -->

<div id="fb-root"></div>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <p>
      <input type="button"
        onclick="sendRequestToRecipients(); return false;"
        value="Send Request to Users Directly"
      />
      <input type="text" value="User ID" name="user_ids" />
      </p>
    <p>
    <input type="button"
      onclick="sendRequestViaMultiFriendSelector(); return false;"
      value="Send Request to Many Users with MFS"
    />
    </p>
    
    <script>
      FB.init({
        appId  : '<?php print Configure::read("Facebook.apiKey"); ?>',
        frictionlessRequests: true
      });

      function sendRequestToRecipients() {
        // var user_ids = document.getElementsByName("user_ids")[0].value;
        FB.ui({method: 'apprequests',
          message: 'My Great Request',
          to: '100004253881890'
          //to: '<?php print $membersId; ?>'
        }, requestCallback);
      }

      function sendRequestViaMultiFriendSelector() {
        FB.ui({method: 'apprequests',
          message: 'My Great Request'
        }, requestCallback);
      }
      
      function requestCallback(response) {
        // Handle callback here
      }
    </script>