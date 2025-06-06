<header class="lg:mb-6 h-[400px] bg-cover bg-center" 
    style="background-image: url('{{ asset('storage/' . $article->image) }}');
        box-shadow: inset 0 0 0 1000px rgba(16, 24, 40, 0.322);">

    <div class="flex flex-col pt-20 pl-30 space-y-5 w-full">
        <h1 class="w-full text-3xl font-extrabold leading-tight text-white lg:text-4xl">
            {{ $article->title }}
        </h1>
        <div class="flex w-fit relative gap-3">
            <span class="relative rounded-lg bg-purple-700 px-4 py-1.5 text-xs font-semibold text-white hover:bg-gray-100">
                Premium content
            </span>
            <span class="rounded-lg px-3.5 py-1
                bg-transparent
                border border-solid border-white
                text-xs font-semibold text-white 
                hover:bg-gray-100">
                {{ $article->category->name }}
            </span>
        </div>

    </div>
</header>