@props(['lesson'])
<section class="
    mt-10 mb-10 ">
    <div class="container">
        <div class="text-area">
            <p class="text-2xl">{{$lesson->module->name}}</h2>
            <p class="text-sm">Raum: {{$lesson->room->name}}</p>
            <p class="text-sm">Professor: {{$lesson->module->user->name}}</p>
            <p class="text-sm">Studiengang: {{$lesson->module->course->name}}</p>
            <p class="text-sm">Datum: {{\Carbon\Carbon::createFromFormat('Y-m-d',$lesson->date)->format('d-m-Y')}}</p>
            <p class="text-sm">Uhrzeit: {{\Carbon\Carbon::createFromFormat('H:i:s',$lesson->time)->format('h:i')}}</p>
        </div>
        <img class="picture" src="/images/{{$lesson->module->user->name}}" alt="{{$lesson->module->user->name}}">
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