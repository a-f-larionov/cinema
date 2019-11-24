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
            <a href="{{$show->getDetailPageUrl()}}">
                {{$show->getId()}}
                {{$show->getName()}}
            </a>
        </li>
    @endforeach
</ul>
