<!DOCTYPE html>
<html>
  <head>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>


<!--form-->
 
        <link rel="stylesheet" href="../../../main/css/form.css" >

        <!--form-->

    <!-- Bootstrap core CSS -->
    <link href="../../../main/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../main/css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

  
        <div class="col-lg-3">


  <div class="container" style="width: 700px;">
    
    

                        <div class="panel panel-danger">
                            <div class="panel-body">
                            <form action="" method="post">
                                <div class="form-group" >
                    <h2>Send BroadCast</h2>
                    <hr />
              
             </div>
                               


    <div class="form-group" style="display: none">
                            <label for="firebase_api">Firebase Server API Key:</label>
                            <input type="text" required="" class="form-control" id="firebase_api" placeholder="Enter Firebase Server API Key" value="AAAATUavbDE:APA91bGDkHommPrKs3wz6_i70gyPXPsbXc_e-GiGk-LS7ULY6hDbs-o6PmvKT_trrF9arBem8he6RBXKlDNZ2rFWhgYE9vVG9HU8lLBFC6CkWL4KnuPcli9eDz-E6IkUDLS3mvYbtrK5" name="firebase_api">
                        </div>



                        <div class="form-group" style="display: none" id="topic_group">
                            <label for="topic">Topic Name:</label>
                            <input type="text" class="form-control" id="topic" placeholder="Enter Topic Name" value="all" name="topic">
                        </div>

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" required="" class="form-control" id="title" placeholder="Enter Notification Title" name="title">
                        </div>

                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea required="" class="form-control" rows="5" id="message" placeholder="Enter Notification Message" name="message"></textarea>
                        </div>

                        <div class="checkbox" style="display: none" >
                            <label><input type="checkbox"id="include_image" name="include_image">Include Image</label>
                        </div>

                        <div class="form-group" id="image_url_group" style="display: none"  >
                            <label for="image_url">Image URL:</label>
                            <input type="url" class="form-control" id="image_url" placeholder="Enter Image URL" name="image_url">
                        </div>
                

                                    <div class="form-group">
                                        <button class="btn btn-raised btn-lg btn-warning" type="submit" value="Submit">Send</button>
                                    </div>


                                    <div class="form-group">
                    <?php
                    if(isset($_POST['title'])){
        
                        require_once __DIR__ . '/notification.php';
                        $notification = new Notification();
    
                        $title = $_POST['title'];
                        $message = isset($_POST['message'])?$_POST['message']:'';
                        // $imageUrl = isset($_POST['image_url'])?$_POST['image_url']:'';
                        
                        $notification->setTitle($title);
                        $notification->setMessage($message);
                        // $notification->setImage($imageUrl);

                        
                        
                
                        $firebase_api = $_POST['firebase_api'];
                        
                        $topic = $_POST['topic'];
                        
                        $requestData = $notification->getNotificatin();
                        
         
                            $fields = array(
                                'to' => '/topics/' . $topic,
                                'notification' => $requestData,
                            );
                            
                       
        
                        // Set POST variables
                        $url = 'https://fcm.googleapis.com/fcm/send';
 
                        $headers = array(
                            'Authorization: key=' . $firebase_api,
                            'Content-Type: application/json'
                        );
                        
                        // Open connection
                        $ch = curl_init();
 
                        // Set the url, number of POST vars, POST data
                        curl_setopt($ch, CURLOPT_URL, $url);
 
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
                        // Disabling SSL Certificate support temporarily
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
                        // Execute post
                        $result = curl_exec($ch);
                        if($result === FALSE){
                            die('Curl failed: ' . curl_error($ch));
                        }
 
                        // Close connection
                        curl_close($ch);
                        
                        echo '<h2>Result</h2><hr/><h3>Request </h3><p><pre>';
                        echo json_encode($fields,JSON_PRETTY_PRINT);
                        echo '</pre></p><h3>Response </h3><p><pre>';
                        echo $result;
                        echo '</pre></p>';
                    }
                    ?>
    
                </div>

                                </form>

                                <div id="error_message" style="width:100%; height:100%; display:none; ">
                                    <h4>
                                        Error
                                    </h4>
                                    Sorry there was an error sending your form. 
                                </div>
                                <div id="success_message" style="width:100%; height:100%; display:none; ">
<h2>Success! Your Message was Sent Successfully.</h2>
</div>
                            </div>
                        </div>
         


    <!-- Bootstrap core JavaScript -->

            </div>
        </div>
        
<!--         <script>
            $('#include_image').change(function(e){
                    if($(this).prop("checked")==true){
                        $('#image_url_group').show();
                        $("#image_url").prop('required',true);
                    }else{
                        $('#image_url_group').hide();
                        $("#image_url").prop('required',false);
                    
                    
                    }
                });
            

        </script> -->
 
    <footer>
        <p><center>© Sagar</center></p>
    </footer>



  </body>

</html>

	  
	
	  
	  
	
</form> 


</body>
</html>
