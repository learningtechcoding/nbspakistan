@component('mail::message')
    # Congratulations! Your application is accpeted at State Youth Parliament

    @component('mail::button', ['url' => ''])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
