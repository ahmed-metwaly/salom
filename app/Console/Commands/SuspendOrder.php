<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use DB;

class SuspendOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SuspendOrder:suspendorder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change Order Status Into Suspended If Its Date Overpass Deadline Date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
//        DB::table('users')->where('id', 31)->delete();

        $newOrders = DB::table('orders')
                        ->join('payments', function ($join) {
                            $join->on('orders.id', '=', 'payments.order_id')
                                ->where('payments.status', '=', 1);
                        })
                        ->join('orders_status', function ($join) {
                            $join->on('payments.id', '=', 'orders_status.payment_id')
                                ->where('orders_status.status', '=', 3);
                        })
                        ->select('orders.id', 'orders.created_at', 'payments.id as payment_id')
                        ->get();

        $deadLine = DB::table('settings')->where('id', 1)->pluck('order_deadline')->first();

        foreach ($newOrders as $order) {

            $orderDeadLine = date('Y-m-d', strtotime($order->created_at. ' + '. $deadLine .' days'));

            if($orderDeadLine < Carbon::today()->toDateString()) {

                DB::table('orders_status')->where('payment_id', $order->payment_id)->update(['status' => 2]);
            }
        }
    }
}
