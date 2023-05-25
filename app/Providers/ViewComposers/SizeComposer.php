<?php
namespace App\Providers\ViewComposers;

use Illuminate\Contracts\View\View;



class SizeComposer
{
    public function compose(View $view)
    {
        $ur = url()->full();
        $arr = explode('/', $ur);
        $end = end($arr);

        $view->with('end', $end);
    }
}
