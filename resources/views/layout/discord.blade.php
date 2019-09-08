<section class="trailer-generator card-panel grey-text">
    <span class="card-title">
        <i class="material-icons left notranslate">info</i>
        @lang('general.join_discord')
        <a href="{{ env('DISCORD_INVITE') }}"
           target="_blank"
           class="grey-text text-darken-1" style="text-decoration: underline; white-space: nowrap;">{{ env('DISCORD_INVITE') }}</a>
    </span>
    <i class="material-icons tiny notranslate card-close" data-cookie="discord">close</i>
</section>
