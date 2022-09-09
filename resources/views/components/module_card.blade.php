@props(['module'])
<section class="
    mt-10 mb-10">
    <div class="grid grid-cols-2 gap-2 bg-gray-300">
        <div class="block m-auto text-center">
            <h2 class="text-5xl text">{{$module->name}}</h2>
            <p class="text-2xl">{{$module->rooms_id}}</p>
            <p class="text-2xl">{{$module->professors_name}}</p>
            <p class="text-2xl">{{$module->courses_name}}</p>
            <p class="text-2xl">{{$module->time}}</p>
        </div>
        <img class="col-start-2 md:w-2000" src="/images/gerken_jan.jpg.jpeg" alt="Hier sollte ein Profilbild sein.">
    </div>
</section>