<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Order;
use App\BudgetItem;
use App\Item;
use App\Service;
use App\User;
use DB;
use PDF;
use Auth;

use Carbon\Carbon;
use App\Notifications\NewBudget;
class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $budget=Budget::with('item')->where('id',$id)->get();
        $order_id=Budget::where('id',$id)->get('order_id');
        $order=$order_id[0]['order_id'];
        $budget_item=DB::table('budget_item')
                ->join('budgets','budgets.id','=','budget_item.budget_id')
                ->join('items','items.id','=','budget_item.item_id')
                ->where('budgets.id','LIKE',$id)
                ->select('*')
                ->get();
        return view('system/order/view-budget')
                ->with('budgets',$budget)
                ->with('order',$order)
                ->with('budget_item',$budget_item);
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
        $budget=new Budget();
        $order=new Order();

        $budget=Budget::find($id)->delete();
        return redirect()->route('order.index')->with('success-info','Información actualizada');

    }
    public function printPDF($id)
    {
        $budget=new Budget();
        $budget_current=Budget::with('item')->where('id',$id)->get();
        
        $order_current=Budget::where('id',$id)->first('order_id');
        $order_id=$order_current->order_id;
        $order=Order::where('id',$order_id)->with('user')->get();
        $currentDate= Carbon::now();

        $order_service=Order::with('services')->get();
        foreach ($order_service as $value) {
            $services=$value->services;
        }
        
        foreach ($budget_current as $budget) {
            //budget
            $budget_id=$budget->id;
            $detalles=$budget->details;
            $subtotal=$budget->subtotal;
            $iva=$budget->iva;
            $total=$budget->total; 
            
            //return $budget_current;
            $num=count($budget->item);

            $product=$budget;
            for ($i=0; $i < $num; $i++) {
                $item_id="";
                $name="";
                $price="";
                $quantity="";
                
                $item_id=$budget->item[$i]->id;
                $name=$budget->item[$i]->name;
                $price=$budget->item[$i]->price;
                $quantity=$budget->item[$i]->selected->quantity;
            
                $data = [
                    'id'=>$item_id,
                    'name'=>$name,
                    'price'=>$price,
                    'quantity'=>$quantity,
                ];
            }
            foreach ($order as $orders) {
                //order
                $id_order=$orders->id;
                $details=$orders->add_details;
                $type=$orders->type;
                $user_name=$orders->user->user_name;
                $user_lastname=$orders->user->lastname;
                $user_company=$orders->user->company;
                $date=$currentDate->format('d-m-y');
                $oficio=123432;
                
            }
        }
        
       $pdf = PDF::loadView('pdf_view',['product'=>$product,'services'=>$services],compact(
            'details',
            'subtotal',
            'id',
            'iva',
            'total',
            'budget_id',
            'type',
            'user_name',
            'user_lastname',
            'user_company',
            'date',
            'oficio'))->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->download('cotización-CONTRATMX.pdf');
    }
}
