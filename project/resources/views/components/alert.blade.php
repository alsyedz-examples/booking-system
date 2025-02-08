@props([
    'type' => 'info'
])

@switch($type)
    @case('info')
        <div {{ $attributes->merge(['class' => "p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50"]) }} role="alert">
            {{ $slot }}
        </div>
    @break
    @case('danger')
        <div {{ $attributes->merge(['class' => "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50"]) }} role="alert">
            {{ $slot }}
        </div>
    @break
    @case('success')
        <div {{ $attributes->merge(['class' => "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"]) }} role="alert">
            {{ $slot }}
        </div>
    @break
    @case('warning')
        <div {{ $attributes->merge(['class' => "p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50"]) }} role="alert">
            {{ $slot }}
        </div>
    @break
@endswitch
