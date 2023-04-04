@extends('admin.layouts.app')
@section('title') {{ $pageTitle }} @endsection
@section('breadcrumbs')
    @include('admin.elements.breadcrumb', ['route' => route('admin.home'), 'label' => 'Home' ])
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.includes.h1', ['h1' => $pageH1])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @include('admin.elements.table',
                            ['attributes' => $tableAttributes, 'models' => $models, 'route' => $route])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
