@extends('admin.layouts.app')
@section('title') Home @endsection
@section('breadcrumbs')@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.includes.h1', ['h1' => 'index'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @include('admin.elements.previewCard',
                            [
                             'bg' => 'bg-info',
                             'quantity' => \App\Models\Product::all()->count(),
                             'title' => 'Products',
                             'icon' => 'ion ion-bag',
                             'link' => route('admin.products.index')
                            ])
                    @include('admin.elements.previewCard',
                            [
                             'bg' => 'bg-success',
                             'quantity' => \App\Models\Promocode::all()->count(),
                             'title' => 'Promocodes',
                             'icon' => 'ion ion-stats-bars',
                             'link' => route('admin.promocodes.index')
                            ])
                    @include('admin.elements.previewCard',
                            [
                             'bg' => 'bg-warning',
                             'quantity' => \App\Models\Comment::all()->count(),
                             'title' => 'Comments',
                             'icon' => 'ion ion-person-add',
                             'link' => route('admin.comments.index')
                            ])
                    @include('admin.elements.previewCard',
                            [
                             'bg' => 'bg-danger',
                             'quantity' => \App\Models\Payment::all()->count(),
                             'title' => 'Payments',
                             'icon' => 'ion ion-pie-graph',
                             'link' => route('admin.payments.index')
                            ])
                </div>
            </div>
        </div>
    </div>
@endsection

