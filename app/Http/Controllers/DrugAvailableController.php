<?php

namespace App\Http\Controllers;

use App\Models\DrugAvailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrugAvailableController extends Controller
{
    public function registerPage() {
        return view('drug.drug_register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'actual_price' => 'required',
            'quantity' => 'required'
        ],
        [
            'name.required' => 'Name of the drug is required',
            'actual_price.required' => 'Pharmacist selling price is required',
            'quantity.required' => 'Quantity to store is required'
        ]);

        $checkAvailability = DrugAvailable::where('name', $request->name)->first();
        if($checkAvailability) {
            return back()->with(['error' => 'Drug already recorded in store']);
            // return back()->with('error', 'Drug already recorded in store');
        }

        DrugAvailable::create([
            'pharmacy_id' => Auth::guard('pharmacy')->id(),
            'name' => $request->name,
            'quantity' => $request->quantity,
            'actual_price' =>$request->actual_price,
            'doctor_gain' => $request->actual_price * 0.2,
            'selling_price' => $request->actual_price * 1.2
        ]);

        return redirect()->route('pharmacy.home');
    }

    public function updatePage() {
        return view('drug.drug_update');
    }

    public function update(Request $request) {
        $storeData = DrugAvailable::select('quantity', 'actual_price')->where('name', $request->name)->first();
        $newPrice = $request->new_price ?? $storeData->actual_price;
        DrugAvailable::where('name', $request->name)->update([
            'quantity' => $storeData->quantity + $request->quantity,
            'actual_price' => $newPrice,
            'doctor_gain' => $newPrice * 0.2,
            'selling_price' => $newPrice * 1.2,
        ]);

        return redirect()->route('pharmacy.home');
    }

    public function drugSearch() {
        return view('drug.drug_search');
    }

    public function drugToBuy(Request $request) {
        $quantityInStore = DrugAvailable::where('name', $request->name)->first();
        return view('drug.drug_buy', ['quantityInStore' => $quantityInStore]);
    }

    public function drugBuy(Request $request) {
        $quantityInStore = DrugAvailable::where('name', $request->name)->value('quantity');
        if($quantityInStore < $request->quantity) {
            return back()->with('error', 'We do not have such quantity in store');
        }
        DrugAvailable::where('name', $request->name)->update([
            'quantity' => $quantityInStore - $request->quantity
        ]);

        return redirect()->route('doctor.home');
    }
}
