<?php

namespace App\Http\Controllers\Backend\Coupon;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupon = Coupon::get();
        return view('backend.coupon.index', compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'code'=>'required|string|max:255|unique:coupons,code',
            'valid_from'=>'required|date|date_format:format',
            'valid_until'=>'required|date',
            'discount'=>'required|decimal:8,2'
        ]);

        try {
            if (Coupon::create($validated))
                return redirect()->route('coupon.index')->with('ok', 'Data Saved');
            else
                return redirect()->back()->withInput()->with('failed', 'Please try again');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('failed', 'Please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        // $coupon = Coupon::findOrFail($coupon);
        return view('backend.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $validated = $request->validate([
            'code' => 'nullable|string|max:255|unique:coupons,code',
            'valid_from' => 'nullable|date|date_format:format',
            'valid_until' => 'nullable|date',
            'discount' => 'nullable|decimal:8,2'
        ]);

        try {
            if ($coupon->update($validated))
                return redirect()->route('coupon.index')->with('ok', 'Data Saved');
            else
                return redirect()->back()->withInput()->with('failed', 'Please try again');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('failed', 'Please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        if ($coupon->delete()){
            return redirect()->back()->with('ok', 'Data Deleted');
        }
        return redirect()->back()->with('failed', 'Please Retry');
    }
}
