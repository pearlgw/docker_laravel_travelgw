@extends('front.layout.app')
@section('content')
    <section id="content"
        class="max-w-full w-full mx-auto bg-[#ECF3F6] min-h-screen flex flex-col gap-8 lg:px-11 pb-[120px] md:px-10">
        <nav class="flex items-center justify-between w-full px-4 mt-8">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/icons/back.png') }}" alt="back" />
            </a>
            <p class="m-auto font-semibold text-center md:text-xl">Schedule</p>
            <div class="w-12"></div>
        </nav>
        <div class="flex flex-col gap-3 px-4">
            <p class="font-semibold md:text-lg">My Packages</p>
            @forelse (Auth::user()->package_booking as $booking)
                <a href="{{ route('dashboard.booking.details', $booking->id) }}" class="card">
                    <div class="bg-white p-4 rounded-[26px] flex items-center gap-4">
                        <p class="text-center text-sm leading-[22px] tracking-035 md:w-16">
                            <span class="text-2xl font-semibold">{{ $booking->start_date->format('d') }}</span> <br>
                            {{ $booking->start_date->format('M') }} <br> {{ $booking->start_date->format('Y') }}
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="w-[92px] h-[92px] flex shrink-0 rounded-xl overflow-hidden md:w-32">
                                <img src="{{ Storage::url($booking->package_tour->thumbnail) }}"
                                    class="object-cover object-center w-full h-full" alt="thumbnail" />
                            </div>
                            <div class="flex flex-col gap-1 md:px-4 md:w-full">
                                <p class="font-semibold text-sm tracking-035 leading-[22px] md:text-lg">
                                    {{ $booking->package_tour->name }}
                                </p>
                                <p class="text-sm leading-[22px] tracking-035 text-darkGrey md:text-base">
                                    {{ $booking->package_tour->days }} days | {{ $booking->quantity }} packs
                                </p>
                                @if ($booking->is_paid)
                                    <div
                                        class="success-badge w-fit border border-[#129E85] p-[4px_8px] rounded-lg bg-[#ECF3F6] flex items-center justify-center">
                                        <span
                                            class="text-xs leading-[22px] tracking-035 text-[#129E85] md:text-base">Success
                                            Paid</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <p>Anda belum pernah melakukan booking.</p>
            @endforelse
        </div>
    </section>
    <div
        class="navigation-bar fixed bottom-0 z-50 w-full h-[85px] bg-white rounded-t-[25px] flex items-center justify-evenly py-[45px]">
        <a href="{{ route('front.index') }}" class="menu">
            <div class="flex flex-col justify-center gap-1 w-fit">
                <div class="flex w-4 h-4 mx-auto overflow-hidden shrink-0">
                    <img src="{{ asset('assets/icons/home.svg') }}" alt="icon" />
                </div>
                <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">
                    Home
                </p>
            </div>
        </a>
        <a href="{{ route('dashboard.bookings') }}" class="menu">
            <div class="flex flex-col justify-center gap-1 w-fit">
                <div class="flex w-4 h-4 mx-auto overflow-hidden shrink-0">
                    <img src="{{ asset('assets/icons/schedule.svg') }}" alt="icon" />
                </div>
                <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">
                    Schedule
                </p>
            </div>
        </a>
        @role('customer')
            <a href="/profile" class="menu">
                <div class="flex flex-col justify-center gap-1 w-fit">
                    <div class="flex w-4 h-4 mx-auto overflow-hidden shrink-0">
                        <img src="{{ asset('assets/icons/profile.svg') }}" alt="icon" />
                    </div>
                    <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">
                        Profile
                    </p>
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
                        <img src="{{ asset('assets/icons/logout.svg') }}" alt="icon" />
                    </div>
                    <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">
                        Logout
                    </p>
                </div>
            </button>
        </form>
        <div class="hidden lg:flex lg:flex-col lg:items-center md:flex md:flex-col">
            <span class="lg:text-xs md:text-xs">&copy; 2024 <span
                    class="lg:text-[#129E85] md:text-[#129E85] lg:font-extrabold md:font-extrabold">Travel</span>GW</span>
            <span class="lg:text-xs lg:mb-1 md:text-xs md:mb-1">All rights reserved.</span>
        </div>
    </div>
@endsection
