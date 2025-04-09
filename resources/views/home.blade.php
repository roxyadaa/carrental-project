@extends('layouts.myapp')
@section('content')
    <main class="bg-white">
        {{-- Hero Section with Geometric Pattern --}}
        <div class="relative overflow-hidden bg-gray-900">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gray-900 opacity-90"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-orange-500/10 to-transparent"></div>
                <div class="absolute inset-0 bg-[url('/images/pattern.png')] bg-[length:100px_100px] opacity-10"></div>
            </div>
            <div class="container mx-auto px-6 py-24 md:py-32 flex flex-col md:flex-row items-center relative z-10">
                <div class="md:w-1/2 mb-12 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                        <span class="text-orange-500">Premium</span> Car Rentals <br>for Every Journey
                    </h1>
                    <p class="text-gray-300 text-lg mb-8 max-w-lg">
                        Experience the freedom of the open road with our exceptional fleet of vehicles, tailored to your travel needs.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/cars" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 text-center shadow-lg hover:shadow-orange-500/30">
                            Explore Our Fleet
                        </a>
                        <a href="/contact_us" class="bg-white/10 hover:bg-white/20 text-white font-bold py-3 px-6 rounded-lg transition duration-300 text-center border border-white/20">
                            Contact Us
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 relative">
                    <!-- <img loading="lazy" src="/images/home_car.png" alt="Luxury Car" class="w-full max-w-lg mx-auto transform hover:scale-105 transition duration-500"> -->
                    <img loading="lazy" src="/images/home car.png" alt="home car">
                </div>
            </div>
        </div>

        {{-- Featured Cars Section --}}
        <div class="container mx-auto px-6 py-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Featured <span class="text-orange-500">Vehicles</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Discover our curated selection of premium cars for your next adventure</p>
                <div class="w-16 h-1 bg-orange-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach ($cars as $car)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
                        <div class="relative overflow-hidden h-56">
                            <a href="{{ route('car.reservation', ['car' => $car->id]) }}">
                                <img loading="lazy" class="w-full h-full object-cover transition duration-500 hover:scale-110" src="{{ $car->image }}" alt="{{ $car->brand }} {{ $car->model }}">
                                @if($car->reduce > 0)
                                <span class="absolute top-4 right-4 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                    {{ $car->reduce }}% OFF
                                </span>
                                @endif
                            </a>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900">{{ $car->brand }} {{ $car->model }}</h3>
                                    <p class="text-gray-500 text-sm">{{ $car->engine }}</p>
                                </div>
                                <div class="flex items-center bg-orange-50 px-2 py-1 rounded">
                                    @for ($i = 0; $i < $car->stars; $i++)
                                        <svg class="w-4 h-4 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                    <span class="text-gray-600 text-sm ml-1">{{ $car->stars }}.0</span>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                                <div>
                                    <span class="text-xl font-bold text-gray-900">${{ $car->price_per_day }}</span>
                                    @if($car->reduce > 0)
                                    <span class="text-sm text-gray-500 line-through ml-2">${{ intval(($car->price_per_day * 100) / (100 - $car->reduce)) }}</span>
                                    @endif
                                    <span class="block text-xs text-gray-500">per day</span>
                                </div>
                                <a href="{{ route('car.reservation', ['car' => $car->id]) }}" class="text-orange-500 hover:text-white border border-orange-500 hover:bg-orange-500 font-medium rounded-lg text-sm px-4 py-2 text-center transition duration-300">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                <a href="/cars" class="inline-flex items-center text-orange-500 hover:text-orange-600 font-medium">
                    View All Vehicles
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Stats Section with Diagonal Background --}}
        <div class="relative py-16 bg-gradient-to-r from-gray-900 to-gray-800 overflow-hidden">
            <div class="absolute inset-0 bg-[url('/images/diagonal-pattern.png')] opacity-10"></div>
            <div class="container mx-auto px-6 relative">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Our <span class="text-orange-500">Achievements</span></h2>
                    <p class="text-gray-400 max-w-2xl mx-auto">Numbers that reflect our commitment to excellence</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 text-center border border-white/10 hover:bg-white/10 transition duration-300">
                        <div class="text-4xl font-bold text-orange-500 mb-2 font-mono">80+</div>
                        <h3 class="text-lg font-semibold text-white mb-1">Premium Vehicles</h3>
                        <p class="text-gray-400 text-sm">From economy to luxury</p>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 text-center border border-white/10 hover:bg-white/10 transition duration-300">
                        <div class="text-4xl font-bold text-orange-500 mb-2 font-mono">4.5K+</div>
                        <h3 class="text-lg font-semibold text-white mb-1">Happy Customers</h3>
                        <p class="text-gray-400 text-sm">Satisfaction guaranteed</p>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 text-center border border-white/10 hover:bg-white/10 transition duration-300">
                        <div class="text-4xl font-bold text-orange-500 mb-2 font-mono">7K+</div>
                        <h3 class="text-lg font-semibold text-white mb-1">Successful Rentals</h3>
                        <p class="text-gray-400 text-sm">And counting</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Why Choose Us --}}
        <div class="container mx-auto px-6 py-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Why Choose <span class="text-orange-500">Our Service</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto">We go the extra mile to ensure your rental experience is exceptional</p>
                <div class="w-16 h-1 bg-orange-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 rounded-lg bg-gradient-to-br from-white to-gray-50 border border-gray-100 hover:border-orange-200 transition duration-300">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Quick Booking</h3>
                    <p class="text-gray-600">Reserve your vehicle in just a few clicks with our streamlined process.</p>
                </div>

                <div class="p-6 rounded-lg bg-gradient-to-br from-white to-gray-50 border border-gray-100 hover:border-orange-200 transition duration-300">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Quality Vehicles</h3>
                    <p class="text-gray-600">Our fleet undergoes rigorous maintenance for your safety and comfort.</p>
                </div>

                <div class="p-6 rounded-lg bg-gradient-to-br from-white to-gray-50 border border-gray-100 hover:border-orange-200 transition duration-300">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Transparent Pricing</h3>
                    <p class="text-gray-600">No hidden fees - you'll know exactly what you're paying for.</p>
                </div>

                <div class="p-6 rounded-lg bg-gradient-to-br from-white to-gray-50 border border-gray-100 hover:border-orange-200 transition duration-300">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">24/7 Support</h3>
                    <p class="text-gray-600">Our team is always available to assist you with any questions.</p>
                </div>

                <div class="p-6 rounded-lg bg-gradient-to-br from-white to-gray-50 border border-gray-100 hover:border-orange-200 transition duration-300">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Flexible Rentals</h3>
                    <p class="text-gray-600">Choose from hourly, daily, or weekly rental options.</p>
                </div>

                <div class="p-6 rounded-lg bg-gradient-to-br from-white to-gray-50 border border-gray-100 hover:border-orange-200 transition duration-300">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Satisfaction Guarantee</h3>
                    <p class="text-gray-600">We're committed to making your rental experience perfect.</p>
                </div>
            </div>
        </div>

        {{-- CTA Section --}}
        <div class="bg-orange-50 py-16">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Ready for Your Next Adventure?</h2>
                <p class="text-gray-700 text-lg mb-8 max-w-2xl mx-auto">Book your perfect car today and experience the difference</p>
                <a href="/cars" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-8 rounded-lg transition duration-300 shadow-lg hover:shadow-orange-500/30">
                    Reserve Your Vehicle Now
                </a>
            </div>
        </div>
    </main>
@endsection