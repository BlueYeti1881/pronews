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
                            <form action="php/bsc.php" method="POST">
                              <h1  style="font-style: bold;">Bachelor Notice Board</h1>
                               
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
