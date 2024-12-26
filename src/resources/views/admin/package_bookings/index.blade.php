<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Bookings') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg gap-y-5">

                @forelse ($packageBookings as $booking)
                    <div class="flex flex-row items-center justify-between item-card">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($booking->package_tour->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold text-indigo-950">{{ $booking->package_tour->name }}</h3>
                                <p class="text-sm text-slate-500">{{ $booking->package_tour->category->name }}</p>
                            </div>
                        </div>
                        @if ($booking->is_paid)
                            <span class="px-3 py-2 text-sm font-bold text-white bg-[#3684BC] rounded-full w-fit">
                                SUCCESS
                            </span>
                        @else
                            <span class="px-3 py-2 text-sm font-bold text-white bg-[#FD6321] rounded-full w-fit">
                                PENDING
                            </span>
                        @endif

                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Price</p>
                            <h3 class="text-xl font-bold text-indigo-950">Rp {{ number_format($booking->package_tour->price, 0, ',', '.') }}</h3>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Total Days</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $booking->package_tour->days }} Days</h3>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Quantity</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $booking->quantity }} People</h3>
                        </div>
                        <div class="flex-row items-center hidden md:flex gap-x-3">
                            <a href="{{ route('admin.package_bookings.show', $booking) }}" class="px-6 py-4 font-bold text-white rounded-full bg-[#075B75]">
                                Details
                            </a>
                        </div>
                    </div>
                @empty
                    <p>Belum ada booking</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
