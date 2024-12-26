@extends('front.layout.app')
@section('content')
    <section id="content" class="w-full mx-auto bg-blue min-h-screen bg-[#ECF3F6]">
        <div class="w-full min-h-screen flex flex-col items-center justify-center py-[46px] px-[28px] gap-8">
          <div class="w-[calc(100%-26px)] rounded-[20px] overflow-hidden flex justify-center mx-1">
            <img src="{{ asset('assets/backgrounds/Success-Illustration.png') }}" class="object-contain w-full h-full lg:w-2/6 md:w-3/5" alt="background">
          </div>
          <div class="flex flex-col gap-2 items-center text-center w-[319px] mx-auto">
            <p class="font-semibold text-[24px] lg:text-[28px] leading-[36px] lg:text-3xl">Transaction Success</p>
            <p class="lg:text-base md:text-xl">Ready to go! don't forget to check<br>your trip on Schedule Page</p>
          </div>
          <a href="{{ route('dashboard.bookings') }}" class="p-[16px_24px] rounded-xl bg-[#E27C5B] w-full lg:w-2/5 md:w-3/5 text-center font-semibold text-white hover:bg-[#129E85] transition-all duration-300 md:text-xl">Check Schedule Page</a>
        </div>
    </section>
@endsection
