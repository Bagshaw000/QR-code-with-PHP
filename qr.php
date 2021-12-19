<?php
// load the qr code library
require "vendor/autoload.php";
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

/**
 * This class creates Qr Code
 * Using the Enriod QrCode library
 */
class createQr{
    // data to turned to qr code
    private $data;

    function __construct($data){
        $this->data= $data;
    }
    //creates the qr code
    function Qr(){
        $qr = QrCode::create($this->data);
        $writer = new PngWriter();
        $result = $writer->write($qr);
        return $result;
    }

    //saves and displays the qr code as png file
    function displayQr(){
        $qr= $this->Qr();
        $qr->saveToFile(__DIR__ . "/qr.png");
        header("Content-Type: " . $qr->getMimeType());
        $display=$qr->getString();
        echo $display;

        // If you need the returned value to be called in another file
        return $display;
    }

    function getData(){
        return $this->data;
    }

}
//create instance of the createQr class
$test = new createQr('me');
$test->displayQr();
