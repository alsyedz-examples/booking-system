@props([
    'active' => false,
    'type' => 'a'
])

@switch($type)
    @case('button')
        <button {{ $attributes->merge(['class' => "block py-2 px-3 rounded hover:border-blue-800 hover:text-blue-800"]) }} aria-current="{{$active ? 'page' : 'false'}}">
            {{ $slot }}
        </button>
    @break
    @case('submit')
        <button {{ $attributes->merge(['class' => "block py-2 px-3 rounded hover:border-blue-800 hover:text-blue-800"]) }} aria-current="{{$active ? 'page' : 'false'}}" type="submit">
            {{ $slot }}
        </button>
    @break
    @default
        <a {{ $attributes->merge(['class' => "block py-2 px-3 rounded hover:border-blue-800 hover:text-blue-800 "  . ($active ? 'text-blue-600' : '')]) }} aria-current="{{$active ? 'page' : 'false'}}">
            {{ $slot }}
        </a>
    @break
@endswitch
