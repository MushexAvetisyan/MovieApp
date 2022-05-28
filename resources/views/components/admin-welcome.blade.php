<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="text-xl font-bold text-green-700">
        Movie App
    </div>

    <div class="mt-8 text-2xl">
        Movie Database Statistic
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <img class="w-9 h-9" src="{{asset('images/icons/account_circle.svg')}}" alt="account_circle">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                <span class="text-xl font-bold text-red-600"> {{ $users->count() }}</span> Users in Database
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <img class="w-9 h-9" src="{{asset('images/icons/movie.svg')}}" alt="movie">
            <div  class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                <span class="text-xl font-bold text-red-600">{{ $movies->count() }}</span> Movies In Database
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <img class="w-9 h-9" src="{{asset('images/icons/series.svg')}}" alt="series">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                <span class="text-xl font-bold text-red-600">{{ $series->count() }}</span> Series In Database
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <img class="w-9 h-9" src="{{asset('images/icons/cast.svg')}}" alt="cast">
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                <span class="text-xl font-bold text-red-600">{{ $casts->count() }}</span> Casts In Database
            </div>
        </div>
    </div>
</div>
