@extends('admin.layouts.app')
@section('title') {{ $pageTitle }} @endsection
@section('breadcrumbs')
    @include('admin.elements.breadcrumb', ['route' => route('admin.home'), 'label' => 'Home' ])
    @include('admin.elements.breadcrumb', ['route' => route('admin.promocodes.index'), 'label' => 'Promocodes' ])
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.includes.h1', ['h1' => $pageH1])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        @if(isset($products))
                            @include('admin.elements.productsColumn', ['products' => $products, 'title' => 'Product'])
                        @endif
                    </div>
                    <div class="col-9">
                        <div class="card card-secondary">
                            <div class="card-body">
                                <form action="{{ $route['action'] }}" method="post">
                                    @csrf
                                    @method($route['method'])
                                    @include('admin.elements.select',
                                       [
                                          'model' => $model,
                                          'add_model' => $statuses,
                                          'property' => 'status_id',
                                          'label' => 'Status'
                                       ])
                                    @include('admin.elements.inputText',
                                        [
                                           'model' => $model,
                                           'property' => 'price',
                                           'label' => 'Price'
                                        ])
                                    @include('admin.elements.inputText',
                                        [
                                           'model' => $model,
                                           'property' => 'value',
                                           'label' => 'Value'
                                        ])
                                    @include('admin.elements.select',
                                        [
                                           'model' => $model,
                                           'add_model' => $products,
                                           'property' => 'product_id',
                                           'label' => 'Product'
                                        ])
                                    @include('admin.elements.submit', [ 'text' => $model ? 'Update' : 'Create' ])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
