<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device.width, initial-scale=1">
    <title>We Fashion</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon/clothing.ico') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/navigation.css')}}" rel="stylesheet">
    <link href="{{asset('css/footer.css')}}" rel="stylesheet">
    <link href="{{asset('css/articles.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin.index.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin.form.css')}}" rel="stylesheet">
    <link href="{{asset('css/details.css')}}" rel="stylesheet">
    <link href="{{asset('css/commons.css')}}" rel="stylesheet">
</head>

<body>
    <div>
        @include('partials.menu')
    </div>
    <div>
        <div>
            @yield('content')
        </div>
    </div>
    @include('partials.footer')
    @section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    @show
</body>

</html>