<!doctype html>
<html lang="en" dir="rtl">
<head>
    @include('admin.layouts.head')
</head>
<body style="font-family: 'Cairo', sans-serif;">
<div class="wrapper">
    @include('admin.layouts.loader')
    @include('admin.layouts.header')
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.Sidebar')
            <div class="content-wrapper">
                @yield('page-title')
                @yield('contact')

                @include('admin.layouts.footer')
            </div>
        </div>

    </div>
</div>
@include('admin.layouts.footerjs')
</body>
</html>
