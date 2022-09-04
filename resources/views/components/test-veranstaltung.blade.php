@props(['module'])
<section class="
    mt-10 mb-10">
    <div class="grid grid-cols-2 gap-2 bg-gray-300">
        <div class="block m-auto text-center">
            <h2 class="text-5xl">{{$module->bezeichnung}}</h2>
            <h1 class="text-2xl">{{$module->studiengang}}</h1>
            <p class="text-2xl">{{$module->uhrzeit}}</p>
        </div>
        <img class="col-start-2 md:w-2000" src="/images/gerken_jan.jpg.jpeg">
    </div>
</section>