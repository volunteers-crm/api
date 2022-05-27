<x-layout>
    <div class="container">
        <h1>
            @lang('Log In')
        </h1>

        <script
            async
            src="https://telegram.org/js/telegram-widget.js?19"
            data-telegram-login="{{ config('telegram.bots.default.username') }}"
            data-size="large"
            data-auth-url="{{ route('auth.telegram.store') }}"
            data-request-access="write"></script>
    </div>
</x-layout>
