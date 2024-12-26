@extends('front.layout.app')
@section('content')
    {{-- <section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen">
        <div class="w-full min-h-screen flex flex-col items-center justify-center py-[46px] px-4 gap-8">
          <div class="w-[calc(100%-26px)] rounded-[20px] overflow-hidden relative">
            <img src="assets/backgrounds/Asset.png" class="object-contain w-full h-full" alt="background">
          </div>
          <form action="{{ route('login') }}" class="flex flex-col w-full bg-white p-[24px_16px] gap-8 rounded-[22px] items-center" method="POST">
          @csrf
            <div class="flex flex-col gap-1 text-center">
              <h1 class="font-semibold text-2xl leading-[42px] ">Sign In</h1>
              <p class="text-sm leading-[25px] tracking-[0.6px] text-darkGrey">Welcome Back! Enter your valid data</p>
            </div>
            <div class="flex flex-col gap-[15px] w-full max-w-[311px]">
              <div class="flex flex-col w-full gap-1">
                <p class="font-semibold">Email</p>
                <div class="flex items-center gap-3 p-[16px_12px] border border-[#BFBFBF] rounded-xl focus-within:border-[#4D73FF] transition-all duration-300">
                  <div class="flex w-4 h-4 shrink-0">
                    <img src="assets/icons/sms.svg" alt="icon">
                  </div>
                  <input type="email" class="appearance-none outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" name="email" placeholder="Your email address">
                </div>
              </div>
              <div class="flex flex-col w-full gap-1">
                <p class="font-semibold">Password</p>
                <div class="flex items-center gap-3 p-[16px_12px] border border-[#BFBFBF] rounded-xl focus-within:border-[#4D73FF] transition-all duration-300">
                  <div class="flex w-4 h-4 shrink-0">
                    <img src="assets/icons/password-lock.svg" alt="icon">
                  </div>
                  <input type="password" class="appearance-none outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" placeholder="Enter your valid password" name="password">
                </div>
              </div>
            </div>
            <button type="submit" class="bg-[#4D73FF] p-[16px_24px] w-full max-w-[311px] rounded-[10px] text-center text-white font-semibold hover:bg-[#06C755] transition-all duration-300">Sign In</button>
            <p class="text-sm text-center tracking-035 text-darkGrey">Don’t have account? <a href="{{ route('register') }}" class="text-[#4D73FF] font-semibold tracking-[0.6px]">Sign Up</a></p>
          </form>
        </div>
    </section> --}}
    <section id="content" class="max-w-full mx-auto bg-[#B2D1CD] min-h-screen lg:px-20">
        <div class="w-full min-h-screen flex flex-col lg:flex-row items-center justify-center py-[46px] px-4 gap-8 lg:px-0 md:px-14">
          <div class="lg:w-3/4 md:w-1/3 rounded-[20px] overflow-hidden relative">
            <img src="{{ asset('assets/backgrounds/login.png') }}" class="object-contain w-full h-full" alt="background">
          </div>
          <form action="{{ route('login') }}" method="POST" class="flex flex-col w-full bg-white p-[24px_16px] gap-8 rounded-[22px] items-center">
            @csrf
            <div class="flex flex-col gap-1 text-center">
              <h1 class="font-semibold text-2xl leading-[42px] ">Sign In</h1>
              <p class="text-sm leading-[25px] tracking-[0.6px] text-darkGrey">Welcome Back! Enter your valid data</p>
            </div>
            <div class="flex flex-col gap-[15px] w-full max-w-full md:px-10">
              <div class="flex flex-col w-full gap-1">
                <p class="font-semibold">Email</p>
                <div class="flex items-center gap-3 p-[16px_12px] border border-[#BFBFBF] rounded-xl focus-within:border-[#129E85] transition-all duration-300">
                  <div class="flex w-4 h-4 shrink-0">
                    <img src="assets/icons/sms.svg" alt="icon">
                  </div>
                  <input type="email" class="appearance-none outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" name="email" placeholder="Your email address">
                </div>
              </div>
              <div class="flex flex-col w-full gap-1">
                <p class="font-semibold">Password</p>
                <div class="flex items-center gap-3 p-[16px_12px] border border-[#BFBFBF] rounded-xl focus-within:border-[#129E85] transition-all duration-300">
                  <div class="flex w-4 h-4 shrink-0">
                    <img src="assets/icons/password-lock.svg" alt="icon">
                  </div>
                  <input type="password" class="appearance-none outline-none w-full text-sm placeholder:text-[#BFBFBF] tracking-[0.35px]" name="password" placeholder="Enter your valid password">
                </div>
              </div>
            </div>
            <button type="submit" class="bg-[#129E85] p-[16px_24px] w-full max-w-[311px] rounded-[10px] text-center text-white font-semibold hover:bg-[#E27C5B] transition-all duration-300">Sign In</button>
            <p class="text-sm text-center tracking-035 text-darkGrey">Don’t have account? <a href="{{ route('register') }}" class="text-[#129E85] font-semibold tracking-[0.6px]">Sign Up</a></p>
          </form>
        </div>
    </section>
@endsection
