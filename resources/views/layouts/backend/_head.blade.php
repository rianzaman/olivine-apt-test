<head>
    <title>{{ isset($title)?$title->content:env('APP_NAME') }}</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{ isset($metakey)?$metakey->content:'Web, site, application, website, web app, web application' }}">
    <meta name="description" content="{{ isset($metadescription)?$metadescription->content:'Rian H. Zaman is a highly experienced Web application developer. Contact: rian.zaman@gmail.com' }}">
    <meta name="author" content="{{ isset($metaauthor)?$metaauthor->content:'Z' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ isset($favicon)?asset($favicon->content):asset('default_resource/favicon.jpg') }}" type="image/x-icon"/>

    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@clientsitename">
    <meta property="twitter:creator" content="@rianzaman">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Client site name">
    <meta property="og:title" content="Site title to show when sharing">
    <meta property="og:url" content="http://www.example.com/">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Rian H. Zaman is a highly experienced Web application developer. Contact: rian.zaman@gmail.com">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend/main.css') }}">
    <!-- Fontawesome css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend/fontawesome/all.min.css') }}">
    <!-- Icofont css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend/icofont/icofont.min.css') }}">
    <!-- Toastr css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend/toastr/toastr.min.css') }}">
    @stack('css')
    @stack('customCss')
</head>