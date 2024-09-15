@props(['icon'])
@php
$href = $attributes['href'];
$active = isset($href) ? ($href == url()->current()) : false;

if($active){
	$attributes = $attributes->merge(['class' => 'text-primary pointer-events-none']);
}
@endphp

<a {{ $attributes->merge(['class' => 'flex gap-3']) }}>
	@isset($icon)
	<i class="ri-{{ $icon }}-line"></i>
	@endisset
	<span>{{ $slot }}</span>
</a>
