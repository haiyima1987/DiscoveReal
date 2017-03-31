<!doctype html>
<html lang="en">
<head>
    <title>DiscoveReal</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    {{--For toastr to work--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    {!! Html::style('font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('css/style.css') !!}
    @yield('head')
</head>
<body>

<div class="bg container-fluid row">
    <div class="col-sm-3 col-md-2 leftCol">
        @include('layout.sidebar')
    </div>
    <div class="col-sm-3 col-md-2 spacer">
    </div>
    <div class="col-sm-9 col-md-10 rightCol">
        @yield('banner')
        @yield('content')
    </div>
</div>

{!! Html::script('js/main.js') !!}

@if(Session::has('toasterMsg'))
    <script>
        let type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('toasterMsg') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('toasterMsg') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('toasterMsg') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('toasterMsg') }}");
                break;
        }
    </script>
@endif

@yield('scripts')

</body>
</html>