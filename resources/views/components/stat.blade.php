<div {{ $attributes->class('w-full flex flex-col gap-1 rounded-md bg-black/5 p-3 shadow-lg') }}>
	@isset($label)
	<span class="ml-1 font-semibold">{{ $label }}</span>
	@endisset
	{{ $slot }}
</div>
