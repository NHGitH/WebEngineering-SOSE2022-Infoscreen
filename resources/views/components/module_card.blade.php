@props(['module'])
<section class="
    mt-10 mb-10 ">
    <div class="container">
        <div class="text-area">
            <p class="text-2xl">{{$module->name}}</h2>
            <p class="text-sm">Raum: {{$module->room->name}}</p>
            <p class="text-sm">Professor: {{$module->professor->name}}</p>
            <p class="text-sm">Studiengang: {{$module->course->name}}</p>
            <p class="text-sm">Veranstaltungszeit: {{$module->time}}</p>
        </div>
        <img class="picture" src="/images/pexels-cottonbro-6334771.jpg" alt="Hier sollte ein Profilbild sein.">
    </div>
</section>

<style>
    .container {
        background-color: rgb(243 244 246);
        display: grid;
        grid-template-columns: 40% 60%;
        border: 1px solid #F0F0F0;
        border-radius: 20px;
        width: 100%;
    }

    .text-area{
        padding: 20px;
        width: 100%;
    }

    .picture {
        width: 100%;
        justify-self: end;
        align-self: center;
        grid-column-start: 2;
        object-fit: fit;
        height: 90%;
        width: 50%;
        border-radius: 10px;
        margin-right: 5%;
    }

    p {
        font-size: 1vw;
    }

    img {
        object-fit: cover;
    }
</style>