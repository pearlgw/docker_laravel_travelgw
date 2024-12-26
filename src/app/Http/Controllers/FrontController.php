<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageBookingCheckoutRequest;
use App\Http\Requests\StorePackageBookingRequest;
use App\Http\Requests\UpdatePackageBookingRequest;
use App\Models\Category;
use App\Models\PackageBank;
use App\Models\PackageBooking;
use App\Models\PackageTour;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
        $categories = Category::orderByDesc('id')->get();
        $packageTours = PackageTour::orderByDesc('id')->take(3)->get();
        return view('front.index', compact('packageTours', 'categories'));
    }

    public function category(Category $category){
        return view('front.detail_category', compact('category'));
    }

    public function details(PackageTour $packageTour){
        $photos = $packageTour->package_photo()->orderByDesc('id')->take(3)->get();
        return view('front.details', compact('packageTour', 'photos'));
    }

    public function book(PackageTour $packageTour){
        return view('front.booking', compact('packageTour'));
    }

    public function book_store(StorePackageBookingRequest $request, PackageTour $packageTour)
    {
        $user = Auth::user();
        // $bank = PackageBank::orderByDesc('id')->first();
        $packageBookingId = null;

        DB::transaction(function () use ($request, $user, $packageTour, &$packageBookingId) {
            $validated = $request->validated();

            // Mulai tanggal
            $start_date = new Carbon($validated['start_date']);
            $total_days = $packageTour->days - 1;
            $endDate = $start_date->addDays($total_days);

            // Menghitung subtotal, asuransi, dan pajak
            $sub_total = $packageTour->price * $validated['quantity'];
            $insurance = 300000 * $validated['quantity'];
            $tax = $sub_total * 0.10;

            // Menyiapkan data untuk disimpan
            $validated['end_date'] = $endDate;
            $validated['user_id'] = $user->id;
            $validated['is_paid'] = false;
            $validated['proof'] = 'dummytrx.png';
            $validated['package_tour_id'] = $packageTour->id;
            $validated['package_bank_id'] = 0;
            $validated['insurance'] = $insurance;
            $validated['tax'] = $tax;
            $validated['sub_total'] = $sub_total;
            $validated['total_amount'] = $sub_total + $tax + $insurance;

            // Membuat booking paket
            $packageBooking = PackageBooking::create($validated);

            // Menyimpan ID booking paket
            $packageBookingId = $packageBooking->id;
        });

        // Memeriksa apakah booking paket berhasil dibuat
        if ($packageBookingId) {
            return redirect()->route('front.choose_bank', $packageBookingId);
        } else {
            return back()->withErrors('Failed to create booking');
        }
    }

    public function choose_bank(PackageBooking $packageBooking){
        $user = Auth::user();
        if($packageBooking->user_id != $user->id){
            abort(403);
        }
        $banks = PackageBank::all();
        return view('front.choose_bank', compact('packageBooking', 'banks'));
    }

    public function choose_bank_store(UpdatePackageBookingRequest $request, PackageBooking $packageBooking){
        $user = Auth::user();
        if ($packageBooking->user_id != $user->id) {
            abort(403);
        }

        DB::transaction(function() use ($request, $packageBooking){
            $validated = $request->validated();
            $packageBooking->update([
                'package_bank_id' => $validated['package_bank_id']
            ]);
        });

        return redirect()->route('front.book_payment', $packageBooking->id);
    }

    public function book_payment(PackageBooking $packageBooking){
        return view('front.book_payment', compact('packageBooking'));
    }

    public function book_payment_store(StorePackageBookingCheckoutRequest $request, PackageBooking $packageBooking){
        $user = Auth::user();
        if ($packageBooking->user_id != $user->id) {
            abort(403);
        }

        DB::transaction(function () use ($request, $user, $packageBooking) {
            $validated = $request->validated();
            if($request->hasFile('proof')){
                $proofPath = $request->file('proof')->store('proofs', 'public');
                $validated['proof']= $proofPath;
            }

            $packageBooking->update($validated);
        });

        return redirect()->route('front.book_finish');
    }

    public function book_finish(){
        return view('front.book_finish');
    }
}
