<x-admin-layout title="Add User">
    <x-slot:content-header>
        <div class="flex w-full gap-4">
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-neutral"><i class="ri-arrow-left-line"></i>Back</a>
            <h2 class="text-2xl">Add User</h2>
        </div>
    </x-slot:content-header>

    <div class="p-2 lg:px-4">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <h3 class="w-fit text-lg px-4 py-2 mb-4 ml-4 border-b-2 border-base-content/50 font-semibold">User Profile</h3>
            <div class="grid grid-cols-1 xl:grid-cols-2 mx-auto gap-4">
                <x-stat class="max-w-lg mx-auto" label="Name">
                    <x-input name="name" type="text"/>
                    @error('name')
                    <x-input-error>{{ $message }}</x-input-error>
                    @enderror
                </x-stat>
                <x-stat class="max-w-lg mx-auto" label="Job Title">
                    <x-input name="job_title" type="text"/>
                    @error('job_title')
                    <x-input-error>{{ $message }}</x-input-error>
                    @enderror
                </x-stat>
                <x-stat class="max-w-lg mx-auto" label="Birthday">
                    <x-input type="date" name="birthday"/>
                    @error('birthday')
                    <x-input-error>{{ $message }}</x-input-error>
                    @enderror
                </x-stat>
                <x-stat class="max-w-lg mx-auto" label="Address">
                    <x-input type="text" name="address"/>
                    @error('address')
                    <x-input-error>{{ $message }}</x-input-error>
                    @enderror
                </x-stat>
            </div>

            <div class="divider my-6"></div>

            <h3 class="w-fit text-lg px-4 p-2 mb-4 ml-4 border-b-2 border-base-content/50 font-semibold">User Account</h3>
            <div class="grid grid-cols-1 xl:grid-cols-2 mx-auto gap-4">
                <x-stat class="max-w-lg mx-auto" label="Email">
                    <x-input name="email" type="email"/>
                    @error('email')
                    <x-input-error>{{ $message }}</x-input-error>
                    @enderror
                </x-stat>
                <x-stat class="max-w-lg mx-auto" label="Password">
                    <x-input name="password" type="password"/>
                    @error('password')
                    <x-input-error>{{ $message }}</x-input-error>
                    @enderror
                </x-stat>
            </div>
            <div class="flex flex-row-reverse w-full mt-10 px-4">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</x-admin-layout>