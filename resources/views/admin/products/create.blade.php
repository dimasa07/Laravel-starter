<x-admin-layout title="Add Product">
    <x-slot:content-header>
        <div class="flex w-full gap-4">
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-neutral"><i class="ri-arrow-left-line"></i>Back</a>
            <h2 class="text-2xl">Add Product</h2>
        </div>
    </x-slot:content-header>

    <div class="p-2 lg:px-4">
        <form action="{{ route('products.store') }}" method="post">
            @csrf
            <div class="grid grid-cols-1 xl:grid-cols-2 mx-auto gap-4">
                <x-stat class="max-w-lg mx-auto" label="Name">
                    <x-input name="name" type="text"/>
                    @error('name')
                    <x-input-error>{{ $message }}</x-input-error>
                    @enderror
                </x-stat>
                <x-stat class="max-w-lg mx-auto" label="Description">
                    <x-input name="desc" type="text"/>
                    @error('desc')
                    <x-input-error>{{ $message }}</x-input-error>
                    @enderror
                </x-stat>
                <x-stat class="max-w-lg mx-auto" label="Price">
                    <x-input name="price" type="number"/>
                    @error('price')
                    <x-input-error>{{ $message }}</x-input-error>
                    @enderror
                </x-stat>
            </div>

            <div class="divider my-6"></div>

            <h3 class="w-fit text-lg px-4 p-2 mb-4 ml-4 border-b-2 border-base-content/50 font-semibold">Product Categories</h3>
            <div class="" x-data="data()">
                <template x-for="category in categories">
                    <div class="inline-block mx-2 my-4" x-data="{ checked: false }">
                        <label class="btn" :class="{'btn-primary' : checked}">
                            <div class="flex items-center gap-2">
                                <input x-model="checked" type="checkbox" class="checkbox checkbox-xs">
                                <span x-text="category.name"></span>
                            </div>
                        </label>
                        <template x-if="checked">
                            <input name="productCategories[]" type="text" class="hidden" :value="category.id">
                        </template>
                    </div>
                </template>
            </div>
            <div class="flex flex-row-reverse w-full mt-10 px-4">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
    <script>
        const categories = @json($categories);
        function data(){
            return {
                categories : categories
            };
        }
    </script>
</x-admin-layout>