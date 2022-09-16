<!doctype html>

<title>Hochschule Flensburg - Infoscreen</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="//unpkg.com/alpinejs" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <div id="app">
            <app>tess{{$slot}}</app>
        </div>
    </section>
</body>
<script src="{{mix('js/app.js')}}">
    
</script>