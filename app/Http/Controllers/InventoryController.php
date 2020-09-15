<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Departure;
use App\Entry;
use App\Stock;
use App\Item;
use Auth;
use DB;
use Validator;
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::paginate(10);
        $items=Item::all();
        $stocks=Stock::with('item')->orderBy('created_at', 'desc')->paginate(10);
        $entries=Entry::orderBy('created_at', 'asc')->paginate(10);
        $departures=Departure::with('item')->with('user')->orderBy('created_at', 'desc')->paginate(10);
        $actives=Departure::with('item')
                        ->select('item_id', DB::raw('count(*) as total'))
                        ->groupBy('item_id')
                        ->orderBy('total','desc')
                        ->limit(5)
                        ->get();
        $inactives=Item::whereNotExists(function ($query) {
                            $query->select(DB::raw(1))
                                ->from('departures')
                                ->whereRaw('departures.item_id = items.id');
                        })
                        ->get();
        $supply_needed=Stock::with('item')->where('quantity','<',5)->orderBy('created_at', 'asc')->limit(5)->get();
        return view('system.inventory.stock.index')
                ->with('categories',$categories)
                ->with('items',$items)
                ->with('stocks',$stocks)
                ->with('actives',$actives)
                ->with('departures',$departures)
                ->with('inactives',$inactives)
                ->with('entries',$entries)
                ->with('supply_needed',$supply_needed);
    }
    public function data(){
        $item_registered=Item::with('stock')->with('category')->get();
        return view('system.inventory.layout')->with('item_registered',$item_registered);
    }
    public function catalogue_index()
    {
        $items=Item::with('category')->get();
        $stocks=Stock::with('item')->get();
        $categories=Category::all();

        return view('system.inventory.catalogue.index')
                ->with('stocks',$stocks)
                ->with('items',$items)
                ->with('categories',$categories);
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
        $stock=new Stock(); 
        $entries=new Entry();
        $user_id = Auth::id();
        $item_id=$request->input('new_item_id');

        $stock_data=Stock::where('item_id',$item_id)->first();

    
        if ($stock_data!=null) {
            //update
            try {
                $current_quantity=$stock_data->quantity;
                $quantity=$request->input('quantity');
                $new_quantity=$current_quantity+$quantity;
                $stock_data->quantity=$new_quantity;
                $stock_data->save();

                $entries->item_id=$item_id;
                $entries->user_id=$user_id;
                $entries->quantity=$request->input('quantity');
                $entries->save();

                return redirect()->back()->with('success','Nuevos Productos Disponibles');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error','Acción denegada');
            }

        } else {
            //insert
            try {
                $stock->item_id=$item_id;
                $stock->quantity=$request->input('quantity');
                $stock->save();

                $entries->item_id=$item_id;
                $entries->user_id=$user_id;
                $entries->quantity=$request->input('quantity');
                $entries->save();
                return redirect()->back()->with('success','Nuevos Productos Disponibles');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error','Acción denegada');
            }
        } 

    }
    public function delete_item_from_intenvory($id){       
        try {
            $id_inventory = Stock::findOrFail($id)->delete();
            return redirect()->back()->with('success','Producto eliminado');
        }catch (\Throwable $th) {
            return redirect()->back()->with('error','Acción denegada');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $item_id=$request->input('search_item');
        $item=Item::where('id','=',$item_id)
                ->with('stock')
                ->take(10)
                ->get();
        $stocks=Stock::with('item')->get();
        return view('system/inventory/single_item')
                ->with('item',$item)
                ->with('stocks',$stocks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Item::find($id);
        $categories=Category::all();
        return view('system/inventory/edit_item',compact('item','id','categories'));
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
        $item = Item::find($id);

        try {
            $item->name=$request->input('name');
            $item->price=$request->input('price');
            $item->unit=$request->input('unit');
            $item->details=$request->input('details');
            $item->category_id=$request->input('category_id');

            if ($request->hasFile('item_image')) {
                $item->item_image=request()->item_image->store('uploads','public');
            }
            $item->save();

            return redirect()->back()->with('success','Producto Actualizado');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Acción denegada');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_item($id)
    {
        try {
            $item=Item::findOrFail($id)->delete();
            $categories=Category::paginate(10);
            $items=Item::all();
            $stocks=Stock::with('item')->orderBy('created_at', 'desc')->paginate(10);
            $entries=Entry::orderBy('created_at', 'asc')->paginate(10);
            $departures=Departure::with('item')->with('user')->orderBy('created_at', 'desc')->paginate(10);
            $actives=Departure::with('item')
                            ->select('item_id', DB::raw('count(*) as total'))
                            ->groupBy('item_id')
                            ->orderBy('total','desc')
                            ->limit(5)
                            ->get();
            $inactives=Item::whereNotExists(function ($query) {
                                $query->select(DB::raw(1))
                                    ->from('departures')
                                    ->whereRaw('departures.item_id = items.id');
                            })
                            ->get();
            $supply_needed=Stock::with('item')->where('quantity','<',5)->orderBy('created_at', 'asc')->limit(5)->get();
            return view('system.inventory.stock.index')
                    ->with('success','Producto eliminado')
                    ->with('categories',$categories)
                    ->with('items',$items)
                    ->with('stocks',$stocks)
                    ->with('actives',$actives)
                    ->with('departures',$departures)
                    ->with('inactives',$inactives)
                    ->with('entries',$entries)
                    ->with('supply_needed',$supply_needed)
                    ->with('success','Producto Eliminado');
        }catch (\Throwable $th) {
            return redirect()->back()->with('error','Acción denegada');
        }
    }
    ////// CATEGORY SECTION \\\\\\

    public function new_category(Request $request){
        $category = new Category();
        $new_category=$request->input('category_name');
        $category_registered=Category::where('name','LIKE',$new_category)->get();

       
        try {
           if (count($category_registered)==0) {
                    $category->name=$request->input('category_name');
                    $category->save();
                    return redirect()->back()->with('success','Categoría creada');
            } else {
                return redirect()->back()->with('error','Categoria ya existente');
            } 
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Categoria ya existente');
        }
    }

    public function delete_category($id){

        $items=Item::where('category_id','LIKE',$id)->get();
        
        if (count($items)==0) {
            try {
                $id_category = Category::find($id)->delete();
                return redirect()->back()->with('success','Categoría eliminada');
            }catch (\Throwable $th) {
                return redirect()->back()->with('error','Acción denegada');
            }
            
        } else {
            return redirect()->back()->with('error','Acción denegada, Categoria relacionada con productos.');
        }
        
    }
    public function update_category(Request $request,$id){
        
        $category = Category::find($id)->first();
            $new_name=$request->input('name_category');
            
            $category_registered=Category::where('name','LIKE',$new_name)->first();

           
        try {
            if ($category_registered===null) {
                $category->name=$request->input('name_category');
                $category->save();
                return redirect()->back()->with('success','Categoría Actualizada');
            } else {
                return redirect()->back()->with('error','Ya existe esa categoría');
            }
            
        }catch (\Throwable $th) {
            return redirect()->back()->with('error','Acción denegada');
        } 
        
    }

    ////// ITEM SECTION \\\\\\

    public function new_item(Request $request){
        $item = new Item();

        try {
            $item->name=$request->input('name');
            $item->price=$request->input('price');
            $item->unit=$request->input('unit');
            $item->details=$request->input('details');
            $item->category_id=$request->input('category_id');

            if ($request->hasFile('item_image')) {
                $item->item_image=request()->item_image->store('uploads','public');
                $this->validate($request, [
                    'item_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:51200|dimensions:max_width=361,max_height=361',
                ]);
            }
            else{
                $item->item_image="uploads/item_image.png";
            }
            $item->save();

        
            return redirect()->back()->with('success','Producto agregado!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Acción Denegada');
        }
    }
    ////// DEPARTURE SECTION \\\\\\

    public function new_departure(Request $request){
        $departure = new Departure();
        $user_id = Auth::id();
        
        $item_id=$request->input('item_id');
        $stock_data=Stock::where('item_id',$item_id)->first();

        $current_quantity=$stock_data->quantity;
        $quantity=$request->input('quantity');
        $new_quantity=$current_quantity-$quantity;


        try {
            $departure->item_id=$request->input('item_id');
            $departure->user_id=$user_id;
            $departure->quantity=$request->input('quantity');
            $departure->reason=$request->input('reason');
            $departure->save();

            $stock_data->quantity=$new_quantity;
            $stock_data->save();
            return redirect()->back()->with('success','Productos Fuera del Inventario!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Acción denegada');
        }
    }
}
