@props(['user'])
<h1> Administration von {{$user->name}}</h1>

<hr>

<h1>Einen neuen Datenbankeintrag anlegen:</h1>
<!-- <x-database-entry/> -->
<h1>Raumanzeige auswählen:</h1>
<x-choose-room/>

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
        border:2px solid #D9D9D9;
        border-radius: 10px;
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