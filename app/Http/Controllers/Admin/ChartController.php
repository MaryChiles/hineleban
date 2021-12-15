<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index() {
        // $data = Cart::select(\DB::raw("COUNT(*) as count"))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(\DB::raw("Month(created_at)"))
        // ->pluck('count');

        // dd($records);


        $record = Cart::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name', 'day')
        ->orderBy('day')
        ->get();

        $data = [];
        $ldata = [];
        foreach($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        $highest_selling = Cart::select('product_name', DB::raw('count(*) as total'),'updated_at')
        ->where('cart_status', 'done')
        ->groupBy('updated_at')
        ->get();
        foreach($highest_selling as $r) {
            $ldata['label'][] = date('Y-m-d',strtotime($r->updated_at));
            $ldata['data'][] = (int) $r->total;
        }

        $data['chart_data'] = json_encode($data);
        $data['line_chart_data'] = json_encode($ldata);
        return view('dashboards.admins.chart', $data);

    }
}
