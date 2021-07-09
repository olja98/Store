<?php

namespace App\Http\Controllers;
use App\models\Payment;
use App\models\CustomerDetail;
use Illuminate\Http\Request;

class CustomerDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerDetail=CustomerDetail::all();
        return view('website.backend.customerDetail.index', compact('customerDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.backend.customerDetail.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CustomerDetail::create($request->all());
        return redirect()->route('customerDetail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\CustomerDetail  $customerDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerDetail $customerDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\CustomerDetail  $customerDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerDetail $customerDetail)
    {
        return view('website.backend.customerDetail.update', compact('customerDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\CustomerDetail  $customerDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerDetail $customerDetail)
    {
        $customerDetail->update($request->all());
        return redirect()->route('customerDetail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\CustomerDetail  $customerDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerDetail $customerDetail)
    {
        $customerDetail->delete();
        return redirect()->route('customerDetail.index');

    }


    public function purchase(Request $request)
    {
        $customer_detail = CustomerDetail::create(
            [
                'email' => $request->input('email'),
                'f_name' => $request->input('first_name'),
                'l_name' => $request->input('last_name'),
                'address1' => $request->input('address'),
                'address2' => $request->input('address_2'),
                'town' => $request->input('city'),
                'country' => $request->input('state'),
                'post_code' => $request->input('zip_code'),
                'company_name' => $request->input('company_name'),
                'district' => $request->input('district'),
                'other_notes' => $request->input('other_notes'),
                'phone' => $request->input('phone')
            ]
        );
        try {


            $pay = Payment::create([
                    'total' => $request->input('amount'),
                    'payment_type'=> "card",
                    'customer_id'=>$customer_detail->id
                ]);

            return $pay;
    }
            catch (\Exception $e) {
                return response()->json(['message' => $e], 111);
            }

        

    }
}