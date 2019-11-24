@php
    use App\Models\Place;
        /** @var $place Place */
@endphp

<div
    data-place-id="{{$place->getId()}}"

    class="
        js-place
        place
        disable-select
    @if($place->isAvailable())
        place-available
    @else
        place-not-available
    @endif
        "

    style="
        left: {{$place->getX() + $offsetX}};
        top: {{$place->getY()}};
        width: {{$place->getWidth()}};
        height: {{$place->getHeight()}};
        "
>

    {{$place->getId()}}

</div>
