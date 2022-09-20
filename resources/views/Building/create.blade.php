<x-layout>
    <section>
        <form method='POST' action='/building'>

            @csrf

<center>
        <h2> Gebäude erstellen <h2>

        <div>
            <label for='name'> Name </label>

            <input type="text" name="name" id="name" value="{{old('name')}}" required>

            <hr> 
            <button type="submit"> Raum anlegen </button> 

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