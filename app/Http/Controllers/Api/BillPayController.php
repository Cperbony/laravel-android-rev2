<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillPayRequest;
use App\Http\Resources\BillPayCollection;
use App\Http\Resources\BillPayResource;
use App\Models\BillPay;

class BillPayController extends Controller
{
    public function index()
    {
        $billPays = BillPay::with('category')->paginate();
        return BillPayResource::collection($billPays);
    }

    public function store(BillPayRequest $request)
    {
        $billPay = BillPay::create($request->all());
//        return new BillPayResource($billPay);
        return new BillPayCollection($billPay);
    }

    public function show(BillPay $bill_pay)
    {
        return new BillPayResource($bill_pay);
    }

    public function update(BillPayRequest $request, BillPay $bill_pay)
    {
        $bill_pay->fill($request->all());
        $bill_pay->save();

        return $bill_pay;
    }

    public function destroy(BillPay $bill_pay)
    {
        try {
            $bill_pay->delete();
        } catch (\Exception $e) {
        }
        return response()->json([], 204);
    }
}
