<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript">
        
            function alphabetSearchName(let){
                document.location  = "searchStudent.php?fname="+let; }
                
            function alphabetSearchLastName(let){
                document.location  = "searchStudent.php?lastName="+let; }
            
        </script>
        
          <title>Your Home Page</title>
          <link href="style.css" rel="stylesheet" type="text/css">  
    </head>
    <body>
    
        <h3> Search by: </h3>
   
        <div id="profile">
          <b id="welcome">Welcome : <i><?php echo $_SESSION['Username'] ?></i></b>
          <b id="logout"><a href="logout.php">Log Out</a></b>
            <h1>Attendace</h1>
 

            <h3>Search By:</h3>
         Name: 
             <script> 
                    var  byName = "";
                    var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    var letterArray = letters.split("");
                    for(var i = 0; i < 26; i++){
                         var fname =letterArray.shift();
                         byName += '<button name =\''+fname+'\' id =\''+fname+'\' class="mybtns" onclick="alphabetSearchName(\''+fname+'\');">'+fname+'</button>';
                    }
            </script>
            <script> document.write(byName); </script>
      
              <br><br>
         Last Name: 
            <script> 
                var byLastName = "";
                var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                var letterArray = letters.split("");
                for(var i = 0; i < 26; i++){
                     var lastName = letterArray.shift();
                     byLastName += '<button name =\''+lastName+'\' id =\''+lastName+'\' class="mybtns" onclick="alphabetSearchLastName(\''+lastName+'\');">'+lastName+'</button>';
                }
            </script>
            <script> document.write(byLastName); </script>
    </div>
  </body>
</html>