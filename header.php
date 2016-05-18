
  <div class="container-fluid header">
       <div class="row headerrow">
          <div class="col-md-4">
            <a href="index.php" data-toggle="tooltip" data-placement="bottom" title="Home"><img src="images/logo.png" class="img img-responsive"/></a>
          </div>
           <div class="col-md-4">
           
          </div>
           <div class="col-md-4">
            <?php 
	   if(!isset($_SESSION))
	   {
		   session_start();
	   }
		if(!isset($_SESSION["name"]))
		{
			?>
           
           <?php
		}else{
			?>
             <div class="row">
             <img src="<?=$_SESSION["photo"]?>" height="60px" width="60px"/>
             </div> 
             <div class="row" style="color:#FFF">
             <?= $_SESSION["name"] ?>
             </div>
              <div class="row">
             <a class="btn btn-success" href="logout.php">Logout</a>
             </div> 
             <?php
		}
		?>
              
          </div>
          
        </div>  
  </div> 
