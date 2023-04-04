<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.includes.navbar')
    @include('admin.includes.sidebar')
    @yield('content')
    @include('admin.includes.footer')
</div>
@include('admin.includes.scripts')
</body>
</html>
