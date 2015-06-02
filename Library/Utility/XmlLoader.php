<?php
/**
 * XmlLoader class
 * 
 * @author Jeremie Litzler
 * @Copyright (c) 2015, Jeremie Litzler
 * @link http://jeremielitzler.net/Blog
 * 
 */
namespace Library\Utility;
if ( ! defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed');

class XmlLoader
{
    /**
     * path to xml file to load
     * 
     * @var string 
     */
    public $filePath = "";

    function __construct($filePath) {
        $this->filePath= $filePath;
    }
    
    public function Load() {
        $xml = NULL;
        if (file_exists($this->filePath)) {
            $xml = simplexml_load_file($this->filePath);
        } else {
            error_log('Failed to open '.$this->filePath);
        }
        return $xml;
    }
}