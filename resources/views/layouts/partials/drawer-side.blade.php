@props(['for'])
<div class="drawer-side lg:hidden">
	<label for="{{ $for }}" aria-label="close sidebar" class="drawer-overlay"></label>
	<div class="menu bg-base-200 min-h-full w-80 p-4">
		<label for="drawer" class="btn btn-circle btn-ghost mb-4">
			{{-- close icon --}}
			<i class="ri-close-line text-xl font-normal"></i>
		</label>
		<ul>
			@isset($menuDrawerSide)
			{{ $menuDrawerSide }}
			@endisset
			<li></li>
			<li>
				<label class="w-full flex gap-3 justify-between">
					<i :class="theme == 'dark' ? 'ri-moon-line' : 'ri-sun-line'"></i>
					<span class="w-full">Dark Mode</span>
					<input :checked="theme == 'dark'" name="theme" type="checkbox" class="toggle toggle-xs toggle-accent" @change="(event) => event.target.checked ? setTheme('dark') : setTheme('light')">
				</label>
			</li>
			@auth
			<li>
				<details>
					<summary>
						<div class="flex gap-3">
							<i class="ri-account-circle-line"></i>
							<span>Account</span>
						</div>
					</summary>
					<ul>
						<li>
							<div class="w-full flex flex-col items-center gap-2 pointer-events-none">
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
				</details>
			</li>
			@else
			<li>
				<x-link href="{{ route('login') }}" icon="login-circle">Login</x-link>
			</li>
			@endauth
		</ul>
	</div>
</div>
