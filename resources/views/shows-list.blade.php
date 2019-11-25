@php
    use Illuminate\Support\Collection;
    use \App\Models\Show;

        /** @var $shows Collection<Show> */
        /** @var  $event Show*/
@endphp

Events List:

<ul>
    @foreach($shows as $show)
        <li>
            <a href="{{route('shows-events', $show->getId())}}">

                id: {{$show->getId()}}
                name: {{$show->getName()}}

            </a>
        </li>
    @endforeach
</ul>
