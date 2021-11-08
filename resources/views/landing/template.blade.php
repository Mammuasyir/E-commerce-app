<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>{{$title ?? 'Home page'}}</title>

    <link rel="stylesheet" href="{{asset('atlantis/assets/css/cssaja.css')}}" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">


    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{asset('landing/fontawesome-free-5.15.4-web/css/all.css')}}">


    <!-- Bootstrap core CSS -->
    <link href="{{asset('landing/css/bootstrap.min.css')}}" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('landing/custom/custom.css')}}">

    <link href="{{asset('landing/custom/carousel.css')}}" rel="stylesheet">

</head>

<style>

    .anchor{
        color: red;
    }
    .anchor:hover{
        color: white;
        font-weight: 600px;
    }
</style>

<body>

@include('landing.include.navbar')

<main>

    @yield('isi')

</main>

@include('landing.include.footer')

<script src="{{asset('landing/js/bootstrap.bundle.min.js')}}"></script>



</body>
</html>
