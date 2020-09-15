<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use App\Order;
use App\Service;
use App\OrderService;
use App\Budget;
use App\BudgetItem;
use DB;
use App\Product;
use App\Notifications\NewBudget;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::id();
        $orders=Order::with('user')->get();
        $order_user=Order::with('user')->where('user_id',$user)->get();
        return view('system/order/index')->with('orders',$orders)->with('order_user',$order_user);
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
        $user=Auth::id();
        $order=new Order();
        $order_service=new OrderService();

        $type=$request->input('type');
        switch ($type) {
            case 4:
                $order->type=$request->input('other');
                break;
            case 1:
            case 2:
            case 3:
                $order->type=$request->input('type');
                break;
            default:
                
                break;
        }
        
        $order->user_id=$user;
        if($request->input('details')==true)
        {
            $order->add_details=$request->input('details');
        }else{
            $order->add_details='-';
        }
    
        $order->status=0;
        $order->save();
        

        $current_order_id=$order->id;

        if($request->input('services_01')==true){
            $order_service=new OrderService();
            $order_service->service_id=$request->input('services_01');
            $order_service->order_id=$current_order_id;
            $order_service->save();
        }
        if($request->input('services_02')==true){
            $order_service1=new OrderService();
            $order_service1->service_id=$request->input('services_02');
            $order_service1->order_id=$current_order_id;
            $order_service1->save();
        }
        if($request->input('services_03')==true){
            $order_service2=new OrderService();
            $order_service2->service_id=$request->input('services_03');
            $order_service2->order_id=$current_order_id;
            $order_service2->save();
        }
        if($request->input('services_04')==true){
            $order_service3=new OrderService();
            $order_service3->service_id=$request->input('services_04');
            $order_service3->order_id=$current_order_id;
            $order_service3->save();
        }
        if($request->input('services_05')==true){
            $order_service4=new OrderService();
            $order_service4->service_id=$request->input('services_05');
            $order_service4->order_id=$current_order_id;
            $order_service4->save();
        }
        if($request->input('services_06')==true){
            $order_service5=new OrderService();
            $order_service5->service_id=$request->input('services_06');
            $order_service5->order_id=$current_order_id;
            $order_service5->save();
        }
        if($request->input('services_07')==true){
            $order_service6=new OrderService();
            $order_service6->service_id=$request->input('services_07');
            $order_service6->order_id=$current_order_id;
            $order_service6->save();
        }
        if($request->input('services_08')==true){
            $order_service7=new OrderService();
            $order_service7->service_id=$request->input('services_08');
            $order_service7->order_id=$current_order_id;
            $order_service7->save();
        }
        if($request->input('services_09')==true){
            $order_service8=new OrderService();
            $order_service8->service_id=$request->input('services_09');
            $order_service8->order_id=$current_order_id;
            $order_service8->save();
        }
        if($request->input('services_10')==true){
            $order_service9=new OrderService();
            $order_service9->service_id=$request->input('services_10');
            $order_service9->order_id=$current_order_id;
            $order_service9->save();
        }
        if($request->input('services_11')==true){
            $order_service10=new OrderService();
            $order_service10->service_id=$request->input('services_11');
            $order_service10->order_id=$current_order_id;
            $order_service10->save();
        }
        if($request->input('services_12')==true){
            $order_service11=new OrderService();
            $order_service11->service_id=$request->input('services_12');
            $order_service11->order_id=$current_order_id;
            $order_service11->save();
        }
        if($request->input('services_13')==true){
            $order_service12=new OrderService();
            $order_service12->service_id=$request->input('services_13');
            $order_service12->order_id=$current_order_id;
            $order_service12->save();
        }
        
        return redirect()->route('order.index')->with('success','Nuevo Trabajo');
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
        try {
            $order=Order::find($id)->delete();
            return redirect()->route('order.index')->with('success','Orden Eliminada');
        } catch (\Throwable $th) {
            return redirect()->route('order.index')->with('error','Accion Denegada');
        }
        

        
    }
    function select_order($id){
        $user=Auth::id();
        $budget=Budget::where('order_id',$id)->get();
        $order_service=DB::table('order_service')
                ->join('services','services.id','=','order_service.service_id')
                ->join('orders','orders.id','=','order_service.order_id')
                ->where('orders.id','LIKE',$id)
                ->select('services.*')
                ->get();
        

        $order_user=DB::table('users')
                ->join('orders','orders.user_id','=','users.id')
                ->where('orders.id','LIKE',$id)
                ->select('users.*','orders.*')
                ->get();

        $user_quantity=DB::table('orders')
                    ->join('users','users.id','=','orders.user_id')
                    ->where('user_id','LIKE',$user)
                    ->count();

        return view('system/order/info')
            ->with('order_service',$order_service)
            ->with('order_user',$order_user)
            ->with('user_quantity',$user_quantity)
            ->with('budgets',$budget);
    }
    function accept_order($id){
        $order=Order::find($id);
        $order->status=1;
        $order->save();

        return redirect()->route('order.index')->with('success','Orden En Proceso');
    }
    function complete_order($id){
        $order=Order::find($id);
        $order->status=2;
        $order->save();

        return redirect()->route('order.index')->with('success','Orden Completada');
    }
    function budget_order($id){
        //$orders=Order::find($id)->with('users')->get();
        $orders=DB::table('users')
                ->join('orders','orders.user_id','=','users.id')
                ->where('orders.id','LIKE',$id)
                ->select('users.*','orders.*')
                ->get();
        $order_service=DB::table('order_service')
                ->join('services','services.id','=','order_service.service_id')
                ->join('orders','orders.id','=','order_service.order_id')
                ->where('orders.id','LIKE',$id)
                ->select('services.*')
                ->get();
                
        $order_id=Order::where('id',$id)->get('id');
        $order=$order_id[0]['id'];

        return view('system/order/budget')->with('orders',$orders)->with('order_service',$order_service)->with('order',$order);
        
    }
    function budget_create(Request $request,$id){
        $budget=new Budget();
        
        $budget->order_id=$id;
        $budget->subtotal=$request->input('subtotal');
        $budget->details=$request->input('extra-details');
        $budget->iva=$request->input('iva');
        $budget->total=$request->input('total');
        $budget->save();
        

        $item=$request->item;
        $price=$request->price;
        $quantity=$request->quantity;

        $num=count($item);

        for ($i=0; $i < $num; $i++) { 
            $budget_item=new BudgetItem();
            $budget_item->budget_id=$budget->id;
            $budget_item->item_id=$item[$i];
            $budget_item->quantity=$quantity[$i];
            $budget_item->save();
        }

        $user=Auth::id();
        $costumer=Order::where('id',$id)->with('user')->first();
        $costumer_id=$costumer->user->id;

        $fromUser = User::find($user);
        $toUser = User::find($costumer_id);
        $toUser->notify(new NewBudget($fromUser));
        
        return redirect()->back()->with('success','Cotización lista');

    }
}
