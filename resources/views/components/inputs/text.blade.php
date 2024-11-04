@props(['type' => 'text', 'name' => '', 'placeholder' => '', 'icon' => '', 'value' => ''])
<div class="relative flex flex-col items-center gap-1">
    <div {{ $icon->attributes->merge(['class' => 'absolute left-2.5 top-1/2  -translate-x-1 -translate-y-1/2 ']) }}>
        {!! $icon !!}
    </div>

    <input {{ $attributes->merge(['class' => 'w-full py-2 pl-10 pr-2']) }} type="{{ $type }}"
        name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}"
        aria-label="{{ $name }}" />
</div>
