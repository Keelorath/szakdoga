<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;
use Illuminate\Support\Facades\App;

class PrintAction extends AbstractAction
{
    public function getTitle()
    {
        return __('voyager::generic.print');

    }

    public function getIcon()
    {
        return 'voyager-pizza';
    }



    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
        ];
    }


    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'invoices-closed';
    }

    public function getDefaultRoute()
    {
        return route('invoices-closed.print', array("id"=>$this->data->{$this->data->getKeyName()}));
    }
}
