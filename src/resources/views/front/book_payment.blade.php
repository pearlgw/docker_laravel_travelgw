@extends('front.layout.app')
@section('content')
    <section id="content"
        class="w-full mx-auto bg-[#ECF3F6] min-h-screen flex flex-col gap-8 pb-[120px] md:pb-10 md:px-10 lg:px-20">
        <nav class="flex items-center justify-between w-full px-4 mt-8">
            {{-- <a href="checkout.html">
          <img src="assets/icons/back.png" alt="back" />
        </a> --}}
            <p class="m-auto font-semibold text-center md:text-xl">Payment</p>
            <div class="w-12"></div>
        </nav>
        <form action="{{ route('front.book_payment_store', $packageBooking->id) }}" method="POST" class="flex flex-col gap-8" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="flex flex-col gap-3 px-4">
                <p class="font-semibold md:text-lg">Detail Trip</p>
                <div class="bg-white p-4 rounded-[26px] flex items-center gap-3">
                    <div class="w-[72px] h-[72px] flex shrink-0 rounded-xl overflow-hidden">
                        <img src="{{ Storage::url($packageBooking->package_tour->thumbnail) }}" class="object-cover object-center w-full h-full"
                            alt="thumbnail" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold text-sm tracking-035 leading-[22px] md:text-base">
                            {{ $packageBooking->package_tour->name }}
                        </p>
                        <div class="flex items-center gap-1">
                            <div class="w-4 h-4">
                                <img src="{{ asset('assets/icons/calendar-grey.svg') }}" class="w-4 h-4" alt="icon" />
                            </div>
                            <span class="text-darkGrey text-sm tracking-035 leading-[22px] md:text-base">{{ $packageBooking->start_date->format('M d, Y') }}
                            - {{ $packageBooking->end_date->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-3 px-4">
                <p class="font-semibold md:text-lg">Payment Transfer to</p>
                <div class="bg-white p-[16px_24px] rounded-[26px] flex flex-col gap-4">
                    <div class="flex flex-col gap-1">
                        <p class="text-darkGrey text-sm tracking-035 leading-[22px] md:text-base">
                            Bank Name
                        </p>
                        <div class="flex items-center gap-2">
                            <div class="w-[35px] h-[25px] flex shrink-0 overflow-hidden">
                                <img src="{{ Storage::url($packageBooking->package_bank->logo) }}" class="object-contain object-center w-full h-full"
                                    alt="logo" />
                            </div>
                            <span class="text-sm tracking-035 leading-[22px] md:text-base">{{ $packageBooking->package_bank->bank_name }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="text-darkGrey text-sm tracking-035 leading-[22px] md:text-base">
                            Bank Account
                        </p>
                        <div class="flex items-center gap-2">
                            <div class="flex w-6 h-6 overflow-hidden shrink-0">
                                <img src="{{ asset('assets/icons/bank.svg') }}" class="object-contain object-center w-full h-full"
                                    alt="logo" />
                            </div>
                            <span class="text-sm tracking-035 leading-[22px] md:text-base">{{ $packageBooking->package_bank->bank_account_name }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="text-darkGrey text-sm tracking-035 leading-[22px] md:text-base">
                            Account Number
                        </p>
                        <div class="flex items-center gap-2">
                            <div class="flex w-6 h-6 overflow-hidden shrink-0">
                                <img src="{{ asset('assets/icons/moneys.svg') }}" class="object-contain object-center w-full h-full"
                                    alt="logo" />
                            </div>
                            <span id="bank-number" class="text-sm tracking-035 leading-[22px] md:text-base"
                                data-value="7342333056">{{ $packageBooking->package_bank->bank_account_number }}</span>
                            <button type="button"
                                class="font-semibold text-sm tracking-035 leading-[22px] text-blue w-fit ml-auto md:text-base"
                                data-copy="bank-number" onclick="copyText(this)">
                                Copy
                            </button>
                        </div>
                    </div>
                    <hr />
                    <div class="flex flex-col gap-1">
                        <p class="text-darkGrey text-sm tracking-035 leading-[22px] md:text-base">
                            Total Payment
                        </p>
                        <div class="flex items-center justify-between">
                            <span id="total-payment"
                                class="font-semibold text-lg tracking-[0.6px] leading-[26px] md:text-base"
                                data-value="2500000">Rp {{ number_format($packageBooking->total_amount, 0, ',', '.') }}</span>
                            <button type="button"
                                class="font-semibold text-sm tracking-035 leading-[22px] text-blue w-fit ml-auto md:text-base"
                                data-copy="total-payment" onclick="copyText(this)">
                                Copy
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-3 px-4">
                <div class="flex flex-col gap-1">
                    <p class="font-semibold md:text-lg">Transfer Proof</p>
                    <p class="text-xs leading-[20px] tracking-035 text-darkGrey md:text-base">
                        After you make the transfer, please upload your proof of payment
                        to confirm transaction.
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" id="upload-file"
                        class="bg-white border border-[#BFBFBF] p-[16px_0_16px_12px] rounded-[10px] overflow-hidden w-full">
                        <p id="placeholder"
                            class="text-nowrap text-darkGrey text-sm tracking-035 leading-[22px] text-left md:text-base">
                            Upload transfer proof
                        </p>
                        <div id="file-info" class="flex flex-row items-center hidden gap-3 flex-nowrap">
                            <div class="flex w-6 h-6 shrink-0">
                                <img src="{{ asset('assets/icons/gallery.svg') }}" alt="icon" />
                            </div>
                            <span id="fileName" class="text-sm text-nowrap md:text-base">victoria_watson_transfer</span>
                        </div>
                    </button>
                    <input type="file" name="proof" id="file" class="hidden" />
                </div>
                <div
                    class="w-full h-[130px] md:h-[180px] lg:h-[180px] flex flex-col gap-[10px] rounded-[22px] items-center overflow-hidden relative">
                    <img src="{{ asset('assets/backgrounds/travel.png') }}" class="object-cover object-center w-full h-full"
                        alt="background" />
                    <div class="absolute z-10 flex flex-col gap-[7px] transform -translate-y-1/2 top-1/2 left-4">
                        <p class="text-base text-white md:text-2xl">Claim Your Reward</p>
                        <p class="text-sm text-white md:text-xl">Checkout today and get reward!</p>
                    </div>
                </div>
            </div>
            <div
                class="navigation-bar fixed bottom-0 z-50 w-full h-[85px] bg-[#E27C5B] rounded-t-[25px] flex items-center justify-between px-6 shadow-[-6px_-8px_20px_0_#00000008] md:w-[96%] md:mx-auto md:static md:rounded-b-[25px] lg:w-[97%]">
                <div class="flex flex-col justify-center gap-1">
                    <p class="text-white text-sm tracking-035 leading-[22px] md:text-lg">
                        Total Payment
                    </p>
                    <p id="grandtotal" class="text-white font-semibold text-lg leading-[26px] tracking-[0.6px] md:text-xl">
                        Rp {{ number_format($packageBooking->total_amount, 0, ',', '.') }}
                    </p>
                </div>
                <button id="confirm-payment" type="submit"
                    class="p-[16px_24px] rounded-xl bg-[#ECF3F6] text-black w-fit hover:bg-[#129E85] hover:text-white transition-all duration-300 md:text-base">
                    Confirm
                </button>
            </div>
        </form>
    </section>
@endsection
@push('after-scripts')
    <script src="{{ asset('js/payment.js') }}"></script>
@endpush
