<?php
/**
 * Class Message
 *
 * A class defining the logic around a message for use in SQS. The message is stored as JSON in the queue.
 *
 * @package     PhpSqsTutorial
 * @author      George Webb <george@webb.uno>
 * @license     http://opensource.org/licenses/MIT MIT License
 * @link        http://george.webb.uno/posts/aws-simple-queue-service-php-sdk
 */

namespace Gaw508\PhpSqsTutorial;

use Imagick;
use ImagickDraw;

class Edit
{
    /**
     * The path of the uploaded file to be processed
     *
     * @var string
     */
    public $input_file_path;

    /**
     * The path to output the processed file
     *
     * @var string
     */
    public $output_file_path;

    /**
     * The receipt handle from SQS, used to identify the message when interacting with the queue
     *
     * @var string
     */
    public $receipt_handle;

    /**
     * Construct the object with message data and optional receipt_handle if relevant
     *
     * @param string|array $data  JSON String or an assoc array containing the message data
     * @param string $receipt_handle  The sqs receipt handle of the message
     */
    public function __construct($data, $receipt_handle = '')
    {
        // If data is a json string, decode it into an assoc array
        if (is_string($data)) {
            $data = json_decode($data, true);
        }

        // Assign the data values and receipt handle to the object
        $this->input_file_path = $data['input_file_path'];
        $this->output_file_path = $data['output_file_path'];
        $this->receipt_handle = $receipt_handle;
    }

    /**
     * Returns the data of the message as a JSON string
     *
     * @return string  JSON message data
     */
    public function asJson()
    {
        return json_encode(array(
            'input_file_path' => $this->input_file_path,
            'output_file_path' => $this->output_file_path
        ));
    }

    /**
     * Processes an image given in the input file path, and outputs it in the output file path
     *
     * Takes the input image, creates a 300x300px thumbnail and overlays a text watermark.
     * Then deletes the input image.
     */
    public function process()
    {
           
	   $im1 = new Imagick($this->input_file_path);
$im2 = new Imagick("/var/www/html/projectdemo/mlaveti/week10/watermark.jpg");
$imTotal = new Imagick();
$im1->cropthumbnailimage(300, 300);
$im2->cropthumbnailimage(80, 80);

$imTotal->newimage(300, 300, '#ffffffff');

$imTotal->compositeimage($im1, Imagick::COMPOSITE_DEFAULT, 0, 0);
$imTotal->compositeimage($im2, Imagick::COMPOSITE_DEFAULT, 100, 100);

 $imTotal->setImageFormat('jpg');

        // Output the processed image to the output path (as .jpg)
        $output_path = explode('.', $this->output_file_path);
        array_pop($output_path);
        $output_path = implode($output_path) . '.jpg';
        $imTotal->writeImage($output_path);

        // Delete the input image
        unlink($this->input_file_path);
    }
}
