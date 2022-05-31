
    <div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

    <div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex items-center justify-center mt-8">
            <div class="flex items-center">
                <span class="mx-2 text-2xl font-semibold text-white">Dashboard</span>
            </div>
        </div>

        <nav class="mt-10">
            <a class="{{ (request()->route()->named('admin.index')) ? 'bg-red-500' : 'active' }}
            flex items-center px-6 py-2 mt-4 text-gray-100  hover:bg-gray-400 hover:bg-opacity-25 hover:text-gray-100" href="{{route('admin.index')}}">
                <img class="w-8 h-8 filter invert" src="{{asset('images/icons/dashboard.svg')}}" alt="dashboard">
                <span class="mx-3">Dashboard</span>
            </a>

            <a class="{{ (request()->route()->named('admin.movies.index')) ? 'bg-red-500' : 'active' }}
            flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 hover:text-gray-100"
               href="{{route('admin.movies.index')}}">
                <img class="w-8 h-8 filter invert" src="{{asset('images/icons/movie.svg')}}" alt="dashboard">
                <span class="mx-3">Movies</span>
            </a>
            <a class="{{ (request()->route()->named('admin.series.index')) ? 'bg-red-500' : 'active' }}
            flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 hover:text-gray-100"
               href="{{route('admin.series.index')}}">
                <img class="w-8 h-8 filter invert" src="{{asset('images/icons/series.svg')}}" alt="dashboard">
                <span class="mx-3">Series</span>
            </a>
            <a class="{{ (request()->route()->named('admin.genres.index')) ? 'bg-red-500' : 'active' }}
            flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 hover:text-gray-100"
               href="{{route('admin.genres.index')}}">
                <img class="w-8 h-8 filter invert" src="{{asset('images/icons/category.svg')}}" alt="dashboard">
                <span class="mx-3">Genres</span>
            </a>
            <a class="{{ (request()->route()->named('admin.casts.index')) ? 'bg-red-500' : 'active' }}
            flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 hover:text-gray-100"
               href="{{route('admin.casts.index')}}">
                <img class="w-8 h-8 filter invert" src="{{asset('images/icons/cast.svg')}}" alt="dashboard">
                <span class="mx-3">Casts</span>
            </a>
            <a class="{{ (request()->route()->named('admin.tags.index')) ? 'bg-red-500' : 'active' }}
            flex items-center px-6 py-2 mt-4 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 hover:text-gray-100"
               href="{{route('admin.tags.index')}}">
                <img class="w-8 h-8 filter invert" src="{{asset('images/icons/tag.svg')}}" alt="dashboard">
                <span class="mx-3">Tags</span>
            </a>
        </nav>
    </div>
