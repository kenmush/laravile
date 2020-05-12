<!doctype html>
<html lang="{{$bootstrapData->get('language')}}">
    <head>
        <title class="dst">{{ $settings->get('branding.site_name') }}</title>

        <base href="{{ $htmlBaseUri }}">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> --}}
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="client/favicon/icon-144x144.png">
        <link rel="apple-touch-icon" href="client/favicon/icon-192x192.png">
        <link rel="manifest" href="client/manifest.json">
        <meta name="theme-color" content="{{$bootstrapData->getSelectedTheme('colors.--be-accent-default')}}">

        <style id="be-css-variables">
            :root {!! $bootstrapData->getSelectedTheme()->getColorsForCss() !!}
        </style>

        @yield('angular-styles')

        @if (file_exists($customCssPath))
            @if ($content = file_get_contents($customCssPath))
                <style>{!! $content !!}</style>
            @endif
        @endif

        @yield('head-end')
	</head>

    <body class="{{$bootstrapData->getSelectedTheme('name') === 'dark' ? 'be-dark-mode' : 'be-light-mode'}}">
        <app-root>
            @yield('before-loaded-content')
        </app-root>

        <script>
            window.bootstrapData = "{!! $bootstrapData->getEncoded() !!}";
        </script>

        @yield('angular-scripts')

        @if (file_exists($customHtmlPath))
            @if ($content = file_get_contents($customHtmlPath))
                {!! $content !!}
            @endif
        @endif



        <noscript>You need to have javascript enabled in order to use <strong>{{config('app.name')}}</strong>.</noscript>

        @yield('body-end')
	</body>
</html>
