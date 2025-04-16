<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function _invoke(CalculatePaymentRequest $request, PriceCalculationProcessor $processor):int
    {
        return $processor->process($request->get(key:'reservation_id'));

    }
}
