<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class TotalProfitChart extends BaseChart
{

    public ?string $name = 'profitchart';

    public ?string $routeName = 'profitchart';

    public ?string $prefix = 'chartjs';

   // public ?array $middlewares = ['auth'];

    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['January', 'February', 'March', 'April'])
            ->dataset('Profit', [1, 4, 2, 6])
            ->dataset('Profit 2', [3, 2, 5, 4])
            ->dataset('Profit 3', [6, 5, 4, 3]);
    }
}
