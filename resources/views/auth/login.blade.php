<x-guest-layout title="Login">
	<div class="container w-full max-w-lg mx-auto p-10 mt-14">
		<form action="{{ route('login') }}" method="post">
			@csrf
			<div class="p-8 rounded-lg shadow-xl bg-base-300 flex flex-col gap-8">
				<div>
					<label class="input input-bordered flex items-center justify-between gap-2">
						<i class="ri-mail-line"></i>
						<input class="w-full" name="email" type="email" placeholder="Email" />
					</label>
					@error('email')
					<x-input-error>{{ $message }}</x-input-error>
					@enderror
				</div>
				<div>
					<label class="input input-bordered flex items-center justify-between gap-2">
						<i class="ri-key-line"></i>
						<input class="w-full" name="password" type="password" placeholder="Password" />
					</label>
					@error('password')
					<x-input-error>{{ $message }}</x-input-error>
					@enderror
				</div>
				<div class="flex justify-between">
					<label class="flex text-xs gap-2">
						<span class="my-auto">Remember me</span>
						<input type="checkbox" name="remember_me" class="checkbox checkbox-success checkbox-xs my-auto">
					</label>
					<button type="submit" class="btn btn-success justify-end">Login</button>
				</div>
				<div class="mx-auto flex flex-col items-center text-xs">
					<span>Don't have account ?</span>
					<span><a href="" class="link link-hover">Register</a></span>
				</div>
			</div>
		</form>
	</div>
</x-guest-layout>
