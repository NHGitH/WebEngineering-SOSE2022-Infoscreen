<x-layout>
    <section>
        <form method='POST' action='/room'>

            @csrf

<center>
        <h2> Raum erstellen <h2>

        <div>
            <label for='name'> Name </label>

            <input type="text" name="name" id="name" value="{{old('name')}}" required>

            <label for='slug'> Slug </label>

            <input type="text" name="slug" id="name" slug="{{old('slug')}}" required>

            <label for='building_id'> Name </label>

            <input type="text" name="building_id" id="building_id" value="{{old('building_id')}}" required>

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