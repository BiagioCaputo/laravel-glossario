{{--Layout--}}
@extends('layouts.app')

{{--Titolo--}}
@section('title', 'Edit_Word')

{{--Contenuto principale pagina--}}
@section('content')

<header>
    <h1 class="text-center my-5">Modifica una parola del Glossario</h1>
</header>


    {{--Form per la modifica di un progetto--}}
    <div class="container py-5">
        @include('includes.words.form')      
    </div>


@endsection


{{--Scripts--}}
@section('scripts')
    @vite('resources/js/slug_field.js')

    <script>
        //Funzione per eliminare i link direttamente dal form della word(semplicemente si cancellano i campi
        // e si nasconde la row, cosi al salvataggio il link verrà cancellato poichè i campi sono vuoti)
        function deleteLink(event, index) {
            event.preventDefault();
            if (confirm('Sei sicuro di voler eliminare questo link?')) {

                // Svuota i campi del form relativi al link da eliminare
                document.querySelector(`input[name="links[${index}][label]"]`).value = '';
                document.querySelector(`input[name="links[${index}][url]"]`).value = '';
    
                // Nascondi visivamente il form dell'elemento eliminato 
                document.querySelector(`input[name="links[${index}][label]"]`).closest('.row').style.display = 'none';
            }
        }
    </script>

@endsection