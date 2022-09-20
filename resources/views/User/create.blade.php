<x-layout>
    <section>
        <form method="POST" action="/register">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name" id="name" required>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" id="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" id="password" required>
            <button type="submit">Submit</button>
        </form>
    </section>
</x-layout>

<style>
    form>* {
        display: block;
    }
</style>