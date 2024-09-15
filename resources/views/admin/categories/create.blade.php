<x-admin-layout title="Add Category">
    <x-slot:content-header>
        <div class="flex w-full gap-4">
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-neutral"><i class="ri-arrow-left-line"></i>Back</a>
            <h2 class="text-2xl">Add Category</h2>
        </div>
    </x-slot:content-header>

    <div class="p-2 lg:px-4">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="grid grid-cols-1 xl:grid-cols-2 mx-auto gap-4">
                <x-stat class="max-w-lg mx-auto" label="Name">
                    <x-input name="name" type="text"/>
                    @error('name')
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