<?php

namespace App\Notification;

class Toast
{

    /**
     * Create a new Toast class instance.
     */
    public function __construct(
        public string $message = 'Messsage',
        public ToastType|string $type = 'info',
        public string $context = 'Toast',
        public string $style = '')
    {
        if($this->type instanceof ToastType){
            $this->type = $this->type->value;
        }

        if(!in_array($this->type, ['info', 'success', 'warning', 'error'])){
            $this->type = 'info';
        }
    }
    
}

enum ToastType: string
{
    case INFO = 'info' ;
    case SUCCESS = 'success' ;
    case WARNING = 'warning' ;
    case ERROR = 'error' ;
}