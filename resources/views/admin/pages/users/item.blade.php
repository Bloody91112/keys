@extends('admin.layouts.app')
@section('title') {{ $pageTitle }} @endsection
@section('breadcrumbs')
    @include('admin.elements.breadcrumb', ['route' => route('admin.home'), 'label' => 'Home' ])
    @include('admin.elements.breadcrumb', ['route' => route('admin.users.index'), 'label' => 'Users' ])
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
                                @include('admin.elements.commentsColumn', ['comments' => $comments, 'title' => 'Last comments' ])
                            @endif
                        </div>
                    @endif
                    <div class="col-6">
                        <div class="card card-secondary">
                            <div class="card-body">
                                <form action="{{ $route['action'] }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method($route['method'])
                                    @include('admin.elements.inputText',
                                        [
                                           'model' => $model,
                                           'property' => 'name',
                                           'label' => 'Name'
                                        ])
                                    @if(!isset($model))
                                        @include('admin.elements.password',
                                            [
                                               'model' => $model,
                                               'property' => 'password',
                                               'label' => 'Password'
                                            ])
                                    @endif
                                    @include('admin.elements.dateInput',
                                         [
                                           'model' => $model,
                                           'property' => 'birthday',
                                           'label' => 'Birthday'
                                        ])
                                    @include('admin.elements.select',
                                        [
                                           'model' => $model,
                                           'add_model' => $roles ,
                                           'property' => 'role_id',
                                           'label' => 'Role'
                                        ])
                                    @include('admin.elements.image',
                                        [
                                           'model' => $model,
                                           'property' => 'avatar',
                                           'label' => 'Avatar'
                                        ])
                                    @include('admin.elements.inputText',
                                        [
                                           'model' => $model,
                                           'property' => 'email',
                                           'label' => 'Email',
                                        ])
                                    @include('admin.elements.select',
                                        [
                                           'model' => $model,
                                           'property' => 'gender',
                                           'label' => 'Gender',
                                           'add_model' => [ [ 'id' => 0,  'title' => 'male' ], [ 'id' => 1,  'title' => 'female' ] ]
                                        ])
                                    @include('admin.elements.submit', [ 'text' => $model ? 'Update' : 'Create' ])
                                </form>
                            </div>
                        </div>
                    </div>
                    @if(isset($model))
                        <div class="col-3">
                            @if(isset($favorites))
                                @include('admin.elements.favoritesColumn', ['favorites' => $favorites, 'title' => 'Last favorites' ])
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
