@extends('front.layout.app')
@section('content')
    <section
      id="content"
      class="w-full mx-auto bg-[#ECF3F6] min-h-screen flex flex-col gap-8 pb-[120px] lg:px-10 lg:pb-5 md:px-10"
    >
      <nav class="flex items-center justify-between w-full px-4 mt-8">
        <a href="{{ route('front.details', $packageTour->slug) }}">
          <img src="{{ asset('assets/icons/back.png') }}" alt="back" />
        </a>
        <p class="m-auto font-semibold text-center lg:text-xl md:text-lg">Booking</p>
        <div class="w-12"></div>
      </nav>
      <div class="lg:grid lg:grid-cols-2">
        <form method="POST" action="{{ route('front.book.store', $packageTour->slug) }}" class="flex flex-col gap-8">
            @csrf
          <div class="flex flex-col gap-3 px-4">
            <p class="font-semibold lg:text-lg md:text-lg">Start Date</p>
            <div
              class="flex items-center gap-[10px] bg-white p-[16px_24px] rounded-[37px] transition-all duration-300"
            >
              <input
                type="date" name="start_date" id="start_date"
                class="appearance-none outline-none w-full relative text-sm tracking-035 leading-[22px] [&::-webkit-calendar-picker-indicator]:absolute [&::-webkit-calendar-picker-indicator]:w-full [&::-webkit-calendar-picker-indicator]:h-full [&::-webkit-calendar-picker-indicator]:opacity-0 lg:text-base md:text-base"
              />
              <div class="flex w-6 h-6 shrink-0">
                <img
                  src="{{ asset('assets/icons/calendar-blue.svg') }}"
                  class="w-full h-full"
                  alt="icon"
                />
              </div>
            </div>
          </div>
          <div class="flex flex-col gap-3 px-4">
            <p class="font-semibold lg:text-lg md:text-lg">Trip Destination</p>
            <div class="bg-white p-4 rounded-[26px] flex items-center gap-3">
              <div
                class="w-[72px] h-[72px] flex shrink-0 rounded-xl overflow-hidden"
              >
                <img
                  src="{{ Storage::url($packageTour->thumbnail) }}"
                  class="object-cover object-center w-full h-full"
                  alt="thumbnail"
                />
              </div>
              <div class="flex flex-col gap-1">
                <p class="font-semibold text-sm tracking-035 leading-[22px] lg:text-base md:text-base">
                  {{ $packageTour->name }}
                </p>
                <div class="flex items-center gap-1">
                  <div class="w-4 h-4">
                    <img
                      src="{{ asset('assets/icons/location-map.svg') }}"
                      class="w-4 h-4"
                      alt="icon"
                    />
                  </div>
                  <span
                    class="text-darkGrey text-sm tracking-035 leading-[22px] md:text-base"
                    >{{ $packageTour->location }}</span
                  >
                </div>
              </div>
              <div class="flex items-center justify-end flex-1 gap-2">
                <button type="button" id="remove-quantity">
                  <img src="{{ asset('assets/icons/minus-square.svg') }}" alt="icon" />
                </button>
                <p id="quantity" class="text-sm font-semibold lg:text-base md:text-base">1</p>
                <input
                  type="hidden"
                  name="quantity"
                  id="quantity_input"
                  value="1"
                />
                <input
                  type="hidden"
                  name="packageTourPrice"
                  id="packageTourPrice"
                  value="{{ $packageTour->price }}"
                />
                <button type="button" id="add-quantity">
                  <img src="{{ asset('assets/icons/add-square.svg') }}" alt="icon" />
                </button>
              </div>
            </div>
          </div>
          <div class="flex flex-col gap-3 px-4">
            <p class="font-semibold lg:text-lg md:text-lg">Contact Details</p>
            <div
              class="bg-white p-[16px_24px] rounded-[26px] flex flex-col gap-3"
            >
              <div
                class="flex justify-between items-center text-sm tracking-035 leading-[22px]"
              >
                <p class="lg:text-base md:text-base">Name</p>
                <p class="font-semibold lg:text-base md:text-base">{{ Auth::user()->name }}</p>
              </div>
              <div
                class="flex justify-between items-center text-sm tracking-035 leading-[22px]"
              >
                <p class="lg:text-base md:text-base">Email</p>
                <p class="font-semibold lg:text-base md:text-base">{{ Auth::user()->email }}</p>
              </div>
              <div
                class="flex justify-between items-center text-sm tracking-035 leading-[22px]"
              >
                <p class="lg:text-base md:text-base">Phone</p>
                <p class="font-semibold lg:text-base md:text-base">+{{ Auth::user()->phone_number }}</p>
              </div>
            </div>
          </div>
          <div class="flex flex-col gap-3 px-4">
            <p class="font-semibold lg:text-lg md:text-lg">Payment Summary</p>
            <div
              class="bg-white p-[16px_24px] rounded-[26px] flex flex-col gap-3"
            >
              <div
                class="flex justify-between items-center text-sm tracking-035 leading-[22px]"
              >
                <p class="lg:text-base md:text-base">Sub Total</p>
                <p id="subtotal" class="font-semibold lg:text-base md:text-base"></p>
              </div>
              <div
                class="flex justify-between items-center text-sm tracking-035 leading-[22px]"
              >
                <p class="lg:text-base md:text-base">
                  Insurance
                  <span class="text-darkGrey"
                    >x<span id="total_quantity"></span
                  ></span>
                </p>
                <p id="insurance" class="font-semibold lg:text-base"></p>
              </div>
              <div
                class="flex justify-between items-center text-sm tracking-035 leading-[22px]"
              >
                <p class="lg:text-base md:text-base">Tax 10%</p>
                <p id="tax" class="font-semibold lg:text-base md:text-base"></p>
              </div>
            </div>
          </div>

          <div
            class="navigation-bar fixed lg:static md:static bottom-0 z-50 w-full h-[85px] bg-[#E27C5B] rounded-t-[25px] lg:rounded-b-[25px] md:rounded-b-[25px] flex items-center justify-between px-6 shadow-[-6px_-8px_20px_0_#00000008] lg:w-[96%] lg:mx-auto md:w-[96%] md:mx-auto"
          >
            <div class="flex flex-col justify-center gap-1">
              <p class="text-white text-sm tracking-035 leading-[22px]">
                Grand Total
              </p>
              <p
                id="grandtotal"
                class="text-white font-semibold text-lg leading-[26px] tracking-[0.6px]"
              ></p>
            </div>
            <button
              type="submit"
              class="p-[16px_24px] rounded-xl bg-blue w-fit text-black hover:bg-[#129E85] hover:text-white transition-all duration-300 bg-[#ECF3F6]"
            >
              Booking
            </button>
          </div>
        </form>
        <div class="hidden lg:block">
          <div class="flex items-center justify-center">
            <img
              src="{{ asset('assets/backgrounds/booking.png') }}"
              alt="booking"
              class="object-cover lg:w-[90%]"
            />
          </div>
        </div>
      </div>
    </section>
@endsection

@push('after-scripts')
    <script src="{{ asset('js/booking.js') }}"></script>
@endpush
