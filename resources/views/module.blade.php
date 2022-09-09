<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <p>Die Veranstaltung: "{{$module->name}}", findet im Raum "{{$module->rooms_id}}" um "{{$module->time}}" statt.
                Der zuständige Professor ist "{{$module->professors_name}}" und gehört zum Studiengang "{{$module->courses_name}}"
            </p>
        </main>
    </section>
</x-layout>