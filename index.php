<?php require_once("db_const.php");  
	$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
	$connection->set_charset("utf-8");  
?> 
<!doctype html>
<html> 
	<head> 
		<meta charset="utf-8">
		 <title>Chuck Norris Facts</title>
 		 <link rel="stylesheet" type="text/css" href="css/styles.css">	
   </head> 
   <body>     	 
        <header><h1>Chuck Norris Facts</h1>
		<?php              
             if ($connection->connect_error) {
                die('Connect Error: ' . $connection->connect_error);
                } else {
                echo '<span class="hint">[Successful connection to MySQL database!]</span>';
                }             
             ?>
             </header>
             
        <?php 
			// jokedata is containing the SQL query 
             $jokedata = $connection->query("SELECT * FROM jokes ORDER BY id DESC"); 
            # $joke = $jokedata->fetch_array(); (i put it into while loop) 
             ###############################################################################################
             # Oh my god - I need a way to render ALL records from the database, not only the last one :-( #
             # This makes me sick...                                                                       # 
             ###############################################################################################
             #print_r($joke);
			 #while loop for rendering ALL db records
			 	while($joke = $jokedata->fetch_array()){
										
                echo '<!-- single Chuck Norris joke start -->
                <div class="joke">
                        <img src="' . $joke['img'] . '" class="norris_pic" height="210" alt="Chuck Norris caricature"/>
                        <h2>' . $joke['joke'] .  '</h2>	       
                </div>';
                echo '<!-- single joke end -->';				
				}			
    	?>  
    </body>
</html>