@php
    use Illuminate\Support\Collection;
    use App\Models\Event;

    /** @var $events Collection<Event> */
    /** @var $event Event */

@endphp

<ul>
    @foreach($events as $event)

        <li>
            <a href="{{route('events-places', $event->getId())}}">

                id: {{$event->getId()}}
                date: {{$event->getHumanDate()}}

            </a>
        </li>

    @endforeach

</ul>
