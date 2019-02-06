<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body class="animsation">

<div class="page-wrapper">
    @include('layout.navbar-mobile')
    @include('layout.menubar')

    <div class="page-container">
        @include('layout.navbar-desktop')
        @yield('main-content')
    </div>

</div>

@include('layout.footer')
@include('layout.footer-scripts')
@yield('main-script')

</body>
</html>
