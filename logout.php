<<<<<<< HEAD
<?php

   if(!isset($_SESSION))
	   {
		   session_start();
	   }
	   session_destroy();
	   header("Location: index.php");
	   
=======
<?php

   if(!isset($_SESSION))
	   {
		   session_start();
	   }
	   session_destroy();
	   header("Location: index.php");
	   
>>>>>>> d57608d56be1949eb28c6032b81c46cf51a7c686
?>