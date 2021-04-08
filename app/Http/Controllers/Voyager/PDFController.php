<?php

namespace App\Http\Controllers\Voyager;
use App\Organization;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Models\Invoice;

class PDFController extends VoyagerBaseController
{
    public function print(){
        $invoice = Invoice::where('id', \request("id"))->first();
        // organizations táblába való turkálás
        $name= DB::table('invoices')
                ->join('organizations','organizations.id','=','invoices.organization_id')
                ->where('organizations.id',"=",$invoice->organization_id)
                ->select(
                    'organizations.name'
                )
                ->distinct()
                ->get();

        $email= DB::table('invoices')
            ->join('organizations','organizations.id','=','invoices.organization_id')
            ->where('organizations.id',"=",$invoice->organization_id)
            ->select(
                'organizations.email_address'
            )
            ->distinct()
            ->get();

        $orgAddress= DB::table('invoices')
            ->join('organizations','organizations.id','=','invoices.organization_id')
            ->where('organizations.id',"=",$invoice->organization_id)
            ->select(
                'organizations.address'
            )
            ->distinct()
            ->get();

        $bankAccount= DB::table('invoices')
            ->join('organizations','organizations.id','=','invoices.organization_id')
            ->where('organizations.id',"=",$invoice->organization_id)
            ->select(
                'organizations.bank_account'
            )
            ->distinct()
            ->get();

        $bankNubmer= DB::table('invoices')
            ->join('organizations','organizations.id','=','invoices.organization_id')
            ->where('organizations.id',"=",$invoice->organization_id)
            ->select(
                'organizations.bank_number'
            )
            ->distinct()
            ->get();

        $iban= DB::table('invoices')
            ->join('organizations','organizations.id','=','invoices.organization_id')
            ->where('organizations.id',"=",$invoice->organization_id)
            ->select(
                'organizations.iban'
            )
            ->distinct()
            ->get();

        $shift= DB::table('invoices')
            ->join('organizations','organizations.id','=','invoices.organization_id')
            ->where('organizations.id',"=",$invoice->organization_id)
            ->select(
                'organizations.shift_code'
            )
            ->distinct()
            ->get();
        $logo= DB::table('invoices')
            ->join('organizations','organizations.id','=','invoices.organization_id')
            ->where('organizations.id',"=",$invoice->organization_id)
            ->select(
                'organizations.logo'
            )
            ->distinct()
            ->get();
        $orgCity= DB::table('invoices')
            ->join('organizations','organizations.id','=','invoices.organization_id')
            ->where('organizations.id',"=",$invoice->organization_id)
            ->select(
                'organizations.city'
            )
            ->distinct()
            ->get();
        $orgZip= DB::table('invoices')
            ->join('organizations','organizations.id','=','invoices.organization_id')
            ->where('organizations.id',"=",$invoice->organization_id)
            ->select(
                'organizations.zip_code'
            )
            ->distinct()
            ->get();
        $phone= DB::table('invoices')
            ->join('organizations','organizations.id','=','invoices.organization_id')
            ->where('organizations.id',"=",$invoice->organization_id)
            ->select(
                'organizations.phone_number'
            )
            ->distinct()
            ->get();
        $orgAfa= DB::table('invoices')
            ->join('organizations','organizations.id','=','invoices.organization_id')
            ->where('organizations.id',"=",$invoice->organization_id)
            ->select(
                'organizations.AFA_id'
            )
            ->distinct()
            ->get();
        $orgBankName= DB::table('invoices')
            ->join('organizations','organizations.id','=','invoices.organization_id')
            ->where('organizations.id',"=",$invoice->organization_id)
            ->select(
                'organizations.bank_name'
            )
            ->distinct()
            ->get();

        //user tábla kutatása
        $partnerName= DB::table('invoices')
            ->join('partners','partners.id','=','invoices.partner_id')
            ->where('partners.id',"=",$invoice->partner_id)
            ->select(
                'partners.name'
            )
            ->distinct()
            ->get();
        $partnerAddress= DB::table('invoices')
            ->join('partners','partners.id','=','invoices.partner_id')
            ->where('partners.id',"=",$invoice->partner_id)
            ->select(
                'partners.address'
            )
            ->distinct()
            ->get();
        $partnerZip= DB::table('invoices')
            ->join('partners','partners.id','=','invoices.partner_id')
            ->where('partners.id',"=",$invoice->partner_id)
            ->select(
                'partners.zip_code'
            )
            ->distinct()
            ->get();
        $partnerCity= DB::table('invoices')
            ->join('partners','partners.id','=','invoices.partner_id')
            ->where('partners.id',"=",$invoice->partner_id)
            ->select(
                'partners.city'
            )
            ->distinct()
            ->get();
        $partnerId= DB::table('invoices')
            ->join('partners','partners.id','=','invoices.partner_id')
            ->where('partners.id',"=",$invoice->partner_id)
            ->select(
                'partners.UID'
            )
            ->distinct()
            ->get();
        $partnerBAN= DB::table('invoices')
            ->join('partners','partners.id','=','invoices.partner_id')
            ->where('partners.id',"=",$invoice->partner_id)
            ->select(
                'partners.bank_account_number'
            )
            ->distinct()
            ->get();
        //product táblába turkálás
        $productName= DB::table('invoices')
            ->join('connections','invoice_id','=','invoices.id')
            ->join('products','product_id','=','products.id')
            ->where('connections.invoice_id',"=",$invoice->id)
            ->select(
                'products.name'
            )
            ->distinct()
            ->get();
        $productNetto= DB::table('invoices')
            ->join('connections','invoice_id','=','invoices.id')
            ->join('products','product_id','=','products.id')
            ->where('connections.invoice_id',"=",$invoice->id)
            ->select(
                'products.netto_price'
            )
            ->distinct()
            ->get();
        $productQuantity= DB::table('invoices')
            ->join('connections','invoice_id','=','invoices.id')
            ->join('products','product_id','=','products.id')
            ->where('connections.invoice_id',"=",$invoice->id)
            ->select(
                'products.quantity'
            )
            ->distinct()
            ->get();
        $productTax= DB::table('invoices')
            ->join('connections','invoice_id','=','invoices.id')
            ->join('products','product_id','=','products.id')
            ->join('taxes','tax_id','=','taxes.id')
            ->where('connections.invoice_id',"=",$invoice->id)
            ->select(
                'taxes.tax'
            )
            ->distinct()
            ->get();



        $data = [
            'orgName'=>$name->pluck('name')->first(),
            'orgAFA'=>$orgAfa->pluck('AFA_id')->first(),
            'orgBankName'=>$orgBankName->pluck('bank_name')->first(),
            'email'=>$email->pluck('email_address')->first(),
            'address'=>$orgAddress->pluck('address')->first(),
            'bankAccount'=>$bankAccount->pluck('bank_account')->first(),
            'bankNumber'=>$bankNubmer->pluck('bank_number')->first(),
            'iban'=>$iban->pluck('iban')->first(),
            'shift'=>$shift->pluck('shift_code')->first(),
            'logo'=>$logo->pluck('logo')->first(),
            'orgCity'=>$orgCity->pluck('city')->first(),
            'orgZip'=>$orgZip->pluck('zip_code')->first(),
            'phone'=>$phone->pluck('phone_number')->first(),
            'quantity' => $invoice->quantity,
            'total' => $invoice->total,
            'partnerName' => $partnerName->pluck('name')->first(),
            'partnerAddress' => $partnerAddress->pluck('address')->first(),
            'partnerZip' => $partnerZip->pluck('zip_code')->first(),
            'partnerCity' => $partnerCity->pluck('city')->first(),
            'productFirstName'=> $productName->pluck('name')->first(),
            'productSecondName'=> $productName->pluck('name')->offsetGet(1),
            'productFirstNetto'=> $productNetto->pluck('netto_price')->first(),
            'productSecondNetto'=> $productNetto->pluck('netto_price')->offsetGet(1),
            'productFirstQuantity'=> $productQuantity->pluck('quantity')->first(),
            'productSecondQuantity'=> $productQuantity->pluck('quantity')->offsetGet(1),
            'productFirstTax'=>$productTax->pluck('tax')->first(),
            'productFirstValue'=>number_format((($productNetto->pluck('netto_price')->first())/($productTax->pluck('tax')->first())),2,",",""),
            'productFirstBrutto'=> ($productNetto->pluck('netto_price')->first())*(($productTax->pluck('tax')->first()/100)+1),
            'productSecondBrutto'=> ($productNetto->pluck('netto_price')->first())*(($productTax->pluck('tax')->offsetGet(1)/100)+1),
            'productFisrtDifference'=> ($productNetto->pluck('netto_price')->first())*($productTax->pluck('tax')->first()/100),
            'partnerID'=>$partnerId->pluck('UID')->first(),
            'partnerBAN'=>$partnerBAN->pluck('bank_account_number')->first(),
            'date' => date('d/m/Y'),
            'futureDate' => Carbon::now()->addMonth()->format('d/m/Y')
        ];
        //dd($data);

        $pdf = PDF::loadView('testPDF', $data);

        return $pdf->download('tutsmake.pdf');
    }
    function find(){

    }
}
