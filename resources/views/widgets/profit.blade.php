@if(!empty(config('voyager.chartisan_js')))
    @foreach(config('voyager.chartisan_js') AS $js)
        <script type="text/javascript" src="{{asset($js)}}"></script>
    @endforeach
@endif

<div class="widget center" style="margin-bottom:0;overflow: hidden;background-color: white">

    <div id="chart" style="height: 300px;"></div>
    <div class="panel-content">
        <script>
            const chart = new Chartisan({
                el: '#chart',
                url: "@chart('profitchart')",
                hooks: new ChartisanHooks()
                    .colors(['#E4F913', '#F93C13', '#00FF00'])
                    .beginAtZero()
                    .legend({position: 'bottom'})
                    .datasets([{ type: 'bar', fill: false }, 'bar']),
            });
        </script>
    </div>
</div>
