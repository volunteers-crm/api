<x-layout>
    <div class="container">
        <h1>
            @lang('Log In')
        </h1>

        {!! Socialite::driver('telegram')->getButton() !!}
    </div>
</x-layout>
