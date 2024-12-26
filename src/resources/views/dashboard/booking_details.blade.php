@extends('front.layout.app')
@section('content')
    <section id="content" class="w-full mx-auto bg-[#ECF3F6] min-h-screen flex flex-col gap-8 pb-20 lg:px-32 md:px-20">
        <nav class="flex items-center justify-between w-full px-4 mt-8">
            <a href="{{ route('dashboard.bookings') }}">
                <img src="{{ asset('assets/icons/back.png') }}" alt="back">
            </a>
            <p class="m-auto font-semibold text-center lg:text-xl md:text-lg">Trip Details</p>
            <div class="w-12"></div>
        </nav>
        <div class="flex flex-col gap-8">
            <div class="flex flex-col gap-3 px-4 ">
                <p class="font-semibold lg:text-lg md:text-base">Detail Trip</p>
                <div class="bg-white p-4 rounded-[26px] flex items-center gap-5">
                    <div class="w-[72px] h-[72px] flex shrink-0 rounded-xl overflow-hidden lg:w-24 md:w-24">
                        <img src="{{ Storage::url($packageBooking->package_tour->thumbnail) }}"
                            class="object-cover object-center w-full h-full" alt="thumbnail">
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold text-sm tracking-035 leading-[22px] lg:text-base">
                            {{ $packageBooking->package_tour->name }}
                        </p>
                        <div class="flex items-center gap-1">
                            <div class="w-4 h-4">
                                <img src="{{ asset('assets/icons/calendar-grey.svg') }}" class="w-4 h-4" alt="icon">
                            </div>
                            <span
                                class="text-darkGrey text-sm tracking-035 leading-[22px] lg:text-base">{{ $packageBooking->start_date->format('M d, Y') }}
                                - {{ $packageBooking->end_date->format('M d, Y') }}</span>
                        </div>
                        @if ($packageBooking->is_paid)
                            <div
                                class="success-badge w-fit border border-[#129E85] p-[4px_8px] rounded-lg bg-[#ECF3F6] flex items-center justify-center">
                                <span class="text-xs leading-[22px] tracking-035 text-[#129E85] lg:text-sm">Success
                                    Paid</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-3 px-4 ">
                <p class="font-semibold lg:text-lg md:text-base">Contact Details</p>
                <div class="bg-white p-[16px_24px] rounded-[26px] flex flex-col gap-3">
                    <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                        <p class="lg:text-base">Name</p>
                        <p class="font-semibold lg:text-base">{{ $packageBooking->user->name }}</p>
                    </div>
                    <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                        <p class="lg:text-base">Email</p>
                        <p class="font-semibold lg:text-base">{{ $packageBooking->user->email }}</p>
                    </div>
                    <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                        <p class="lg:text-base">Phone</p>
                        <p class="font-semibold lg:text-base">+{{ $packageBooking->user->phone_number }}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-3 px-4 ">
                <p class="font-semibold lg:text-lg md:text-base">Payment Summary</p>
                <div class="bg-white p-[16px_24px] rounded-[26px] flex flex-col gap-3">
                    <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                        <p class="text-base">Sub Total</p>
                        <p id="subtotal" class="font-semibold text-blue lg:text-base">Rp {{ number_format($packageBooking->sub_total, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                        <p class="text-base">Insurance <span class="text-darkGrey">x <span
                                    id="total_quantity">2</span></span></p>
                        <p id="insurance" class="font-semibold text-blue lg:text-base">Rp {{ number_format($packageBooking->insurance, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                        <p class="lg:text-base">Tax 10%</p>
                        <p id="tax" class="font-semibold text-blue lg:text-base">Rp {{ number_format($packageBooking->tax, 0, ',', '.') }}</p>
                    </div>
                    <hr>
                    <div class="flex justify-between items-center text-sm tracking-035 leading-[22px] h-[55px]">
                        <p class="font-semibold lg:text-xl lg:font-bold md:font-bold md:text-lg">Total Payment</p>
                        <p id="tax" class="font-semibold text-base lg:text-lg md:text-lg tracking-[0.6px]">Rp
                            {{ number_format($packageBooking->total_amount, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-3 px-4 ">
                <a href="#"
                    class="p-[16px_24px] rounded-xl bg-[#E27C5B] w-full text-white text-center flex items-center justify-center gap-3  hover:bg-[#129E85] transition-all duration-300">
                    <div class="w-6 h-6">
                        <img src="{{ asset('assets/icons/messages.svg') }}" alt="icon">
                    </div>
                    <span>Contact Travel Agent</span>
                </a>
            </div>
        </div>
    </section>
@endsection
