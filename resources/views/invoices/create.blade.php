@php
    $selectedCustomerName = $customer->name ?? '';
    $selectedCustomerId = $customer->id ?? '';
@endphp

<x-app-layout title="Create Invoice" header="Create invoice for <strong>{{ $selectedCustomerName }}</strong>">

    {{-- SLOT --}}
    <div class="h-full w-full space-y-8">
        <div class="flex w-full">
            <x-back-button />
        </div>

        {{-- CREATE CUSTOMER FORM --}}
        <div class="mx-auto w-full border-2 border-gray-500 bg-white p-8">
            <form action="{{ route('invoices.store') }}" method="POST" class="mx-auto w-full space-y-4">
                @csrf

                <div class="flex gap-4">
                    <div class="space-y-2">
                        <x-label for="invoice_number">Invoice Number</x-label>
                        <x-input name="invoice_number" id="invoice_number" placeholder="Invoice number"
                            class="focus:ring-0" readonly :value="old('invoice_number')" value="{{ $newInvoiceNumber }}" />
                    </div>

                    <div class="space-y-2">
                        <x-label for="invoice_date">Invoice Date</x-label>
                        <x-input type="date" name="invoice_date" id="invoice_date"
                            placeholder="Enter customer phone number" required maxlength="11" :value="old('invoice_date')"
                            value="{{ $currentDate }}" />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <x-label>Select existing customer: </x-label>
                        <select name="created_for" id="created_for" class="h-10 w-fit cursor-pointer p-2" required>
                            <option value="">Select customer</option>
                            @foreach ($existingCustomers as $xCustomer)
                                <option value="{{ $xCustomer->id }}" @selected($selectedCustomerId === $xCustomer->id)>
                                    {{ $xCustomer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="space-y-2">
                    <x-label for="email">Line Items</x-label>

                    <div id="line-items-container" class="flex flex-col border p-4">
                        <div id="line-item-rows" class="flex flex-col">
                            {{-- LINE ITEM ROW --}}
                        </div>

                        <x-button type="button" id="add-line-item" class="w-fit">
                            Add line item
                        </x-button>
                    </div>
                </div>

                <div class="w-fit space-y-2">
                    <x-label for="discount">Discount</x-label>
                    <x-input type="number" name="discount" id="discount" placeholder="Enter customer discount"
                        value="0" required />
                </div>

                <div class="w-fit space-y-2">
                    <x-label for="vat">VAT</x-label>
                    <x-input type="number" name="vat" id="vat" placeholder="Enter vat" value="12"
                        required />
                </div>

                <div class="w-fit space-y-2">
                    <x-label for="grand_price">Grand Price</x-label>
                    <x-input readonly type="number" name="grand_price" id="grand_price" class="focus:ring-0"
                        placeholder="0.00" required />
                </div>

                <div>
                    <x-button class="ml-auto mt-8 block">Create Invoice</x-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function initInvoiceForm() {
            let lineItemCounter = 0;
            const addLineItemButton = document.querySelector('#add-line-item');
            const lineItemRows = document.querySelector('#line-item-rows');
            const discountField = document.querySelector('#discount');
            const vatField = document.querySelector('#vat');
            const grandPriceField = document.querySelector('#grand_price');

            function removeLineItemRow(rowId) {
                const lineItemRow = document.querySelector(`#line-item-row-${rowId}`);

                if (lineItemRow) {
                    /* Remove line item row and recalculate grandprice */
                    lineItemRow.remove();
                    calculateGrandPrice();
                }
            }

            function calculateSubtotal(rowId) {
                const quantity = document.querySelector(`#quantity-${rowId}`).value;
                const price = document.querySelector(`#base_price-${rowId}`).value;
                const subtotalField = document.querySelector(`#subtotal-${rowId}`);
                const subtotal = quantity * price || 0;
                subtotalField.value = subtotal.toFixed(2);

                /* Invoke this function to recalculate grand price */
                calculateGrandPrice();
            }

            function calculateGrandPrice() {
                let grandPrice = 0;

                /* Get all input with id that starts with subtotal- */
                const subtotals = document.querySelectorAll("[id^='subtotal-']");
                subtotals.forEach(subtotal => {
                    /* Skip empty subtotal fields from calculation*/
                    if (!subtotal.value) {
                        return;
                    }
                    grandPrice += parseFloat(subtotal.value);
                })

                discount = parseFloat(discountField.value) / 100 || 0;
                vat = parseFloat(vatField.value) / 100 ?? (12 / 100);

                const totalAfterDiscount = grandPrice - (discount * grandPrice);
                const totalAfterVat = totalAfterDiscount + (vat * totalAfterDiscount);

                grandPriceField.value = totalAfterVat.toFixed(2);
            }

            addLineItemButton.addEventListener('click', function() {
                /* Needs to reassign in const to know which is which */
                const currentLineItemCount = lineItemCounter;

                const lineItemHtml = `
                    <div id="line-item-row-${currentLineItemCount}" class="flex gap-4 mb-6">
                        <div id="line-item-type" class="w-auto">
                            <x-label>Type</x-label>
                            <div class="flex items-center gap-2">
                                <div>
                                    <input type="radio" name="line_item[${currentLineItemCount}][type]" id="type-product"
                                        value="PRODUCT" checked>
                                    <x-label for="type-product" class="text-sm">Product</x-label>
                                </div>
                                <div>
                                    <input type="radio" name="line_item[${currentLineItemCount}][type]" id="type-service"
                                        value="SERVICE" class="ml-2">
                                    <x-label for="type-service" class="text-sm">Service</x-label>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <x-label for="quantity-${currentLineItemCount}">Quantity</x-label>
                            <x-input inputmode="numeric" name="line_item[${currentLineItemCount}][quantity]"
                                id="quantity-${currentLineItemCount}"></x-input>
                        </div>

                        <div class="space-y-2">
                            <x-label for="base_price-${currentLineItemCount}">Price</x-label>
                            <x-input name="line_item[${currentLineItemCount}][base_price]" id="base_price-${currentLineItemCount}"></x-input>
                        </div>

                        <div class="space-y-2">
                            <x-label for="subtotal-${currentLineItemCount}">Subtotal</x-label>
                            <x-input readonly name="line_item[${currentLineItemCount}][subtotal]" id="subtotal-${currentLineItemCount}" class="focus:ring-0"></x-input>
                        </div>

                        <div id="remove-line-item-${currentLineItemCount}" class="mx-auto self-center">
                            <svg class="cursor-pointer fill-red-500" xmlns="http://www.w3.org/2000/svg"
                                height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                <path
                                    d="M200-120v-600h-40v-80h200v-40h240v40h200v80h-40v600H200Zm80-80h400v-520H280v520Zm80-80h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                            </svg>
                        </div> 
                    </div>
                `;

                /* Append html text inside lineItemRows div */
                lineItemRows.insertAdjacentHTML('beforeend', lineItemHtml);

                const quantityInput = document.querySelector(`#quantity-${currentLineItemCount}`)
                quantityInput.addEventListener('input', function() {
                    calculateSubtotal(currentLineItemCount);
                })

                const priceInput = document.querySelector(`#base_price-${currentLineItemCount}`);
                priceInput.addEventListener('input', function() {
                    calculateSubtotal(currentLineItemCount);
                })

                const removeButton = document.querySelector(`#remove-line-item-${currentLineItemCount}`);
                removeButton.addEventListener('click', function() {
                    removeLineItemRow(currentLineItemCount);
                });

                lineItemCounter++;
            });

            /* Calculate grand price again on change */
            discountField.addEventListener('input', calculateGrandPrice);
            vatField.addEventListener('input', calculateGrandPrice);
        }

        document.addEventListener('DOMContentLoaded', initInvoiceForm);
    </script>

</x-app-layout>
