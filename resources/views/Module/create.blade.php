<x-layout>
    <section>
        <form method='POST' action='/modules'>

            @csrf

<center>
        <h2> Modul erstellen <h2>

        <div>
            <label for='name'> Name </label>

            <input type="text" name="name" id="name" value="{{old('name')}}" required>

            <label for='room_id'> Raum </label>

            <input type="text" name="room_id" id="room_id"/>

            <label for='professors_id'> Professor </label>

            <input type="text" name="prof_id"/>

            <label for='courses_id'> Kurs </label>

            <input type="text" name="courses_id"/>



            <hr> 
            <button type="submit"> Modul anlegen </button> 
            
        </div>

        @if($errors->any())
        <hr>    
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </form>

</center>
</form>
</section>

</x-layout>

<style> 


    label{
        display:block;
        padding: 5px;
    }

</style>