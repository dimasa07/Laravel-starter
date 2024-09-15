<?php

namespace App\Notification;

class Notification
{

    private array $toasts = [];

    /**
     * Create a new Notification class instance.
     */
    public function __construct()
    {
        //
    }

    public function init()
    {
        $this->toasts = [];
    }

    public function addToast(Toast $toast)
    {
        $this->toasts[] = $toast;
        if($toasts = session('toasts')){
            array_merge($this->toasts, $toasts);
        }
        session()->flash('toasts', $this->toasts);
    }

    public function getToasts()
    {
        return $this->toasts;
    }
}
