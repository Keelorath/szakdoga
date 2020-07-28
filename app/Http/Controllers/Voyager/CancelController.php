<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Models\Invoice;


class CancelController extends VoyagerBaseController
{

    public function cancel(){

        $invoice = Invoice::where('id', \request("id"))->first();
        $invoice->status = $invoice->status=="STORNO"?"CLOSED":"STORNO";
        $invoice->save();
        return redirect(route('voyager.invoices-storno.index'));
    }

}
