<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Details Booking') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg gap-y-5">

                <div class="flex flex-row items-center justify-between item-card">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($packageBooking->package_tour->thumbnail) }}" alt=""
                            class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-xl font-bold text-indigo-950">{{ $packageBooking->package_tour->name }}</h3>
                            <p class="text-sm text-slate-500">{{ $packageBooking->package_tour->category->name }}</p>
                        </div>
                    </div>

                    @if ($packageBooking->is_paid)
                        <span class="px-3 py-2 text-sm font-bold text-white bg-[#3684BC] rounded-full w-fit">
                            SUCCESS
                        </span>
                    @else
                        <span class="px-3 py-2 text-sm font-bold text-white bg-[#FD6321] rounded-full w-fit">
                            PENDING
                        </span>
                    @endif

                    <form action="{{ route('admin.package_bookings.update', $packageBooking) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="px-6 py-4 font-bold text-white bg-[#075B75] rounded-full">
                            Approve Transaction
                        </button>
                    </form>
                </div>

                <hr class="my-5">

                <div class="grid grid-cols-2 gap-5">
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col">
                            <p class="text-sm text-slate-500">Name</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $packageBooking->user->name }}
                            </h3>
                        </div>

                        <div class="flex flex-col">
                            <p class="text-sm text-slate-500">Email</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $packageBooking->user->email }}
                            </h3>
                        </div>

                        <div class="flex flex-col">
                            <p class="text-sm text-slate-500">Phone</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $packageBooking->user->phone_number }}
                            </h3>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col">
                            <p class="text-sm text-slate-500">Quantity</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $packageBooking->quantity }} people
                            </h3>
                        </div>

                        <div class="flex flex-col">
                            <p class="text-sm text-slate-500">Total Days</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $packageBooking->package_tour->days }} days
                            </h3>
                        </div>

                        <div class="flex flex-col">
                            <p class="text-sm text-slate-500">Date</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $packageBooking->start_date->format('M d, Y') }}
                                - {{ $packageBooking->end_date->format('M d, Y') }}
                            </h3>
                        </div>

                    </div>
                </div>

                <hr class="my-5">

                <div class="grid grid-cols-2 gap-5">
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col">
                            <p class="text-sm text-slate-500">Sub Total</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                Rp {{ number_format($packageBooking->sub_total, 0, ',', '.') }}
                            </h3>
                        </div>

                        <div class="flex flex-col">
                            <p class="text-sm text-slate-500">Insurance</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                Rp {{ number_format($packageBooking->insurance, 0, ',', '.') }}
                            </h3>
                        </div>

                        <div class="flex flex-col">
                            <p class="text-sm text-slate-500">Tax</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                Rp {{ number_format($packageBooking->tax, 0, ',', '.') }}
                            </h3>
                        </div>

                        <div class="flex flex-col">
                            <p class="text-sm text-slate-500">Total Amount</p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                Rp {{ number_format($packageBooking->total_amount, 0, ',', '.') }}
                            </h3>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-xl font-bold text-indigo-950">
                            Bukti Pembayaran
                        </h3>

                        <img src="{{ Storage::url($packageBooking->proof) }}" alt="" class="rounded-2xl object-cover w-[300px] h-[200px]">
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
