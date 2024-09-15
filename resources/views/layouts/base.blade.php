@props(['title'])
<!DOCTYPE html>
<html x-data="settingData()" :data-theme="theme" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title ?? env('APP_NAME', 'Laravel') }}</title>
	@vite(['resources/css/app.css' ,'resources/js/app.js'])
</head>

<body>
	<script>
		const currentTheme = sessionStorage.getItem('theme') ?? 'dark';
		document.documentElement.setAttribute('data-theme', currentTheme);

		function settingData(){
			return {
				theme: currentTheme,
				setTheme(theme){
					this.theme = theme;
					sessionStorage.setItem('theme', theme);
				}
			};
		}

		function alertData(){
			return {
				alert: null,
				showAlert(alert){
					this.alert = alert;
				}
			};
		}
	</script>
	<div class="drawer" x-data="alertData()">
		<input id="drawer" type="checkbox" class="drawer-toggle" />
		<div class="drawer-content flex flex-col">
			{{-- Navbar --}}
			<x-navbar>
				@isset($menuNavbar)
				<x-slot:menu-navbar>
					{{ $menuNavbar }}
				</x-slot:menu-navbar>
				@endisset
			</x-navbar>
			<div class="min-h-screen bg-base-200">
				{{-- Main Content here --}}
				{{ $slot }}
			</div>
			{{-- Footer --}}
			@isset($footer)
			<x-footer class="bg-base-300 text-base-content">
				{{ $footer }}
			</x-footer>
			@endisset
			{{-- Alert Dialog --}}
			<template x-if="alert">
				<x-alert x-data="{ data: alert }" />
			</template>
			{{-- Toast --}}
			@if(session()->has('toasts') || session()->has('toast'))
			<x-toast />
			@endif
		</div>
		{{-- Drawer Side --}}
		<x-drawer-side for="drawer">
			@isset($menuDrawerSide)
			<x-slot:menu-drawer-side>
				{{ $menuDrawerSide }}
			</x-slot:menu-drawer-side>
			@endisset
		</x-drawer-side>
	</div>
</body>

</html>
