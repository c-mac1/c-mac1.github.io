

<?php
        $host = "ccoulter12.lampt.eeecs.qub.ac.uk";
        $user = "ccoulter12";
        $pw = "6DfmqFBNvD3FR2wq";
        $db = "ccoulter12";
 
        $conn = new mysqli($host, $user, $pw, $db);
 
        if($conn->connect_error) {
          echo $conn->connect_error;
        }
 





?>