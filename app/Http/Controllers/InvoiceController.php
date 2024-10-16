<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Models\Customer;
use App\Models\Invoice;
use Date;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer = null)
    {
        /* logic to generate invoice number
            - get the last invoice number or create one
            - same day ? increment serial number : create new one starting with 001
            - desired format = INV[current date][current month][current year] - [001] / INV14102024-001
            - include this invoice number in the view
        */
        $lastInvoice = Invoice::latest()->first();

        $currentDay = date("d");
        $currentMonth = date("m");
        $currentYear = date("Y");
        $currentDate = "{$currentMonth}{$currentDay}{$currentYear}";

        $newInvoiceNumber = "INV{$currentDate}-001";

        $existingCustomers = Customer::all();

        /* If there are currently no data, start the invoice number with this */
        if (!$lastInvoice) {
            return view('invoices.create', compact('customer', 'existingCustomers', 'newInvoiceNumber'));
        }

        $lastInvoiceNumber = $lastInvoice->invoice_number; /* Sample = INV10162024-001 */

        /* This will remove INV */
        $lastInvoiceDetails = substr($lastInvoiceNumber, 3); /* 10162024-001 */

        $splittedDetails = explode('-', $lastInvoiceDetails); /* ['10162024', '001'] */

        /**
         * 10162024-001
         * $splittedDetails[0] = 10162024
         * $splittedDetails[1] = 001
         */
        $lastDay = substr($splittedDetails[0], 2, 2); /* starts in index 2, ends with index 3 */
        $lastMonth = substr($splittedDetails[0], 0, 2);
        $lastYear = substr($splittedDetails[0], 4, 4);

        // dd([
        //     'lastMonth' => $lastMonth,
        //     'lastDAy' => $lastDay,
        //     'lastYear' => $lastYear,
        //     'currentMOnth' => $currentMonth,
        //     'currentDay' => $currentDay,
        //     'currentYear' => $currentYear
        // ]);

        $lastSerialNumber = (int) $splittedDetails[1];

        $isSameDay = $lastDay === $currentDay && $lastMonth === $currentMonth && $lastYear === $currentYear;

        /* If not then return early along with the newInvoiceNumber */
        if (!$isSameDay) {
            return view('invoices.create', compact('customer', 'existingCustomers', 'newInvoiceNumber'));
        }

        $newSerialNumber = str_pad($lastSerialNumber + 1, 3, '0', STR_PAD_LEFT); /* built in php functions are amazing!! :> */
        $newInvoiceNumber = "INV{$currentDate}-{$newSerialNumber}";

        return view('invoices.create', compact('customer', 'existingCustomers', 'newInvoiceNumber'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        $request->validated();

        $decimalDiscount = $request['discount'] / 100;
        $decimalVat = $request['vat'] / 100;

        $invoice = Invoice::create([
            'invoice_number' => $request['invoice_number'],
            'invoice_date' => $request['invoice_date'],
            'created_for' => $request['created_for'],
            'created_by' => auth()->user()->id,
            'discount' => $decimalDiscount,
            'vat' => $decimalVat,
            'grand_price' => $request['grand_price'],
        ]);

        foreach ($request['line_item'] as $item) {
            $invoice->invoiceLineItems()->create([
                'type' => $item['type'],
                'quantity' => $item['quantity'],
                'base_price' => $item['base_price'],
                'subtotal' => $item['subtotal']
            ]);
        }

        return redirect()->route('customers.index')->with('success', 'Invoice created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return view('invoices.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        return view('invoices.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
