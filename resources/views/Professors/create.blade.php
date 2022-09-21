<x-layout>
    <section>
        <form method='POST' action='/profs'>

            @csrf

<center>
        <h2> Raum erstellen <h2>

        <div>
            <label for='name'> Name </label>

            <input type="text" name="name" id="name" value="{{old('name')}}" required>

            <label for='picture'> Bild </label>

            <input type="file" name="file" id="file" >

            <hr> 
            <button type="submit"> Professor anlegen </button> 
            
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