<x-app-layout>
    @role('super_admin')
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Profile') }}
            </h2>
        </x-slot>
    @endrole

    @role('customer')
        <div class="pt-5 pb-32">
        @endrole
        @role('super_admin')
            <div class="py-12">
            @endrole
            <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                <div class="p-4 bg-white shadow sm:p-8 sm:rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 bg-white shadow sm:p-8 sm:rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 bg-white shadow sm:p-8 sm:rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
        @role('customer')
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
        @endrole
</x-app-layout>

@push('after-scripts')
    <script>
        document.getElementById('logout-button').addEventListener('click', function() {
            this.classList.remove('opacity-25');
            document.getElementById('logout-form').submit();
        });
    </script>
@endpush
