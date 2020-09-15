@extends('system.inventory.layout')
@section('container-inventory')
<head>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<div class="container-items">
    <header class="text-center text-uppercase">
        <label for="" class="font-weight-bold">productos registrados</label>
        <div class="categories" id="categories">
            <a href="" class="active">TODOS</a>
            @foreach($categories as $category)
                <a href="" class="text-uppercase">{{$category->name}}</a>
            @endforeach
        </div>
    </header>
    <section class="grid" id="grid">
        @foreach($items as $item)
        <div class="item shadow h-auto bg-orange" data-html="true" id="item"
                data-category="{{$item->category->name}}" 
                data-tags="{{$item->details}} {{$item->name}}"
                data-description="
                                <strong>Concepto: </strong>{{$item->name}}<br>  
                                <strong>Descripción:</strong> {{$item->details}}<br>
                                <strong>Precio: </strong>${{$item->price}}<br>
                                <strong>Unidad:</strong> {{$item->unit}}">
            <div class="item-container p-1">
                <img src="{{asset('storage/'.$item->item_image)}}" alt="">
                <p class="text-center my-0 pt-1 font-weight-bold">{{$item->name}}</p>
            </div>
        </div>
        @endforeach
    </section>
    <section class="overlay" id="overlay">
        <div class="bg-whiteDark">
            <div class="container-img">
                <button type="button" class="close" aria-label="Close" id="btn-close-popup">
                <span aria-hidden="true">&times;</span>
                </button>
                <img src="" alt="" style="width: 18rem;">
            </div>
            <p class="description"></p>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/muuri@0.9.0/dist/muuri.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/web-animations-js@2.3.2/web-animations.min.js"></script>
<script src="{{ asset('js/main_category.js') }}"></script>
@stop
