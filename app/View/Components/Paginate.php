<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Paginate extends Component
{

    /**
     * Create a new component instance.
     */

    public function __construct(
        public $data = null,
        public $paginator = null
    )
    {
        if(isset($this->data)){
            $this->paginator = $this->data->toArray();
            $this->paginator['links'] = Arr::map($this->paginator['links'], function($link, $i){
                $link['disabled'] = !isset($link['url']);
                $link['label'] = $this->getLabel($i);
                $link['data-tip'] = $this->getDataTip($i);

                return $link;
            });
        }

    }

    public function getLabel($i)
    {
        if($i == 0){
            return '«';
        }else if($i == count($this->paginator['links'])-1){
            return '»';
        }else{
            return $this->paginator['links'][$i]['label'];
        }
    }

    public function getDataTip($i)
    {
        if($i == 0){
            return 'Previous Page';
        }else if($i == count($this->paginator['links'])-1){
            return 'Next Page';
        }else{
            return 'Page ' . $this->getLabel($i);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.paginate');
    }
}
