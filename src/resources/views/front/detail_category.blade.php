@extends('front.layout.app')
@section('content')
    <section id="content" class="w-full mx-auto bg-[#ECF3F6] min-h-screen flex flex-col gap-8 pb-10 md:px-10 lg:px-20">
        <nav class="flex items-center justify-between w-full px-4 mt-8">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/icons/back.png') }}" alt="back">
            </a>
            <p class="m-auto font-semibold text-center md:text-lg lg:text-xl">{{ $category->name }}</p>
            <div class="w-12"></div>
        </nav>
        <div class="flex flex-col gap-3 px-4 md:grid md:grid-cols-2">
            @forelse ($category->package_tour as $packageTour)
                <a href="{{ route('front.details', $packageTour) }}" class="card">
                    <div class="bg-white p-4 rounded-[26px] flex flex-col gap-3">
                        <div class="flex items-center gap-4">
                            <div class="w-[92px] h-[92px] flex shrink-0 rounded-xl overflow-hidden">
                                <img src="{{ Storage::url($packageTour->thumbnail) }}"
                                    class="object-cover object-center w-full h-full" alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="flex flex-wrap font-semibold lg:text-lg">{{ $packageTour->name }}</p>
                                <div class="flex items-center gap-1">
                                    <div class="flex w-4 h-4 shrink-0">
                                        <img src="{{ asset('assets/icons/location-map.svg') }}" alt="icon">
                                    </div>
                                    <span class="text-sm text-darkGrey tracking-035">{{ $packageTour->location }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-sm leading-[22px] tracking-[0.35px]">4</span>
                                <div class="flex items-center gap-1">
                                    <img src="{{ asset('assets/icons/Star.svg') }}" alt="Star">
                                    <img src="{{ asset('assets/icons/Star.svg') }}" alt="Star">
                                    <img src="{{ asset('assets/icons/Star.svg') }}" alt="Star">
                                    <img src="{{ asset('assets/icons/Star.svg') }}" alt="Star">
                                    <img src="{{ asset('assets/icons/Star-gray.svg') }}" alt="Star">
                                </div>
                            </div>
                            <p class="text-sm leading-[22px] tracking-035">
                                <span class="font-semibold text-[#129E85] text-nowrap">Rp
                                    {{ number_format($packageTour->price, 0, ',', '.') }}</span><span
                                    class="text-darkGrey">/{{ $packageTour->days }}days</span>
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <p>Tidak tersedia paket tour.</p>
            @endforelse
        </div>
    </section>
@endsection

@push('after-scripts')
    <script src="{{ asset('js/two-lines-text.js') }}"></script>
@endpush
