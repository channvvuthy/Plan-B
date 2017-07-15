<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use PDF;

class ManagerController extends Controller
{
    public function getIndex(Request $request){
        session(['start'=>$request->start]);
        session(['end'=>$request->end]);
        if(!empty($request->start) && !empty($request->end)){
            $start=$request->start;
            $arrayStart=explode("-",$start);
            $end  =$request->end;
            $arrayEnd=explode("-",$end);
            $yearStart=$arrayStart[0];
            $monthStart=$arrayStart[2];
            $yearEnd=$arrayEnd[0];
            $monthEnd=$arrayEnd[2];
            $orders = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('member_id')->whereRaw('MONTH(created_at) >= ?',[$monthStart])->whereRaw('YEAR(created_at) = ?',[$yearStart])->whereRaw('MONTH(created_at) <= ?',[$monthEnd])->whereRaw('YEAR(created_at) = ?',[$yearEnd])->orderBy('Total','desc')->get();
            $first = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('group_name')->whereRaw('MONTH(created_at) = ?',[$monthStart])->whereRaw('YEAR(created_at) = ?',[$yearStart])->whereRaw('MONTH(created_at) <= ?',[$monthEnd])->whereRaw('YEAR(created_at) = ?',[$yearEnd])->orderBy('Total','desc')->get();
            $bases=DB::table('bases')->selectRaw('*,count(id) as Total')->groupBy('user_id')->whereRaw('MONTH(created_at) = ?',[$monthStart])->whereRaw('YEAR(created_at) = ?',[$yearStart])->whereRaw('MONTH(created_at) <= ?',[$monthEnd])->whereRaw('YEAR(created_at) = ?',[$yearEnd])->orderBy('Total','DESC')->get();
            return view('manager.index')->with('orders',$orders)->with('first',$first)->with('bases',$bases);



        }elseif(!empty($request->start) && empty($request->end)){
            $start=$request->start;
            $arrayStart=explode("-",$start);
            $yearStart=$arrayStart[0];
            $monthStart=$arrayStart[2];
            $orders = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('member_id')->whereRaw('MONTH(created_at) >= ?',[$monthStart])->whereRaw('YEAR(created_at) = ?',[$yearStart])->orderBy('Total','desc')->get();
            $first = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('group_name')->whereRaw('MONTH(created_at) = ?',[$monthStart])->whereRaw('YEAR(created_at) = ?',[$yearStart])->orderBy('Total','desc')->get();
            $bases=DB::table('bases')->selectRaw('*,count(id) as Total')->groupBy('user_id')->whereRaw('MONTH(created_at) = ?',[$monthStart])->whereRaw('YEAR(created_at) = ?',[$yearStart])->orderBy('Total','DESC')->get();
            return view('manager.index')->with('orders',$orders)->with('first',$first)->with('bases',$bases);

        }elseif(empty($request->start) && !empty($request->end)){
            $end  =$request->end;
            $arrayEnd=explode("-",$end);
            $yearEnd=$arrayEnd[0];
            $monthEnd=$arrayEnd[2];
            $orders = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('member_id')->whereRaw('MONTH(created_at) <= ?',[$monthEnd])->whereRaw('YEAR(created_at) = ?',[$yearEnd])->orderBy('Total','desc')->get();
            $first = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('group_name')->whereRaw('MONTH(created_at) <= ?',[$monthEnd])->whereRaw('YEAR(created_at) = ?',[$yearEnd])->orderBy('Total','desc')->get();
            $bases=DB::table('bases')->selectRaw('*,count(id) as Total')->groupBy('user_id')->whereRaw('MONTH(created_at) <= ?',[$monthEnd])->whereRaw('YEAR(created_at) = ?',[$yearEnd])->orderBy('Total','DESC')->get();
            return view('manager.index')->with('orders',$orders)->with('first',$first)->with('bases',$bases);

        }

    	$currentMonth = date('m');
    	$currentYear=date('Y');
		$orders = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('member_id')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->whereRaw('YEAR(created_at) = ?',[$currentYear])->orderBy('Total','desc')->get();

		$first = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('group_name')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->whereRaw('YEAR(created_at) = ?',[$currentYear])->orderBy('Total','desc')->get();
		$bases=DB::table('bases')->selectRaw('*,count(id) as Total')->groupBy('user_id')->whereRaw('MONth(created_at)=?',[$currentMonth])->orderBy('Total','DESC')->get();

    	return view('manager.index')->with('orders',$orders)->with('first',$first)->with('bases',$bases);
    }

    public function getReport(Request $request){
        if(!empty(session()->get('start')) && !empty(session()->get('end'))){
            $start=session()->get('start');
            $arrayStart=explode("-",$start);
            $end  =session()->get('end');
            $arrayEnd=explode("-",$end);
            $yearStart=$arrayStart[0];
            $monthStart=$arrayStart[2];
            $yearEnd=$arrayEnd[0];
            $monthEnd=$arrayEnd[2];
            $orders = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('member_id')->whereRaw('MONTH(created_at) >= ?',[$monthStart])->whereRaw('YEAR(created_at) = ?',[$yearStart])->whereRaw('MONTH(created_at) <= ?',[$monthEnd])->whereRaw('YEAR(created_at) = ?',[$yearEnd])->orderBy('Total','desc')->get();
            $first = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('group_name')->whereRaw('MONTH(created_at) = ?',[$monthStart])->whereRaw('YEAR(created_at) = ?',[$yearStart])->whereRaw('MONTH(created_at) <= ?',[$monthEnd])->whereRaw('YEAR(created_at) = ?',[$yearEnd])->orderBy('Total','desc')->get();
            $bases=DB::table('bases')->selectRaw('*,count(id) as Total')->groupBy('user_id')->whereRaw('MONTH(created_at) = ?',[$monthStart])->whereRaw('YEAR(created_at) = ?',[$yearStart])->whereRaw('MONTH(created_at) <= ?',[$monthEnd])->whereRaw('YEAR(created_at) = ?',[$yearEnd])->orderBy('Total','DESC')->get();
            $pdf = PDF::loadView('manager.report',['orders'=>$orders,'first'=>$first,'bases'=>$bases]);
            return $pdf->download('report.pdf',['bases'=>$bases,'first'=>$first,'orders'=>$orders]);


        }elseif(!empty(session()->get('start')) && empty(session()->get('end'))){
            $start=session()->get('start');
            $arrayStart=explode("-",$start);
            $yearStart=$arrayStart[0];
            $monthStart=$arrayStart[2];
            $orders = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('member_id')->whereRaw('MONTH(created_at) >= ?',[$monthStart])->whereRaw('YEAR(created_at) = ?',[$yearStart])->orderBy('Total','desc')->get();
            $first = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('group_name')->whereRaw('MONTH(created_at) = ?',[$monthStart])->whereRaw('YEAR(created_at) = ?',[$yearStart])->orderBy('Total','desc')->get();
            $bases=DB::table('bases')->selectRaw('*,count(id) as Total')->groupBy('user_id')->whereRaw('MONTH(created_at) = ?',[$monthStart])->whereRaw('YEAR(created_at) = ?',[$yearStart])->orderBy('Total','DESC')->get();
            $pdf = PDF::loadView('manager.report',['orders'=>$orders,'first'=>$first,'bases'=>$bases]);
            return $pdf->download('report.pdf',['bases'=>$bases,'first'=>$first,'orders'=>$orders]);
        }elseif(empty(session()->get('start')) && !empty(session()->get('end'))){
            $end  =session()->get('end');
            $arrayEnd=explode("-",$end);
            $yearEnd=$arrayEnd[0];
            $monthEnd=$arrayEnd[2];
            $orders = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('member_id')->whereRaw('MONTH(created_at) <= ?',[$monthEnd])->whereRaw('YEAR(created_at) = ?',[$yearEnd])->orderBy('Total','desc')->get();
            $first = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('group_name')->whereRaw('MONTH(created_at) <= ?',[$monthEnd])->whereRaw('YEAR(created_at) = ?',[$yearEnd])->orderBy('Total','desc')->get();
            $bases=DB::table('bases')->selectRaw('*,count(id) as Total')->groupBy('user_id')->whereRaw('MONTH(created_at) <= ?',[$monthEnd])->whereRaw('YEAR(created_at) = ?',[$yearEnd])->orderBy('Total','DESC')->get();
            $pdf = PDF::loadView('manager.report',['orders'=>$orders,'first'=>$first,'bases'=>$bases]);
            return $pdf->download('report.pdf',['bases'=>$bases,'first'=>$first,'orders'=>$orders]);
        }

        $currentMonth = date('m');
    	$currentYear=date('Y');
		$orders = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('member_id')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->whereRaw('YEAR(created_at) = ?',[$currentYear])->orderBy('Total','desc')->get();

		$first = DB::table('orders')->selectRaw('*, count(order_id) as Total')->groupBy('group_name')->whereRaw('MONTH(created_at) = ?',[$currentMonth])->whereRaw('YEAR(created_at) = ?',[$currentYear])->orderBy('Total','desc')->get();
		$bases=DB::table('bases')->selectRaw('*,count(id) as Total')->groupBy('user_id')->whereRaw('MONth(created_at)=?',[$currentMonth])->orderBy('Total','DESC')->get();
  		$pdf = PDF::loadView('manager.report',['orders'=>$orders,'first'=>$first,'bases'=>$bases]);
  		return $pdf->download('report.pdf',['bases'=>$bases,'first'=>$first,'orders'=>$orders]);

    }
}
