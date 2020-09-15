
@extends('layouts.app-system')
@section('container')
<style>
.header-layout{
    padding:10px;
}
.header-layout .links {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}
.header-layout .links a {
    color: #ABB2B9;
    margin: 0px 20px;
    font-size: 15px;
    font-weight: 500;
}
.header-layout .links a.active {
    color: white;
}
</style>
<header class="header-layout bg-blue">
    <div class="links">
        <a class="{{!Route::is('inventory.index')?: 'active'}} " href="{{route('inventory.index')}}">Stock</a>
        <a class="{{!Route::is('catalogue.index')?: 'active'}} " href="{{route('catalogue.index')}}">Catálogo</a>
        <div class="" style="width: 500px">
            <form class="needs-validation"  action="/search_item" method="get">
                @csrf
                <select class="js-example-basic-single w-100" name="search_item" onchange="this.form.submit();">
                    <option selected disabled value="">Buscar Producto...</option>
                    @foreach($item_registered as $item)
                        <option value="{{$item->id}}">Folio:{{$item->id}}, Nombre:{{$item->name}}, Categoría:{{$item->category->name}},
                            @if($item->stock->isEmpty())
                                Producto No Disponible
                            @else
                                @foreach($item->stock as $quantity)
                                Cantidad: {{$quantity->quantity}}
                                @endforeach
                            @endif
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
</header>
<div class="pl-3 pr-3 ">
    @yield('container-inventory')
</div>
@stop