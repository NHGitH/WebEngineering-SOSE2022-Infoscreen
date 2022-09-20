<x-layout>
    <section>
        <form method='POST' action='/room/register'>

            @csrf

<center>
        <h2> Raum erstellen <h2>

        <div>
            <label for='name'> Name </label>

            <input type="text" name="name" id="name" value="{{old('name')}}" required>

            <label for='slug'> Slug </label>

            <input type="text" name="slug" id="name" slug="{{old('slug')}}" required>

            <label for='building_id'> Gebäude: </label>

            <select name="building_id" id="building_id">
            @foreach($buildings as $building)
                <option name ="building_id" id="building_id" value="{{$building->id}}">{{$building->name}}</option>
            @endforeach
            </select>

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