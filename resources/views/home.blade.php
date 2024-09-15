<x-guest-layout title="Home">
	<!-- Header -->
	<div class="flex flex-col gap-32 p-6 xl:px-32 my-10 items-center">
		<header>
			<div class="container grid grid-cols-1 xl:grid-cols-2 gap-16">
				<div class="text-center px-2 xl:mx-10 flex flex-col gap-8 xl:my-auto">
					<h1 class="text-5xl font-semibold">Team management mobile application</h1>
					<p>Start getting things done together with your team based on Pavo's revolutionary team management features</p>
					<div class="flex gap-4 items-center justify-center">
						<a href="" class="btn btn-primary rounded-full w-40">Register</a>
						<a href="" class="btn btn-success rounded-full w-40">Login</a>
					</div>
				</div>
				<div class="mx-auto xl:mx-10">
					<img class="inline" src="{{ asset('images/header-smartphone.png') }}" alt="alternative" />
				</div>
			</div>
		</header> 

		<div class="text-center text-3xl xl:mx-10">
			Team management mobile apps don’t get better than Pavo. It’s probably the best app in the world for this purpose. Don’t hesitate to give it a try today and you will fall in love with it
		</div>

		<div class="container grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12 xl:gap-x-8">
			@for($i=0; $i<6; $i++)
			<div class="card bg-base-100 shadow-xl">
				<figure>
					<img
					src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" />
				</figure>
				<div class="card-body">
					<h2 class="card-title">
						Shoes!
						<div class="badge badge-secondary">NEW</div>
					</h2>
					<p>If a dog chews shoes whose shoes does he choose?</p>
					<div class="card-actions justify-end">
						<div class="badge badge-outline">Fashion</div>
						<div class="badge badge-outline">Products</div>
					</div>
				</div>
			</div>
			@endfor
		</div>

		<div class="container flex flex-col gap-32 xl:px-24 mt-10">
			@for($i=1; $i<5; $i++)
			<div class="flex flex-col gap-6 xl:gap-8 xl:items-center @if($i%2==0) xl:flex-row-reverse @else xl:flex-row @endif">
				<img
					src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" class="max-w-sm" />
					<div class="hidden xl:flex divider divider-horizontal"></div>
				<div>
					<div class="font-semibold text-2xl mb-4">Title {{ $i }}</div>
					<p>Description 1. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque placeat non eius voluptate quaerat! Rerum.</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Rem impedit repudiandae minima perspiciatis, nisi, quia.</p>
				</div>
			</div>
			@endfor
		</div>
	</div>
</x-guest-layout>