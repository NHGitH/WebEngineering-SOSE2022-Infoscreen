@props(['user','buildings'])
<h1> Administration von {{$user->name}}</h1>

<hr>

<h1>Einen neuen Datenbankeintrag anlegen:</h1>
<!-- <x-database-entry/> -->
<h1>Raumanzeige</h1>
<p>Gebäude auswählen:</p>

<select>
    @foreach ($buildings as $building)
    <option value="{{$building->name}}">{{$building->name}}</option>
    @endforeach
</select>

<x-choose-room :buildings=$buildings/>

<style>
    input{
        border: 2px solid #D9D9D9;
        border-radius: 5px;
        padding: 2px;
    }

    .form-container{
        margin-bottom: 10px;
    }

    form{
        display:grid;
        grid-template-columns: 100%;
        padding: 5px;
    }

    button{
        border:2px solid #D9D9D9;
        border-radius: 10px;
        padding: 5px;
        margin-top: 5px;
        margin-bottom: 5px;
    }

    button:hover{
        background-color: #D4FCC3;
    }
</style>