<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-3xl mx-auto mt-10 lg:mt-10 space-y-6">
            <div class="wrap">
                <div>
                    @if ($buildings->count())
                    <form class="container-form-grid form-grid-gap-event" method="GET" action"#">
                        <select name="building">
                            <option value="" disabled selected>Gebäude</option>
                            @foreach($buildings as $building)
                            <option value="{{$building->name}}">{{$building->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="search" placeholder="Raum auswählen">
                    </form>
                    @foreach($buildings as $building)
                    <details>
                        <summary>{{$building->name}}</summary>
                        @foreach($building->rooms as $room)
                        <a href="/buildings/{{$building->name}}/{{$room->name}}">{{$room->name}}</a>
                        @endforeach
                    </details>
                    @endforeach
                    @else
                    <p class="text-center">Es sind noch keine Gebäude erstellt worden.</p>
                    @endif
                </div>
            </div>
        </main>
    </section>
</x-layout>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    summary {
        outline: none;
        padding: 1rem;
        display: block;
        background: #1a2a36;
        color: #fff;
        padding-left: 1rem;
        position: relative;
        cursor: pointer;
        margin-bottom: 20px;
        font-weight: bold;
    }

    summary:focus {
        border-color: black;
    }

    details {
        max-width: auto;
        box-sizing: border-box;
        margin-top: 0px;
        background-color: #DEDEDE;
    }

    details summary::-webkit-details-marker {
        display: none;
    }

    details[open]>summary:before {
        transform: rotate(90deg);
    }

    summary:before {
        content: '';
        border-width: .4rem;
        border-style: solid;
        border-color: transparent transparent transparent #fff;
        position: absolute;
        top: 1.3rem;
        right: 2rem;
        /*left: 1rem;*/
        transform: rotate(0);
        transform-origin: .2rem 50%;
        transition: 0.2s transform ease 0s;
    }

</style>