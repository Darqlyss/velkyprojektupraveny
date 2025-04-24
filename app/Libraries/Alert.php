<?php

namespace App\Libraries;
use Config\MyConfig;

class Alert
{
    public $message = '';
    public $class = '';

    public function prepareMessage($status, $type, $name = '')
    {
        $result = new \stdClass();
        $config = new \Config\MyConfig();
    

        if ($status) {
            $result->class = 'success';
            $key = $type . 'Success'; 
        } else {
            $result->class = 'danger';
            $key = $type . 'Error'; 
        }
    

        if (isset($config->alertMessage[$key])) {
            $message = $config->alertMessage[$key];
        } else {
            $message = 'Záznám byl smazán'; 
        }
    

        if (!empty($name)) {
            $message = str_replace('{name}', $name, $message);
        }
    
        $result->message = $message;
        return $result;
    }
    
}
