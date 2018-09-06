@if(session()->get('success'))
    <script>
        M.toast({html: '<i class="material-icons notranslate left">done</i>@lang('general.success')', displayLength: 6000})
    </script>
@endif
@if($errors->any())
    <script>
        M.toast({html: '<i class="material-icons notranslate left">warning</i>@lang('general.something_wrong')', displayLength: 6000})
    </script>
@endif