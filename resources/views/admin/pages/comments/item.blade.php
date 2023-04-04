@extends('admin.layouts.app')
@section('title') {{ $pageTitle }} @endsection
@section('breadcrumbs')
    @include('admin.elements.breadcrumb', ['route' => route('admin.home'), 'label' => 'Home' ])
    @include('admin.elements.breadcrumb', ['route' => route('admin.comments.index'), 'label' => 'Comments' ])
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.includes.h1', ['h1' => $pageH1])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
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
                                    @include('admin.elements.textarea',
                                        [
                                           'model' => $model,
                                           'property' => 'message',
                                           'label' => 'Message',
                                           'simple' => true
                                        ])
                                    @include('admin.elements.select',
                                        [
                                           'model' => $model,
                                           'add_model' => $products,
                                           'property' => 'product_id',
                                           'label' => 'Product'
                                        ])
                                    @include('admin.elements.select',
                                        [
                                           'model' => $model,
                                           'add_model' => $users,
                                           'property' => 'user_id',
                                           'label' => 'User'
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
