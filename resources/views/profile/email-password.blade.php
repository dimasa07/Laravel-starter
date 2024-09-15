<x-profile-layout title="Email and Password">
	<div class="p-2 lg:px-4">
		<form action="{{ route('profile.email-password.update-email') }}" method="post">
			@csrf
			@method('patch')
			<h3 class="w-fit text-lg px-4 py-2 mb-4 ml-4 border-b-2 border-base-content/50 font-semibold">Change Email</h3>
			<div class="grid grid-cols-1 xl:grid-cols-2 mx-auto gap-4">
				<x-stat class="max-w-lg mx-auto" label="Email">
					<x-input name="email" type="text" value="{{ $user->email }}"></x-input>
					@error('email')
					<x-input-error>{{ $message }}</x-input-error>
					@enderror
				</x-stat>
			</div>

			<div class="flex flex-row-reverse w-full mt-10 px-4">
				<button type="submit" class="btn btn-success">Update Email</button>
			</div>
		</form>

		<div class="divider my-6"></div>

		<form action="{{ route('profile.email-password.update-password') }}" method="post">
			@csrf
			@method('patch')
			<h3 class="w-fit text-lg px-4 p-2 mb-4 ml-4 border-b-2 border-base-content/50 font-semibold">Reset Password</h3>
			<div class="grid grid-cols-1 xl:grid-cols-2 mx-auto gap-4">
				<x-stat class="max-w-lg mx-auto" label="New Password">
					<x-input name="password" type="password" />
					@error('password')
					<x-input-error>{{ $message }}</x-input-error>
					@enderror
				</x-stat>
				<x-stat class="max-w-lg mx-auto" label="Password Confirmation">
					<x-input name="password_confirmation" type="password"/>
					@error('password_confirmation')
					<x-input-error>{{ $message }}</x-input-error>
					@enderror
				</x-stat>
			</div>
			<div class="flex flex-row-reverse w-full mt-10 px-4">
				<button type="submit" class="btn btn-success">Update Password</button>
			</div>
		</form>
	</div>
</x-profile-layout>