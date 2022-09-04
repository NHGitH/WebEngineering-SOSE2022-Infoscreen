<x-layout>
    <section class="border-2 border-grey
    mt-10 mb-10">

        <x-test-html />
        <p>{{$modules->bezeichnung}}</p>
        <div class="lg:grid grid-cols-3">
            <div>
                <x-test-veranstaltung :module="$modules"/>
            </div>
        </div>

    </section>

</x-layout>