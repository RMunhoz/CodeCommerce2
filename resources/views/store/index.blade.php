@extends('layouts.store')

@section('categories')
    @include('store.partials._categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>

            @include('store.partials._products', ['products'=> $pFeatured])

        </div><!--features_items-->

        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

            @include('store.partials._products', ['products'=> $pRecommend])

        </div><!--recommended-->
    </div>
@endsection
