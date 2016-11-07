<?php
use Aws\S3\S3Client;

$bucket = 'raw-mpl';
$keyname = 'testFile';
// $filepath should be absolute path to a file on disk						
$filepath = '/var/www/html/img/switchonarex.png';
						
// Instantiate the client.
$s3 = S3Client::factory();

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