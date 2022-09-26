@props(['module'])
<section class="
    mt-10 mb-10 ">
    <div class="container">
        <div class="text-area">
            <p class="text-2xl">{{$module->name}}</h2>
            <p class="text-sm">Raum: {{$module->room->name}}</p>
            <p class="text-sm">Professor: {{$module->user->name}}</p>
            <p class="text-sm">Studiengang: {{$module->course->name}}</p>
        </div>
        <img class="picture" src="/images/{{$module->user->name}}" alt="{{$module->user->name}}">
    </div>
</section>

<style>
    .container {
        background-color: rgb(243 244 246);
        display: grid;
        grid-template-columns: 40% 60%;
        border: 1px solid #F0F0F0;
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