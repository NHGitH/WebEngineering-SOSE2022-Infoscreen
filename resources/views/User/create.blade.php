<x-layout>
   
<!--@auth--> 
<section class="register-form">
        <form method="POST" action="/register">
            @csrf
            <div class="form-item">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" id="name" value="{{old('name')}}" required>
                @error('name')
                <p>{{$message}}</p>
                @enderror
            </div>

            <div class="form-item">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" id="username" value="{{old('username')}}" required>
                @error('username')
                <p>{{$message}}</p>
                @enderror
            </div>

            <div class="form-item">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" id="password" required>
                @error('password')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="form-item">
                <button type="submit">Submit</button>
            </div>

            @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </form>
    </section>
<!--
    @else
    <a href="/"> Home </a> 
    
    @endauth
-->   
</x-layout>

<style>
    .register-form {
        display: block;
        border-radius: 10px;
        border: 2px solid #DEDEDE;
        margin: 10%;
        padding: 20px;
    }

    .form-item {
        border: 2px solid #DEDEDE;
        border-radius: 10px;
        padding: 10px;
        margin: 20px;
    }

    input {
        border: 2px solid #DEDEDE;
    }

    p {
        color: red;
    }
</style>