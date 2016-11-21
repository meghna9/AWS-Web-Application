<?php 
<?php

require 'vendor/autoload.php';

use Aws\Rds\RdsClient;
$client = RdsClient::factory(array(
'region'  => 'us-west-2'
));


$result = $client->describeDBInstances(array(
    'DBInstanceIdentifier' => 'mpl-db',
));


$endpoint = " mpl-db.czi9s3krwslp.us-west-2.rds.amazonaws.com:3306"; 


foreach ($result->getPath('DBInstances/*/Endpoint/Address') as $ep) {
    // Do something with the message
    echo "============". $ep . "================";
    $endpoint = $ep;
}



echo "begin database";
$link = mysqli_connect($endpoint,"controller9","meghna999","mpl-db") or die("Error " . mysqli_error($link));

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/*
$delete_table = 'DELETE TABLE student';
$del_tbl = $link->query($delete_table);
if ($delete_table) {
        echo "Table student has been deleted";
}
else {
        echo "error!!";

}
*/
$create_table = 'CREATE TABLE IF NOT EXISTS items  
(
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(200) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    filename VARCHAR(255) NOT NULL,
    s3rawurl VARCHAR(255) NOT NULL,
    s3finishedurl VARCHAR(255) NOT NULL,
    status INT NOT NULL,
    issubscribed INT NOT NULL,
    PRIMARY KEY(id)
)';



$create_tbl = $link->query($create_table);
if ($create_table) {
	echo "Table is created or No error returned.";
}
else {
        echo "error!!";  
}
$link->close();
?>




?>
dbddl