@extends('front.layout.app')
@section('content')
    <section id="content" class="w-full mx-auto bg-[#ECF3F6] min-h-screen flex flex-col gap-8 pb-8 md:px-10">
        <nav class="flex items-center justify-between w-full px-4 mt-8">
            {{-- <a href="booking.html">
          <img src="{{ asset('assets/icons/back.png') }}" alt="back">
        </a> --}}
            <p class="m-auto font-semibold text-center lg:text-xl md:text-lg">Checkout</p>
            <div class="w-12"></div>
        </nav>
        <div class="flex flex-col justify-center h-full gap-8 px-4 lg:px-40 lg:grid lg:grid-cols-2">
            <div class="px-[35px] lg:max-w-full w-full flex justify-center shrink-0">
                <img src="{{ asset('assets/backgrounds/Bank-Account-Illustration.png') }}"
                    class="object-contain lg:max-w-full" alt="background">
            </div>
            <form action="{{ route('front.choose_bank_store', $packageBooking) }}" method="POST"
                class="flex flex-col gap-8">
                @csrf
                @method('PATCH')
                <div class="flex flex-col gap-3">
                    <p class="font-semibold lg:text-xl lg:mb-3 md:text-lg">Payment Method</p>
                    @foreach ($banks as $bank)
                        <div class="bg-white p-[16px_24px] rounded-[26px]">
                            <label for="bca" class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-[35px] h-[25px] flex shrink-0 overflow-hidden">
                                        <img src="{{ Storage::url($bank->logo) }}"
                                            class="object-contain object-center w-full h-full" alt="logo">
                                    </div>
                                    <span
                                        class="text-sm tracking-035 leading-[22px] lg:text-lg">{{ $bank->bank_name }}</span>
                                </div>
                                <input type="radio" name="package_bank_id" id="{{ $bank->id }}"
                                    value="{{ $bank->id }}"
                                    class="w-5 h-5 appearance-none checked:border-[3px] checked:border-solid checked:border-white rounded-full checked:bg-[#129E85] ring-2 ring-[#129E85]">
                            </label>
                        </div>
                    @endforeach
                </div>
                <button type="submit"
                    class="p-[16px_24px] rounded-xl bg-[#E27C5B] w-full text-white text-center hover:bg-[#129E85] transition-all duration-300">Checkout</button>
            </form>
        </div>
    </section>
@endsection
