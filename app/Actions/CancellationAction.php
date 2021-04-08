<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class CancellationAction extends AbstractAction
{
    public function getTitle()
    {
        // Action title which display in button based on current status
        return __('voyager::generic.storno');
    }

    public function getIcon()
    {
        // Action icon which display in left of button based on current status
        return 'voyager-refresh';
    }

    public function getAttributes()
    {
        // Action button class
        return [
            'class' => 'btn btn-sm btn-primary pull-left',
        ];
    }

    public function shouldActionDisplayOnDataType()
    {
        // show or hide the action button, in this case will show for posts model
        return $this->dataType->slug == 'invoices-closed';
    }

    public function getDefaultRoute()
    {
        // I had to use "Cancelation" instead of "Storno" because PhpStorm won't let me.
        return route('invoices-closed.cancel', array("id"=>$this->data->{$this->data->getKeyName()}));
    }
}
