<?php

namespace App\Http\Controllers;
use App\Models\Rider;
use Illuminate\Http\Request;
use App\Charts\RiderChart;
use Illuminate\Support\Facades\DB;

class RiderChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $input=DB::select(DB::raw('SELECT District_Id,count(*) as totalRiders
        FROM rider
        GROUP BY District_Id'));
        // $riders=array();
        // $districts=array();
        // foreach($input as $i) {
        //     array_push($districts,$i->District_Id);
        //     array_push($riders,$i->totalRiders);
        // }
        $usersChart = new RiderChart;
        $usersChart->labels([1,4,5,5]);
        $usersChart->dataset('Riders', 'line',[1,3,4,2])
                   ->color("rgb(255, 99, 132)")
            // ->backgroundcolor("rgb(255, 99, 132)")
            ;







        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"];
        $input=DB::select(DB::raw('SELECT districts.name,count(*) as totalRiders  FROM rider,districts where rider.District_Id=districts.code
        
        GROUP BY districts.name'));
        $riders=array();
        $districts=array();
        foreach($input as $i) {
            array_push($districts,$i->name);
            array_push($riders,$i->totalRiders);
        }
        $usersChart1 = new RiderChart;
        $usersChart1->minimalist(true);
        $usersChart1->labels($districts);
        $usersChart1 ->displayAxes(true,false);
        $usersChart1->displayLegend(true);
        // $usersChart1->barWidth(1000);
        $usersChart1->title("riders per district",25,'blue');
        $usersChart1->dataset('Users by trimester', 'bar',$riders)
                    ->color($borderColors)
                    ->backgroundcolor($fillColors)
                    -> fill(false)
                    ->lineTension(10);





        $usersChart2 = new RiderChart;
        $usersChart2->minimalist(true);
        $usersChart2->labels(['Jan', 'Feb', 'Mar']);
        $usersChart2->dataset('Users by trimester', 'doughnut', [10, 25, 13])
            ->color($borderColors)
            ->backgroundcolor($fillColors);

            $usersChart3 = new RiderChart;
            $usersChart3->labels(['Jan', 'Feb', 'Mar']);
            $usersChart3 ->displayAxes(false,false);
            $usersChart3->dataset('Users by trimester', 'pie', [10, 25, 13])
                ->color($borderColors)
                ->backgroundcolor($fillColors);

        return view('charts.index', [ 'usersChart' => $usersChart,'usersChart1' => $usersChart1,'usersChart2' => $usersChart2,'usersChart3' => $usersChart3 ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
