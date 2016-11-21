<?php
require 'vendor/autoload.php';
use Aws\S3\S3Client;

$bucket = 'raw-mpl';
$keyname = 'switchonarex.png';
// $filepath should be absolute path to a file on disk						
$filepath = '/var/www/html/img/switchonarex.png';

$aws = new Aws($config);

// Get references to resource objects	
// Instantiate the client.
$s3 = S3Client::factory([
'version' => '2006-03-01',
'region' => 'us-west-2',
'credentials' => [
        'key'    => 'AKIAJRP6EG3R5YZE5A7Q',
        'secret' => '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'
    ]
]);

// Upload a file.
$result = $s3->putObject(array(
    'Bucket'       => $bucket,
    'Key'          => $keyname,
    'SourceFile'   => $filepath,
    'ContentType'  => 'image/png',
    'ACL'          => 'public-read',
    'StorageClass' => 'REDUCED_REDUNDANCY',
    'Metadata'     => array(    
        'param1' => 'value 1',
        'param2' => 'value 2'
    )
));

echo $result['ObjectURL'];
?>