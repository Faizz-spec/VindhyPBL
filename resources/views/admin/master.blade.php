<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.head')
<body>
    @include('admin.layouts.sidebar')
    <div class="wrapper">
    @include('admin.layouts.header')
    <main>
        @yield('content')
    </main>
    @include('admin.layouts.footer')
    </div>
    @include('admin.layouts.footer_script')
</body>
</html>