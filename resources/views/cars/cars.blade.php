@extends('layouts.myapp')
@section('content')
    <main class="bg-white">
        {{-- Search Section --}}
        <div class="container mx-auto px-6 py-16 bg-white rounded-lg shadow-md mb-12">
            <form action="{{ route('carSearch') }}">
                <div class="flex flex-col md:flex-row justify-center gap-6">
                    <div class="flex flex-col md:flex-row gap-4">
                        <input type="text" placeholder="Brand" name="brand"
                               class="block w-full md:w-auto rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm">
                        <input type="text" placeholder="Model" name="model"
                               class="block w-full md:w-auto rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm">
                        <input type="number" placeholder="$ Minimum Price" name="min_price"
                               class="block w-full md:w-auto rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm">
                        <input type="number" placeholder="$ Maximum Price" name="max_price"
                               class="block w-full md:w-auto rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-500 sm:text-sm">
                    </div>
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white py-3 px-8 rounded-lg font-bold shadow-lg transition duration-300 text-center">
                        Search
                    </button>
                </div>
            </form>
        </div>

        {{-- Featured Cars Section --}}
        <div class="container mx-auto px-6 py-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Featured <span class="text-orange-500">Vehicles</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Explore the best cars we offer for your perfect journey</p>
                <div class="w-16 h-1 bg-orange-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($cars as $car)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
                        <a href="{{ route('car.reservation', ['car' => $car->id]) }}">
                            <div class="relative overflow-hidden h-56">
                                <img loading="lazy" class="w-full h-full object-cover transition duration-500 hover:scale-110"
                                     src="{{ $car->image }}" alt="{{ $car->brand }} {{ $car->model }}">
                                @if($car->reduce > 0)
                                    <span class="absolute top-4 right-4 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                        {{ $car->reduce }}% OFF
                                    </span>
                                @endif
                            </div>
                        </a>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-900">{{ $car->brand }} {{ $car->model }}</h3>
                            <p class="text-gray-500 text-sm">{{ $car->engine }}</p>

                            <div class="flex justify-between items-center mt-4">
                                <div>
                                    <span class="text-xl font-bold text-gray-900">${{ $car->price_per_day }}</span>
                                    @if($car->reduce > 0)
                                        <span class="text-sm text-gray-500 line-through ml-2">${{ intval(($car->price_per_day * 100) / (100 - $car->reduce)) }}</span>
                                    @endif
                                    <span class="block text-xs text-gray-500">per day</span>
                                </div>
                                <div class="flex items-center">
                                    @for ($i = 0; $i < $car->stars; $i++)
                                        <svg class="w-4 h-4 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                    <span class="text-gray-600 text-sm ml-1">{{ $car->stars }}.0</span>
                                </div>
                            </div>

                            <div class="mt-4 text-center">
                                <a href="{{ route('car.reservation', ['car' => $car->id]) }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white py-2 px-6 rounded-lg font-medium transition duration-300">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="/cars" class="inline-flex items-center text-orange-500 hover:text-orange-600 font-medium">
                    View All Vehicles
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </main>
@endsection
