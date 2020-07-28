<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Models\Invoice;

class CloseController extends VoyagerBaseController
{

    public function close(){

        $invoice = Invoice::where('id', \request("id"))->first();
        $invoice->status = $invoice->status=="CLOSED"?"OPEN":"CLOSED";
        $invoice->save();
        return redirect(route('voyager.invoices-closed.index'));
    }

}
