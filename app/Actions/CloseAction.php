<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class CloseAction extends AbstractAction
{
public function getTitle()
{
return 'Close';
}

public function getIcon()
{
return 'voyager-lock';
}

public function getPolicy()
{
return 'read';
}

public function getAttributes()
{
return [
'class' => 'btn btn-sm btn-primary pull-right',
];
}

public function getDefaultRoute()
{
    return route('invoices-open.close', array("id"=>$this->data->{$this->data->getKeyName()}));
}
    public function shouldActionDisplayOnDataType()
    {
      return $this->dataType->slug == 'invoices-open';
    }
}
