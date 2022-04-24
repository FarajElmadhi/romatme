<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('assets') }}/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('assets') }}/front/css/all.min.css">
            <link rel="stylesheet" href="{{ url('assets') }}/front/css/autocomplete.css">

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 


    <link rel="stylesheet" href="{{ url('assets') }}/front/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />

    <meta property="og:title" content="{{$title}}" />
    <meta property="og:site_name" content="{{$title}}" />
    <meta property="og:description"
        content="{{$description}}" />
    <meta name="description"
        content="{{$description}}">
    <meta name="keywords"
        content="{{$keyword}}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="{{ url('assets') }}/front/images/oglogo.png" />
    <meta property="og:image:secure_url" content="{{ url('assets') }}/front/images/oglogo.png" />
    <meta property="og:image:width" content="726" />
    <meta property="og:image:height" content="484" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="RomAtMe.com">
    <link href="{{ url('assets') }}/front/images/favicon.png" rel="icon" type="image/png">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7GE4JSS7S1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-7GE4JSS7S1');
</script>
</head>
<body>
