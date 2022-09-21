<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">

            <hr>

            <h1>Administration von: {{auth()->user()->name}}</h1>
            <h1>Einen neuen Datenbankeintrag anlegen:</h1>
            <!-- <x-database-entry/> -->
            <h1>Raumanzeige</h1>

            <p>Raum auswählen:</p>
            <div class="select-room">
            </div>

            

            <div>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </div>
        </main>
    </section>
</x-layout>

<style>
    form>a {
        border: 1px solid #DEDEDE;
        padding: 4px;
        border-radius: 10px;
    }

    form {
        margin-bottom: 10px;
    }

    select,
    input {
        border: 2px solid #DEDEDE;
        padding: 5px;
        border-radius: 10px;
    }
</style>