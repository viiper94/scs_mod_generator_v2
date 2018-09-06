@if(session()->get('success'))
    <script>
        M.toast({html: '<i class="material-icons notranslate left">done</i>{{ session()->get('success') }}', displayLength: 6000})
    </script>
@endif
@if($errors->any())
    <script>
        M.toast({html: '<i class="material-icons notranslate left">warning</i>{{ $errors->first() }}', displayLength: 6000})
    </script>
@endif