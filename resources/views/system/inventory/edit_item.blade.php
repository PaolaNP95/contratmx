
@extends('system.inventory.layout')
@section('container-inventory')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-primary" href="{{route('inventory.index')}}">Index</a></li>
    </ol>
</nav>
<div class="form-group pl-3 pr-3">
    <div class="container w-50 border justify-content-center shadow pt-3">
    <p class="text-center font-weight-bold">ACTUALIZAR PRODUCTO</p>
        <div class="row text-uppercase">
            <div class="col">
                <form class="needs-validation" role="form" action="{{action('InventoryController@update',$id)}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nombre" name="name" required onkeyup="mayus(this);"  value="{{$item->name}}">
                    </div>
                    <div class="form-group">
                        <select class="custom-select" id="category_id" name="category_id" required  >
                            <option value="{{$item->category_id}}">{{$item->category->name}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="$ Precio" name="price" required value="{{$item->price}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Unidad de medida" name="unit" required onkeyup="mayus(this);"  value="{{$item->unit}}">
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file"  class="form-control" name="item_image">
                            <div>{{$errors->first('image')}}</div>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="5" class="form-control" name="details" required onkeyup="mayus(this);">{{$item->details}}</textarea>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="form-group">
                        <button type="submit" class="btn bg-orange w-100">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop