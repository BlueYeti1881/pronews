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
 
        <link rel="stylesheet" href="../../main/css/form.css" >

        <!--form-->

    <!-- Bootstrap core CSS -->
    <link href="../../main/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../main/css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

  
        <div class="col-lg-3">


  <div class="container" style="width: 700px;">
    
    

                        <div class="panel panel-danger">
                            <div class="panel-body">
                            <form action="php/msc.php" method="POST">
                              <h1  style="font-style: bold;">Master Notice Board</h1>


                               
                                    <div class="form-group">
                                        <label >Notice</label>
                                        <input type="text" name="name" required class="form-control" placeholder="Enter Title">
                                    </div>
                                 
                                    <div class="form-group">
                                        <label >Details</label>
                                        <textarea rows="3" name="price" class="form-control" placeholder="Enter Notice Details"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-raised btn-lg btn-warning" type="submit" value="Submit">Send</button>
                                    </div>


                                    <!-- Cloud -->

                                     <div class="form-group" style="display: none">
                            <label for="firebase_api">Firebase Server API Key:</label>
                            <input type="text" required="" class="form-control" id="firebase_api" placeholder="Enter Firebase Server API Key" value="AAAARt0qUB4:APA91bGk2cIadvgvsRjeuKSGh2C45z7QZOaT0jIkxHL_VJmHNqV4lS3YXUfd8HA0_iCd0-NBdjlWfmetnZDl4FmpAPrqVu7K-ul5YJr6nddIaz1mquCHdiCklOa-ecY-RUytP1hqIAgU" name="firebase_api">
                        </div>



                        <div class="form-group" style="display: none" id="topic_group">
                            <label for="topic">Topic Name:</label>
                            <input type="text" class="form-control" id="topic" placeholder="Enter Topic Name" value="food" name="topic">
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
         



         <!-- PHP -->
         <div class="form-group">
                    <?php
                    if(isset($_POST['title'])){
        
                        require_once __DIR__ . '/cloud/notification.php';
                        $notification = new Notification();
    
                        $title = $_POST['name'];
                        $message = isset($_POST['price'])?$_POST['price']:'';
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





        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->


    <!-- Bootstrap core JavaScript -->


  </body>

</html>

	  
	
	  
	  
	
</form> 


</body>
</html>
