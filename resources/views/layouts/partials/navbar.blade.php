<div class="navbar lg:px-6 bg-base-300 w-full min-h-14 max-h-14">
	<div class="flex-none lg:hidden">
		<label for="drawer" aria-label="open sidebar" class="btn btn-circle btn-ghost">
			{{-- menu icon --}}
			<i class="ri-menu-line text-xl font-normal"></i>
		</label>
	</div>
	<div class="ml-6">
		<x-logo></x-logo>
	</div>
	<div class="mx-2 flex-1 px-2">{{ env('APP_NAME', 'Laravel') }}</div>
	<div class="hidden flex-none lg:block">
		<ul class="menu menu-horizontal gap-2">
			@isset($menuNavbar)
			{{ $menuNavbar }}
			@endisset
			@if(!Auth::check())
			<li>
				<x-link href="{{ route('login') }}" class="gap-2 bg-success text-success-content hover:bg-success/70" icon="login-circle">Login</x-link>
			</li>
			@endif
		</ul>
	</div>
	<div class="justify-end mx-2">
		<div class="tooltip tooltip-left lg:tooltip-bottom font-normal text-xl flex items-center" data-tip="Switch Theme">
			<label class="swap swap-rotate btn btn-circle btn-ghost">
				{{-- this hidden checkbox controls the state --}}
				<input :checked="theme == 'light'" type="checkbox" @change="$event.target.checked ? setTheme('light') : setTheme('dark') " />
				{{-- sun icon --}}
				<i class="swap-on ri-sun-line text-xl font-normal"></i>
				{{-- moon icon --}}
				<i class="swap-off ri-moon-line text-xl font-normal"></i>
			</label>
		</div>
	</div>
	{{-- Account Menu --}}
	@auth
	<div class="hidden lg:dropdown ml-2 dropdown-end">
		<div class="tooltip tooltip-bottom" data-tip="Account">
			<div tabindex="0" role="button" class="btn btn-ghost btn-circle">
				<i class="ri-account-circle-line text-xl font-normal"></i>
			</div>
		</div>
		<ul tabindex="0" class="menu menu-sm dropdown-content bg-base-300 rounded-box z-[1] mt-3 w-52 p-2 shadow">
			<li>
				<div class="w-full flex flex-col items-center gap-2 pointer-events-none mb-2">
					<div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
						<x-photo-profile class="w-10" src="{{ asset(Auth::user()->avatar ?? 'avatars/user.png') }}"></x-photo-profile>
					</div>
					<span class="text-md font-semibold">
						{{ Auth::user()->name }}
					</span>
				</div>
			</li>
			@if(Route::currentRouteName() != 'profile.detail')
			<li>
				<x-link href="{{ route('profile.detail') }}">
					Profile
				</x-link>
			</li>
			@endif
			<li>
				<x-link @click="showAlert({
					type: 'confirm',
					title: 'Logout',
					message: 'Are you sure you want to logout?',
					negativeButton: 'Cancel',
					positiveButton: 'Yes',
					form: {
						method: 'post',
						action: '{{ route('logout') }}'
					}})">
					Logout
				</x-link>
			</li>
		</ul>
	</div>
	@endauth
</div>