<strong>@lang('Appeal') #{{ $appeal->id }}</strong>

@if($date = $appeal->info->date)
    📅 {{ $date->format('Y-m-d, H:i') }}, {{ $timezone }}
@endif

@if($address = $appeal->info->address)
    🌍 {{ $address }}
@endif

@if($persons = $appeal->info->persons)
    👨‍👨‍👧‍👧 @lang('Number of persons'): {{ $persons }}
@endif

@if($todo = $appeal->info->todo)
    @lang('Todo:')

    @foreach($todo as $item)
        - {{ $item }}
    @endforeach
@endif

{{ $appeal->info->comment }}

👤 {{ $appeal->curator->name }}
