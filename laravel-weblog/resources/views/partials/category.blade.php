<div class="flex relative z-10">
    <button id="dropdownDefault" data-dropdown-toggle="dropdown"
      class="text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:ring-blue-300 flex items-center space-x-4 rounded-md px-4 py-2 text-sm font-medium"
      type="button">
      Filter by category
      <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </button>
  
    <!-- Dropdown menu -->
    <div id="dropdown" class="hidden absolute w-50 top-10 p-3 bg-white rounded-lg shadow">
      <h6 class="mb-3 text-sm font-medium text-gray-900">
        Category
      </h6>
      <div class="mb-3">
        @foreach ($categories as $category)
          <ul class="pl-2 my-2 text-sm" aria-labelledby="dropdownDefault">
            <li class="flex items-center space-x-2">
              <input 
                type="checkbox"
                id="category-{{ $category->id }}"
                value="{{ $category->id }}"
                class="category-checkbox w-4 h-4 bg-gray-300 border-gray-300 rounded text-primary-600" 
              />
              <span for="category-{{ $category->id }}" class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium text-{{ BadgeColor($category->color)['text'] }} bg-{{ $category->color }}">
                {{ $category->name }}
              </span>
            </li>
          </ul>
        @endforeach
      </div>
      
      <button class="flex items-center create-category-button pl-2 pt-2 space-x-1 border-t border-gray-200 w-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" class="size-5 stroke-blue-700">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>            
        <span class="flex-grow text-sm font-medium text-blue-700">Create new category</span>
      </button>

      <form action="{{ route('categories.store') }}" method="POST"
        class="hidden create-category-input pt-2 mt-2 border-t border-gray-200"
      >
        @csrf
        <input type="category" name="name"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-1.5" 
          placeholder="Category name" 
          required 
        />
      </form>
    </div>
</div>