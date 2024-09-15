<div class="flex flex-col gap-2">
	@isset($paginator)
	<div class="join">
		@foreach($paginator['links'] as $link)
		@php
		$style = $link['active'] ? 'btn-active font-semibold' : 'font-normal';
		@endphp
		<div @if($link['url']) class="tooltip" @endif data-tip="{{ $link['data-tip'] }}">
			<a @if($link['disabled']) disabled @endif @if($link['url']) href='{{ $link['url'] }}' @endif class="join-item btn btn-sm {{ $style }}">
				{{ $link['label'] }}
			</a>
		</div>
		@endforeach
	</div>
	<span class="text-xs mx-auto">
		{{ 'Showing '. $paginator['from']. ' to '.$paginator['to'].' of '.$paginator['total'].' results' }}
	</span>
	@endisset
</div>