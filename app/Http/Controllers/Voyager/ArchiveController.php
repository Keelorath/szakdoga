<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Models\Invoice;


class ArchiveController extends VoyagerBaseController
{

    public function archive(){

        $invoice = Invoice::where('id', \request("id"))->first();
        $invoice->status = $invoice->status=="ARCHIVED"?"CLOSED":"ARCHIVED";
        $invoice->save();
        return redirect(route('voyager.invoices-archived.index'));
    }

}
