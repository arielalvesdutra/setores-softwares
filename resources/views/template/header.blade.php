<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageTitle', 'Praticando Larave - Setor e Software')</title>
    <link rel="stylesheet" href="/css/styles.css" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js" > </script>
</head>
<body>
<div class="header">
    <span class="logo">
        <a href="/" title="Página inicial">
            <i class="fab fa-php fa-3x"></i>
        </a>
    </span>
    @include('template.nav')
</div>