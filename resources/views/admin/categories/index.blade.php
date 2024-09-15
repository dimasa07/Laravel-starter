<x-admin-layout title="Data Category">
  <x-slot:content-header>
    <div class="flex w-full justify-between items-center">
      <h2 class="text-2xl font-semibold">Categories</h2>
      <a href="{{ route('categories.create') }}" class="btn btn-sm btn-success justify-end"><i class="ri-add-line"></i>Add</a>
    </div>
  </x-slot:content-header>

  <div class="px-4 flex gap-4 flex-col xl:flex-row lg:justify-between  items-center xl:items-start">
    <label class="input input-sm input-bordered p-5 flex items-center gap-2 w-full max-w-sm">
      <input type="text" class="grow" placeholder="Search..." />
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
        <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
      </svg>
    </label>
    @if(count($categories) > 0)
    <x-paginate :data="$categories" />
    @endif
  </div>
  <div class="overflow-x-auto mt-4 lg:mx-4">
    <table class="table table-zebra">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($categories as $i => $category)
        <tr>
          <th>{{ $i+1+(($categories->currentPage()-1) * 10) }}</th>
          <td>{{ $category->name }}</td>
          <td class="text-center">
            <div class="flex justify-center gap-2">
              <div class="tooltip min-h-6 flex items-center" data-tip="Edit">
                <a class="btn btn-xs btn-circle btn-info font-normal" href="{{ route('categories.edit', $category) }}">
                  <i class="ri-edit-line"></i>
                </a>
              </div>
              <div class="tooltip min-h-6 flex items-center" data-tip="Delete">
                <button @click="showAlert({
                  type: 'confirm',
                  title: 'Delete Category',
                  message: 'Are you sure you want to delete category with name <strong>{{ htmlspecialchars($category->name) }}</strong> ?',
                  negativeButton: 'Cancel',
                  positiveButton: 'Yes',
                  form: {
                    method: 'post',
                    methodType: 'delete',
                    action: '{{ route('categories.destroy', $category) }}'
                  }
                })" class="btn btn-xs btn-circle btn-error font-normal"><i class="ri-delete-bin-line"></i></button>
              </div>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="text-center">No data.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</x-admin-layout>
