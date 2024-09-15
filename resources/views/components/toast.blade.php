<div class="toast toast-end items-end">
	@foreach($toasts as $toast)
	@php
	$style = $toast->style;
	if(empty($style)){
		switch($toast->type){
			case 'success':
			$style = 'bg-success text-success-content';
			break;
			case 'error':
			$style = 'bg-error text-error-content';
			break;
			case 'info':
			$style = 'bg-info text-info-content';
			break;
			case 'warning':
			$style = 'bg-warning text-warning-content';
			break;
		}
	}
	@endphp
	<div x-data="{ 
		collapse: false,
		toggle(){
			this.collapse = !this.collapse;
			if(!this.collapse){
				if(this.timer){
					clearTimeout(this.timer);
				}
				this.collapseAction();
			}
		},
		timer: null,
		collapseAction(){
			this.timer = setTimeout(() => this.collapse = true, 5000);
		}}" 
		@click="toggle()" :class="{'alert p-4 gap-2': !collapse, 'p-2 rounded-full': collapse}" class="transition-all flex alert p-4 gap-2 w-fit {{ $style }}">
		@if($toast->type == 'info')
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="pointer-events-none h-6 w-6 shrink-0 stroke-current">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
		</svg>
		@elseif($toast->type == 'success')
		<svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
		</svg>
		@elseif($toast->type == 'warning')
		<svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
		</svg>
		@elseif($toast->type == 'error')
		<svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
		</svg>
		@endif
		<span x-init="collapseAction()" x-show="!collapse" id="toast-message" class="pointer-events-none max-w-52 w-max text-xs text-wrap text-left">
			{{ $toast->message }}
		</span>
	</div>
	@endforeach
</div>