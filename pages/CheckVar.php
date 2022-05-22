<?php
 $root =$_SERVER;
 ?>
<p class="Check">
    <?PHP

$dns = $_ENV['DATABASE_DNS'];
$host = getenv('DATABASE_USER');
$pass = getenv('DATABASE_PASSWORD');
//var_dump($_ENV);

try{
    $conn = new PDO($dns,$host,$pass);

    //Execute a "SHOW DATABASES" SQL query.
$stmt = $conn->query('SHOW DATABASES');

//Fetch the columns from the returned PDOStatement
$databases = $stmt->fetchAll(PDO::FETCH_COLUMN);

//Loop through the database list and print it out.
foreach($databases as $database){
    //$database will contain the database name
    //in a string format
    echo $database, '<br>';
}
}
catch(PDOException $pe)
        {
            $errorMsg = $pe->getMessage();
            echo $errorMsg;

            if(str_contains($errorMsg,'Unknown database'))
            {
                echo "this is Bad Connection";
                echo '<form action="../BDD/bdd_create.php" method="get">
                host: <input type="text" name="host">
                user: <input type="text" name="user">
                password: <input type="text" name="password">
                <input type="submit" value="Open Form">
                </form>';
            }
            else{
                echo "is other error";
                echo 'dns = '. $dns;
               echo 'host = '. $host;
                echo 'pass = '. $pass;
            }
        }     
//phpinfo();
// foreach($_SERVER as $key_name => $key_value) {

// print $key_name . " = " . $key_value . "<br>";

// }

?>
</p>