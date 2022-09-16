<!doctype html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<title>Hochschule Flensburg - Infoscreen</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">

<body style="font-family: Open Sans, sans-serif">
    <div id="app">
        Wow this is the first Page shown
        {{$slot}}
    </div>
</body>
<script src="{{mix('js/app.js')}}">

</script>

</html>