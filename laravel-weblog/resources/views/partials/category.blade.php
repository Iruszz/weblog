<div class="flex relative">
    <button id="dropdownDefault" data-dropdown-toggle="dropdown"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center space-x-4 rounded-md px-4 py-2 text-sm font-medium"
      type="button">
      Filter by category
      <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </button>
  
    <!-- Dropdown menu -->
    <div id="dropdown" class="absolute z-10 top-10 hidden w-56 p-3 bg-white rounded-lg shadow">
      <h6 class="mb-3 text-sm font-medium text-gray-900">
        Category
      </h6>
      <div class="mb-3">
        @foreach ($categories as $category)
          <ul class="pl-2 my-1 mb-1 text-sm" aria-labelledby="dropdownDefault">
            <li class="flex items-center">
              <input 
                type="checkbox"
                id="category-{{ $category->id }}"
                value="{{ $category->id }}"
                class="category-checkbox w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
      
              <label for="category-{{ $category->id }}" class="ml-2 text-sm font-medium text-gray-900">
                {{ $category->name }}
              </label>
            </li>
          </ul>
        @endforeach
      </div>
      
      <button class="flex create-category-button pl-2 pt-2 space-x-2 border-t border-gray-200 w-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" class="size-4 stroke-blue-700">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>        
        <p class="text-sm font-medium text-blue-700 sm:col-span-2 sm:mt-0">Create new category</p>
      </button>

      <form action="" method="POST"
        class="create-category-input hidden mt-2 pl-2 pt-2 space-x-2 border-t-1 border-gray-200"
      >
        <input type="category" 
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fill p-1.5" 
          placeholder="Category name" 
          required 
        />
      </form>
    </div>
</div>