@props(['module'])
<section class="
    mt-10 mb-10 ">
    <div class="container">
        <div class="text-area">
            <h2 class="">{{$module->name}}</h2>
            <p class="">Raum: {{$module->rooms_id}}</p>
            <p class="">Professor: {{$module->professors_name}}</p>
            <p class="">Studiengang: {{$module->courses_name}}</p>
            <p class="">Veranstaltungszeit: {{$module->time}}</p>
        </div>
        <img class="picture" src="/images/pexels-cottonbro-6334771.jpg" alt="Hier sollte ein Profilbild sein.">
    </div>
</section>

<style>
    .container {
        background-color: rgb(243 244 246);
        display: grid;
        grid-template-columns: 50% 50%;
        border: 1px solid #F0F0F0;
        border-radius: 20px;
    }

    .text-area{
        padding: 20px;
    }

    .picture {
        grid-column-start: 2;
        width: 100%;
        object-fit: fill;
        height: auto;
        margin: auto;
    }

    p {
        font-size: 1vw;
    }

    img {
        object-fit: cover;
    }
</style>