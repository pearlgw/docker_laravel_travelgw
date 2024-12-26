@extends('front.layout.app')
@section('content')
    <section id="content"
        class="max-w-full w-full mx-auto bg-[#ECF3F6] min-h-screen flex flex-col gap-8 lg:px-11 pb-[120px]">
        <nav class="flex items-center justify-between w-full px-4 mt-8">
            <div class="flex items-center gap-3">
                @auth
                    <div
                        class="w-12 h-12 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008]">
                        <img src="{{ Storage::url(Auth::user()->avatar) }}" class="object-cover object-center w-full h-full"
                            alt="photo">
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="text-xs tracking-035 lg:text-base md:text-base">Welcome!</p>
                        <p class="font-semibold">{{ Auth::user()->name }}</p>
                    </div>
                @endauth
                @guest
                    <div class="flex flex-col gap-1">
                        <p class="text-xs lg:text-base tracking-035 md:text-base">Welcome!</p>
                        <p class="font-semibold">Siap jalan jalan?</p>
                    </div>
                @endguest
            </div>
            <a href="">
                <div
                    class="w-12 h-12 rounded-full bg-white overflow-hidden flex shrink-0 items-center justify-center shadow-[6px_8px_20px_0_#00000008]">
                    <img src="{{ asset('assets/icons/bell.svg') }}" alt="icon">
                </div>
            </a>
        </nav>
        <h1 class="font-semibold text-2xl leading-[36px] text-center lg:text-4xl md:text-3xl">Explore New<br>Experience with
            Us</h1>
        <div id="categories" class="flex flex-col gap-3">
            <h2 class="px-4 font-semibold lg:text-2xl md:text-2xl">Categories</h2>
            <div class="main-carousel buttons-container">
                @foreach ($categories as $category)
                    <a href="{{ route('front.category', $category) }}"
                        class="px-2 group first-of-type:pl-4 last-of-type:pr-4">
                        <div
                            class="p-3 flex items-center gap-2 rounded-[10px] border border-[#129E85] group-hover:bg-[#129E85] transition-all duration-300">
                            <div class="flex w-6 h-6 shrink-0">
                                <img src="{{ Storage::url($category->icon) }}" alt="icon">
                            </div>
                            <span
                                class="text-sm tracking-[0.35px] text-[#129E85] group-hover:text-white transition-all duration-300">{{ $category->name }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div id="recommendations" class="flex flex-col gap-3">
            <h2 class="px-4 font-semibold lg:text-2xl md:text-2xl">Trip Recommendation</h2>
            <div class="main-carousel card-container">
                @forelse ($packageTours as $tour)
                    <a href="{{ route('front.details', $tour->slug) }}"
                        class="px-2 group first-of-type:pl-4 last-of-type:pr-4">
                        <div
                            class="w-[288px] p-4 flex flex-col gap-3 rounded-[26px] bg-white shadow-[6px_8px_20px_0_#00000008]">
                            <div class="w-full h-[330px] rounded-xl flex shrink-0 overflow-hidden">
                                <img src="{{ Storage::url($tour->thumbnail) }}" class="object-cover w-full h-full"
                                    alt="thumbnails">
                            </div>
                            <div class="flex justify-between gap-2">
                                <div class="flex flex-col gap-1">
                                    <p class="font-semibold two-lines">{{ $tour->name }}</p>
                                    <div class="flex items-center gap-1">
                                        <div class="flex w-4 h-4 shrink-0">
                                            <img src="{{ asset('assets/icons/location-map.svg') }}" alt="icon">
                                        </div>
                                        <span class="text-sm text-darkGrey tracking-035">{{ $tour->location }}</span>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1 text-right">
                                    <p class="text-sm leading-[21px]">
                                        <span class="font-semibold text-[#129E85] text-nowrap">Rp
                                            {{ number_format($tour->price, 0, ',', '.') }}</span><br>
                                        <span class="text-darkGrey">/{{ $tour->days }}days</span>
                                    </p>
                                    <div class="flex items-center justify-end gap-1">
                                        <div class="flex w-4 h-4 shrink-0">
                                            <img src="{{ asset('assets/icons/Star.svg') }}" alt="icon">
                                        </div>
                                        <span class="font-semibold text-sm leading-[21px]">4.8</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Packet tour tidak tersedia.</p>
                @endforelse
            </div>
        </div>
        <div id="discover" class="px-4">
            <div
                class="w-full h-[160px] lg:h-[400px] flex flex-col gap-[10px] rounded-[22px] items-center overflow-hidden relative">
                <img src="{{ asset('assets/backgrounds/travel.png') }}" class="object-cover object-center w-full h-full"
                    alt="background">
                <div class="absolute z-10 flex flex-col gap-[10px] transform -translate-y-1/2 top-1/2 left-4">
                    <p class="text-white font-semibold lg:text-[18px]">
                        <span>Experience the beauty and rich culture of Bali.</span>
                        <span class="hidden lg:block lg:w-1/2">From the stunning beaches of Kuta to the tranquil rice
                            terraces
                            of Ubud, Bali offers a perfect blend of relaxation and
                            adventure. Immerse yourself in traditional Balinese ceremonies,
                            explore vibrant markets, and savor the exquisite cuisine.
                            Whether you seek spiritual rejuvenation or thrilling escapades,
                            Bali has something extraordinary for everyone.</span>
                        <br />
                        Beauty of Bali
                    </p>
                    <a href=""
                        class="bg-[#129E85] p-[8px_24px] rounded-[10px] text-white font-semibold text-xs w-fit lg:text-md">Discover</a>
                </div>
            </div>
        </div>
        <h2 class="px-4 font-semibold lg:text-2xl md:text-2xl">
            More to Explore
        </h2>
        <div id="explore" class="flex flex-col gap-3 px-4 lg:grid lg:grid-cols-3 md:grid md:grid-cols-2">
            @forelse ($packageTours as $tour)
                <a href="{{ route('front.details', $tour->slug) }}" class="card">
                    <div class="bg-white p-4 flex flex-col gap-3 rounded-[26px] shadow-[6px_8px_20px_0_#00000008]">
                        <div class="w-full h-full aspect-[311/150] rounded-xl overflow-hidden">
                            <img src="{{ Storage::url($tour->thumbnail) }}"
                                class="object-cover object-center w-full h-full" alt="thumbnail">
                        </div>
                        <div class="flex justify-between gap-2">
                            <div class="flex flex-col gap-1">
                                <p class="font-semibold two-lines">{{ $tour->name }}</p>
                                <div class="flex items-center gap-1">
                                    <div class="flex w-4 h-4 shrink-0">
                                        <img src="assets/icons/location-map.svg" alt="icon">
                                    </div>
                                    <span class="text-sm text-darkGrey tracking-035">{{ $tour->location }}</span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-1 text-right">
                                <p class="text-sm leading-[21px]">
                                    <span class="font-semibold text-[#129E85] text-nowrap">Rp
                                        {{ number_format($tour->price, 0, ',', '.') }}</span><br>
                                    <span class="text-darkGrey">/{{ $tour->days }}days</span>
                                </p>
                                <div class="flex items-center justify-end gap-1">
                                    <div class="flex w-4 h-4 shrink-0">
                                        <img src="{{ asset('assets/icons/Star.svg') }}" alt="icon">
                                    </div>
                                    <span class="font-semibold text-sm leading-[21px]">5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <p>Packet tour tidak tersedia.</p>
            @endforelse
        </div>
    </section>

    @auth
        <div
            class="navigation-bar fixed bottom-0 z-50 w-full h-[85px] bg-white rounded-t-[25px] flex items-center justify-evenly py-[45px]">

            <a href="{{ route('front.index') }}" class="menu">
                <div class="flex flex-col justify-center gap-1 w-fit">
                    <div class="flex w-4 h-4 mx-auto overflow-hidden shrink-0">
                        <img src="{{ asset('assets/icons/home.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Home</p>
                </div>
            </a>
            <a href="{{ route('dashboard.bookings') }}" class="menu">
                <div class="flex flex-col justify-center gap-1 w-fit">
                    <div class="flex w-4 h-4 mx-auto overflow-hidden shrink-0">
                        <img src="{{ asset('assets/icons/schedule.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Schedule</p>
                </div>
            </a>
            @role('customer')
                <a href="/profile" class="menu">
                    <div class="flex flex-col justify-center gap-1 w-fit">
                        <div class="flex w-4 h-4 mx-auto overflow-hidden shrink-0">
                            <img src="{{ asset('assets/icons/profile.svg') }}" alt="icon">
                        </div>
                        <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Profile</p>
                    </div>
                </a>
            @endrole
            @role('super_admin')
                <a href="{{ route('dashboard') }}" class="menu">
                    <div class="flex flex-col justify-center gap-1 w-fit">
                        <div class="flex w-4 h-4 mx-auto overflow-hidden shrink-0">
                            <img src="{{ asset('assets/icons/dashboard.svg') }}" alt="icon">
                        </div>
                        <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Dashboard</p>
                    </div>
                </a>
            @endrole

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="menu">
                    <div class="flex flex-col justify-center gap-1 w-fit">
                        <div class="flex w-4 h-4 mx-auto overflow-hidden shrink-0">
                            <img src="{{ asset('assets/icons/logout.svg') }}" alt="icon">
                        </div>
                        <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Logout</p>
                    </div>
                </button>
            </form>
            <div class="hidden lg:flex lg:flex-col lg:items-center md:flex md:flex-col">
                <span class="lg:text-xs md:text-xs">&copy; 2024 <span
                        class="lg:text-[#129E85] md:text-[#129E85] lg:font-extrabold md:font-extrabold">Travel</span>GW</span>
                <span class="lg:text-xs lg:mb-1 md:text-xs md:mb-1">All rights reserved.</span>
            </div>
        </div>
    @endauth
    @guest
        <div
            class="navigation-bar fixed bottom-0 z-50 w-full h-[85px] bg-white rounded-t-[25px] flex items-center justify-evenly py-[45px]">
            <a href="{{ route('front.index') }}" class="menu">
                <div class="flex flex-col justify-center gap-1 w-fit">
                    <div class="flex w-4 h-4 mx-auto overflow-hidden shrink-0">
                        <img src="{{ asset('assets/icons/home.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Home</p>
                </div>
            </a>
            <a href="{{ route('login') }}" class="menu">
                <div class="flex flex-col justify-center gap-1 w-fit">
                    <div class="flex w-4 h-4 mx-auto overflow-hidden shrink-0">
                        <img src="{{ asset('assets/icons/signin.svg') }}" alt="icon">
                    </div>
                    <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Sign In</p>
                </div>
            </a>
        </div>
    @endguest
@endsection

@push('after-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('js/flickity-slider.js') }}"></script>
    <script src="{{ asset('js/two-lines-text.js') }}"></script>
@endpush
