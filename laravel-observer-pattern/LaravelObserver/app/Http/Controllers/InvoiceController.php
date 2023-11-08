<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    //
    public function store(StoreInvoiceRequest $request)
    {
        //
        return Invoice::create($request->validated());
    }

    public function update(StoreInvoiceRequest $request, Invoice $invoice)
    {
        //
        $invoice->update($request->validated());

        return $invoice;
    }
}
