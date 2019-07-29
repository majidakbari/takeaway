<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Take Away</title>

        <link rel="stylesheet" href="{{ mix('/css/bundle.css') }}">

    </head>
    <body>
        <div id="app">
            <restaurant-list
                :status="{{ json_encode(iterate_array(\App\Entities\Restaurant::getStatuses())) }}"
                :sort-values="{{ json_encode(iterate_array(\App\Entities\Restaurant::getSortingValues())) }}"
            >
            </restaurant-list>
        </div>

        <script type="text/javascript">
            window.__ENV__ = {
                base_url: '{{ env('HTTP_BACKEND_ADDRESS') }}',
                http_timeout: '{{ env('HTTP_TIMEOUT') }}'
            };
        </script>

        <script type="text/javascript" src="{{ mix('/js/bundle.js') }}"></script>
    </body>
</html>
