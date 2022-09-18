<!doctype html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<title>Hochschule Flensburg - Infoscreen</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body style="font-family: Open Sans, sans-serif">
    <div class="f" id="app">
        {{$slot}}
    </div>
</body>
</html>
<script src="{{mix('js/app.js')}}">

</script>
<style>
    .f{
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
    }

    body{
        margin: 0;
        padding: 0;
        width: 100%;
    }
</style>