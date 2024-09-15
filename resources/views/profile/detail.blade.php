<x-profile-layout title="Profile">
	<div class="p-2 lg:px-4" x-data="{ src: '{{ $user->avatar ? asset($user->avatar) : '' }}', removed: false }">
		<form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('patch')
			<x-photo-profile id="avatar" class="w-28 h-28 max-h-28 max-w-28 mx-auto" ::src="src != '' ? src : '{{ asset('avatars/user.png') }}'"></x-photo-profile>
			<div class="mx-auto mt-6 w-fit flex flex-col gap-2">
				<div class="flex gap-2">
					<label class="mx-auto w-fit bg-red btn btn-xs btn-outline">
						Change Photo
						<input @change="(event) => {
							let input = event.target;
							if(input.files[0] != null){
								let reader = new FileReader();
								reader.onload = function(){
									let img = document.getElementById('avatar');
									src = reader.result;
								}
								reader.readAsDataURL(input.files[0]);
							}
							removed = false;
						}" id='inp_avatar' name="avatar" type="file" class="hidden" value="removed">
						<template x-if="removed">
							<input type="text" name="avatar_removed" class="hidden" value="{{ $user->avatar }}">
						</template>
					</label>
					<template x-if="src != ''">
					<button type="button" @click="() => {
						removed = true;
						src = '';
					}" class="btn btn-xs btn-error">Remove Photo</button>
					</template>
				</div>
				@error('avatar')
				<x-input-error>{{ $message }}</x-input-error>
				@enderror
			</div>
			<div class="mt-8 grid grid-cols-1 xl:grid-cols-2 mx-auto gap-4">
				<x-stat class="max-w-lg mx-auto" label="Name">
					<input name="name" type="text" class="input input-bordered" value="{{ $user->name }}">
					@error('name')
					<x-input-error>{{ $message }}</x-input-error>
					@enderror
				</x-stat>
				<x-stat class="max-w-lg mx-auto" label="Job Title">
					<input name="job_title" type="text" class="input input-bordered" value="{{ $user->job_title }}">
					@error('job_title')
					<x-input-error>{{ $message }}</x-input-error>
					@enderror
				</x-stat>
				<x-stat class="max-w-lg mx-auto" label="Birthday">
					<x-input type="date" name="birthday" value="{{ $user->birthday }}" ></x-input>
					@error('birthday')
					<x-input-error>{{ $message }}</x-input-error>
					@enderror
				</x-stat>
				<x-stat class="max-w-lg mx-auto" label="Address">
					<x-input name="address" value="{{ $user->address }}" ></x-input>
					@error('address')
					<x-input-error>{{ $message }}</x-input-error>
					@enderror
				</x-stat>
			</div>
			<div class="flex flex-row-reverse w-full mt-10 px-4">
				<button type="submit" class="btn btn-success">Update</button>
			</div>
		</form>
	</div>
</x-profile-layout>