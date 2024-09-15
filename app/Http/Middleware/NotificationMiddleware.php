<?php

namespace App\Http\Middleware;

use App\Notification\Notification;
use App\Notification\Toast;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationMiddleware
{
    public Notification $notification;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->notification = app()->make(Notification::class);
        $toastData = $request->input('toast');
        $toastsData = $request->input('toasts');

        if($toastData && is_array($toastData)){
            $this->addToast($toastData);
        }

        if($toastsData){
            foreach($toastsData as $data){
                if(is_array($data)){
                    $this->addToast($data);
                }
            }
        }

        return $next($request);
    }

    public function addToast(array $data){
        $this->notification->addToast(new Toast(
            message: $data['message'] ?? '',
            type: $data['type'] ?? 'info',
            context: $data['context'] ?? 'Toast',
            style: $data['style'] ?? '',
        ));
    }
}
