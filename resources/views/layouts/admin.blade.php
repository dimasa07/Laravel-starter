@props(['title'])
<x-base-layout title="{{ $title ?? env('APP_NAME', 'Laravel')  }}">
	<x-slot:menu-navbar>
		<li>
			<x-link href="{{ route('home') }}" icon="group-3">Guest Page</x-link>
		</li>
		<li>
			<x-link href="{{ route('user.dashboard') }}" icon="user">User Page</x-link>
		</li>
	</x-slot:menu-navbar>
	<x-slot:menu-drawer-side>
		<li>
			<x-link href="{{ route('admin.dashboard') }}" icon="dashboard-horizontal">Dashboard</x-link>
		</li>
		<li>
			<x-link href="{{ route('users.index') }}" icon="group">Users</x-link>
		</li>
		<li>
			<details>
				<summary>
					<div class="flex gap-3">
						<i class="ri-product-hunt-line"></i>
						<span>Products</span>
					</div>
				</summary>
				<ul>
					<li>
						<x-link href="{{ route('categories.index') }}">Categories</x-link>
					</li>
					<li>
						<x-link href="{{ route('products.index') }}">All Products</x-link>
					</li>
				</ul>
			</details>
		</li>
		<li></li>
		<li>
			<x-link href="{{ route('user.dashboard') }}" icon="user">User Page</x-link>
		</li>
		<li>
			<x-link href="{{ route('home') }}" icon="group-3">Guest Page</x-link>
		</li>
	</x-slot:menu-drawer-side>

	<div class="flex m-2 lg:m-4 gap-4">
		<div class="hidden rounded-md bg-base-100 shadow-lg lg:block min-w-72 py-4 px-2">
			<ul class="menu text-md">
				<li>
					<x-link href="{{ route('admin.dashboard') }}" icon="dashboard-horizontal">Dashboard</x-link>
				</li>
				<li>
					<x-link href="{{ route('users.index') }}" icon="group">Users</x-link>
				</li>
				<li>
					<details>
						<summary>
							<div class="flex gap-3">
								<i class="ri-product-hunt-line"></i>
								<span>Products</span>
							</div>
						</summary>
						<ul>
							<li>
								<x-link href="{{ route('categories.index') }}">Categories</x-link>
							</li>
							<li>
								<x-link href="{{ route('products.index') }}">All Products</x-link>
							</li>
						</ul>
					</details>
				</li>
			</ul>
		</div>
		<div class="container min-h-screen mx-auto rounded-md bg-base-100 shadow-lg py-4 sm:px-2 md:px-4">
			@isset($slot)
			@isset($contentHeader)
			<div class="mt-2 mb-6 px-4 w-full">
				{{ $contentHeader }}
			</div>
			@endisset
			{{ $slot }}
			@endisset
		</div>
	</div>

</x-base-layout>