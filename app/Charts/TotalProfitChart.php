<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Voyager\PDFController;
use Illuminate\Support\Facades\DB;

class TotalProfitChart extends BaseChart
{

    public ?string $name = 'profitchart';

    public ?string $routeName = 'profitchart';

    public ?string $prefix = 'chartjs';

   // public ?array $middlewares = ['auth'];

    public function handler(Request $request): Chartisan
    {
        $closedList = DB::table('invoices')->where('status', "=", "CLOSED")->get();
        $closedCount = $closedList->count();
        $arcihvedList = DB::table('invoices')->where('status', "=", "ARCHIVED")->get();
        $archivedCount = $arcihvedList->count();
        $openList = DB::table('invoices')->where('status', "=", "OPEN")->get();
        $openCount = $openList->count();
        return Chartisan::build()
            ->labels([__('generic.invoices_type')])
            ->dataset(__('generic.archived'), [$archivedCount])
            ->dataset(__('generic.closed'), [$closedCount])
            ->dataset(__('generic.opened'), [$openCount]);
        // TODO: Rakd be a fordításokat angolra is!
    }
}
