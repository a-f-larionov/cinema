@php
    use Illuminate\Support\Collection;
    use App\Models\Place;

    /** @var $places Collection<Place> */
    /** @var $place Place */

@endphp

<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous">
</script>

<link href="/css/places.css" rel="stylesheet" type="text/css">

<script src="/js/places.js"></script>

@csrf

<input type="hidden" name="event-id" value="{{$eventId}}">


<button class="js-send-reserve-button">Забронировать</button>

<br>

<br>

<input type="text" name="user-name" value="Имя Человека">


@foreach($places as $place)

    @include("place", ['place' => $place, 'offsetX' => 500 ])

@endforeach
