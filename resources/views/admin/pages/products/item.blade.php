@extends('admin.layouts.app')
@section('title') {{ $pageTitle }} @endsection
@section('breadcrumbs')
    @include('admin.elements.breadcrumb', ['route' => route('admin.home'), 'label' => 'Home' ])
    @include('admin.elements.breadcrumb', ['route' => route('admin.products.index'), 'label' => 'Products' ])
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.includes.h1', ['h1' => $pageH1])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if(isset($model))
                        <div class="col-3">
                            @if(isset($comments))
                                @include('admin.elements.commentsColumn', ['comments' => $comments, 'title' => 'Last comments', 'withUser' => true ])
                            @endif
                            @if(isset($favorites))
                                @include('admin.elements.favoritesColumn', ['favorites' => $favorites, 'title' => 'Last favorites', 'withUser' => true ])
                            @endif
                            @if(isset($promocodes))
                                @include('admin.elements.promocodesColumn', ['promocodes' => $promocodes, 'title' => 'Promocodes' ])
                            @endif
                        </div>
                    @endif
                    <div class="col-9">
                        <div class="card card-secondary">
                            <div class="card-body">
                                <form action="{{ $route['action'] }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method($route['method'])
                                    @include('admin.elements.select',
                                        [
                                           'model' => $model,
                                           'add_model' => $statuses ,
                                           'property' => 'status_id',
                                           'label' => 'Status'
                                        ])
                                    @include('admin.elements.inputText',
                                        [
                                           'model' => $model,
                                           'property' => 'title',
                                           'label' => 'Title'
                                        ])
                                    @include('admin.elements.textarea',
                                        [
                                           'model' => $model,
                                           'property' => 'description',
                                           'label' => 'Description'
                                        ])
                                    @include('admin.elements.textarea',
                                        [
                                           'model' => $model,
                                           'property' => 'requirements',
                                           'label' => 'Requirements'
                                        ])
                                    @include('admin.elements.inputText',
                                        [
                                          'model' => $model,
                                          'property' => 'discount',
                                          'label' => 'Discount'
                                        ])
                                    @include('admin.elements.image',
                                        [
                                           'model' => $model,
                                           'property' => 'preview',
                                           'label' => 'Preview'
                                        ])
                                    @include('admin.elements.select',
                                        [
                                           'model' => $model,
                                           'add_model' => $categories,
                                           'property' => 'category_id',
                                           'label' => 'Category'
                                        ])
                                    @include('admin.elements.select',
                                        [
                                          'model' => $model,
                                          'add_model' => $versions,
                                          'property' => 'version_id',
                                          'label' => 'Version'
                                        ])
                                    @include('admin.elements.selectMultiple',
                                        [
                                           'model' => $model,
                                           'add_model' => $tags,
                                           'property' => 'tags',
                                           'label' => 'Tags'
                                        ])
                                    @include('admin.elements.imageMultiple',
                                        [
                                           'model' => $model,
                                           'property' => 'images',
                                           'label' => 'images'
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
