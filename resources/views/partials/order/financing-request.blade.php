<x-main>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />

    <div class="">
        <div class="bg-gray-200 mx-auto px-1 md:px-8 lg:px-24 py-1 sticky top-16 z-30">
            <x-nav-categories></x-nav-categories>
        </div>
        <div class="px-2 md:px-4 lg:px-28 mt-2">
            <h2 class="font-bold text-xl">Financing Application for Order: {{ Str::upper($invoice->orders->first()->order_id) }}</h2>
            <div class="bs-stepper wizard" id="financing-request-wizard">
                <div class="bs-stepper-header mb-4 w-full overflow-y-auto">
                    <div class="step pb-2" data-target="#financing-requirements">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Financing Requirements</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#documentation">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Documents</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#company-details">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Company Details</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#bankers-capital-structure">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">4</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Bankers & Capital Stucture</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#shareholders-key-management">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">5</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Shareholders & Key Management</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#current-bank-indebtness">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">6</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Current Bank Indebtness</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#current-operating-indebtness">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">7</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Current Operating Indebtness</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#anchor-history">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">8</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Anchor History</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#credit-terms-confidentiality-statement">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">9</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Credit Terms & Confidentiality</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form action="{{ route('invoice.financing.request.store', ['invoice' => $invoice]) }}" method="POST" id="financing-request-wizard-form" class="space-y-4 my-4" enctype="multipart/form-data">
                        @csrf
                        {{-- Financing Requirements --}}
                        <div class="content md:min-h-[70vh]" id="financing-requirements">
                            <div class="grid grid-cols-5 space-y-2 gap-3">
                                <div class="form-group col-span-5 w-full">
                                    <x-input-label>Amount Required</x-input-label>
                                    <x-text-input name="amount" disabled value="{{ $order_total }}"></x-text-input>
                                </div>
                                <div class="form-group col-span-5">
                                    <x-input-label>Facility Required</x-input-label>
                                    <div class="flex justify-between w-full">
                                        @foreach ($available_facilities as $key => $facility)
                                            <div class="flex">
                                                <input id="checkbox-table-search-1" type="radio" name="requested_facility" value="{{ $facility }}" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">{{ $facility }}</h2>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group col-span-5">
                                    <x-input-label>Duration</x-input-label>
                                    <div class="flex justify-between w-96">
                                        @foreach ($durations as $duration)
                                            <div class="flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="{{ $duration }}" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">{{ $duration }}</h2>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group col-span-5">
                                    <x-input-label>Purpose of Facility(Describe)</x-input-label>
                                    <div class="flex justify-between w-full">
                                        <textarea name="facility_purpose" rows="5" name="facility_purpose" class="w-full border border-gray-400 rounded-lg placeholder-gray-400"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between my-2 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $invoice->orders->first()->id]) }}">
                                    <x-secondary-outline-button class="border-gray-700">
                                        Cancel
                                    </x-secondary-outline-button>
                                </a>
                                <div class="flex gap-2">
                                    <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                                </div>
                            </div>
                        </div>
                        {{-- Documents --}}
                        <div class="content md:min-h-[70vh]" id="documentation">
                            <div class="grid grid-cols-2 gap-3">
                                @foreach ($documents as $key => $document)
                                    @if (is_array($document))
                                        <div class="col-span-2">
                                            <span>{{ $key }}</span>
                                            <div class="grid-cols-2 grid gap-3">
                                                @foreach ($document as $item)
                                                    <div class="col-span-1">
                                                        <x-input-label>{{ $item }}</x-input-label>
                                                        <x-input-file accept=".pdf" name="company_documents[{{ $item }}]"></x-input-file>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-span-1">
                                            <x-input-label>{{ $document }}</x-input-label>
                                            <x-input-file accept=".pdf" name="company_documents_files[{{ $document }}]"></x-input-file>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="flex justify-between my-2 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $invoice->orders->first()->id]) }}">
                                    <x-secondary-outline-button class="border-gray-700">
                                        Cancel
                                    </x-secondary-outline-button>
                                </a>
                                <div class="flex gap-2">
                                    <x-secondary-outline-button class="btn-prev border-gray-700"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                    <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                                </div>
                            </div>
                        </div>
                        {{-- Company Details --}}
                        <div class="content md:min-h-[70vh]" id="company-details">
                            <div class="grid grid-cols-6 gap-3">
                                <div class="form-group col-span-2">
                                    <x-input-label>Company Name</x-input-label>
                                    <x-text-input name="company_name" placeholder="Enter Company Name" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>Registration Number</x-input-label>
                                    <x-text-input name="company_registration_number" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>Country</x-input-label>
                                    <select name="country" id="country" class="border-2 border-gray-300 rounded-md bg-gray-200 w-full focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>Country of Incorporation</x-input-label>
                                    <select name="country_of_incorporation" id="country_of_incorporation" class="border-2 border-gray-300 rounded-md bg-gray-200 w-full focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>PIN No.</x-input-label>
                                    <x-text-input name="company_pin_number" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>Date Started Trading</x-input-label>
                                    <div class="relative max-w-lg">
                                        {{-- <div class="inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                            </svg>
                                        </div> --}}
                                        <input id="date-select" datepicker autocomplete="off" type="text" name="date_trade_started" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                    </div>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>Postal Address</x-input-label>
                                    <x-text-input name="company_postal_address" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>Postal Code</x-input-label>
                                    <x-text-input name="company_postal_code" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>Town/City</x-input-label>
                                    <x-text-input name="company_city" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>Physical Address</x-input-label>
                                    <x-text-input name="company_physical_address" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>Tel/Mobile Number</x-input-label>
                                    <x-text-input name="company_phone_number" type="tel" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>Email</x-input-label>
                                    <x-text-input name="company_email" type="email" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-3">
                                    <x-input-label for="company_business_nature" :value="__('Nature of Business')" class="text-black" />
                                    <textarea type="text" name="company_business_nature" rows="4" id="company_business_nature" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                    <x-input-error :messages="$errors->get('company_business_nature')" class="mt-2" />
                                </div>
                                <div class="form-group col-span-3">
                                    <x-input-label for="company_clients_information" :value="__('Information on Clients')" class="text-black" />
                                    <textarea type="text" name="company_clients_information" rows="4" id="company_clients_information" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                    <x-input-error :messages="$errors->get('company_clients_information')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex justify-between my-2 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $invoice->orders->first()->id]) }}">
                                    <x-secondary-outline-button class="border-gray-700">
                                        Cancel
                                    </x-secondary-outline-button>
                                </a>
                                <div class="flex gap-2">
                                    <x-secondary-outline-button class="btn-prev border-gray-700"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                    <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                                </div>
                            </div>
                        </div>
                        {{-- Bankers and Capital Structure --}}
                        <div class="content md:min-h-[70vh]" id="bankers-capital-structure">
                            <div class="grid grid-cols-8 gap-3">
                                <span class="col-span-8 flex justify-between">
                                    <span class="font-bold text-xl">Bankers</span>
                                    <x-primary-button class="px-4" id="add-banker">Add Banker</x-primary-button>
                                </span>
                                <div class="col-span-8 grid grid-cols-8 gap-3" id="bankers">
                                    <div class="form-group col-span-2">
                                        <x-input-label>Bank Name</x-input-label>
                                        <x-text-input name="bank_names[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-2">
                                        <x-input-label>Branch</x-input-label>
                                        <x-text-input name="bank_branches[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-2">
                                        <x-input-label>Account No.</x-input-label>
                                        <x-text-input name="bank_account_numbers[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-2">
                                        <x-input-label>Period With Bank(YRS)</x-input-label>
                                        <x-text-input name="period_with_banks[]" type="number" class="w-full"></x-text-input>
                                    </div>
                                </div>
                                <br>
                                <span class="font-bold text-xl col-span-8">Capital Structure</span>
                                <div class="form-group col-span-2">
                                    <x-input-label class="my-auto">Authorized Capital:</x-input-label>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>USD</x-input-label>
                                    <x-text-input name="authorized_capital_amount" type="number" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>Divided Into (Shares)</x-input-label>
                                    <x-text-input name="authorized_capital_shares_count" type="number" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>of USD (per share)</x-input-label>
                                    <x-text-input name="authorized_capital_share_value" type="number" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2 my-auto">
                                    <x-input-label class="">Paid-Up Capital:</x-input-label>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>USD</x-input-label>
                                    <x-text-input name="paid_up_capital_amount" type="number" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>Divided Into (Shares)</x-input-label>
                                    <x-text-input name="paid_up_capital_shares_count" type="number" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-2">
                                    <x-input-label>of USD (per share)</x-input-label>
                                    <x-text-input name="paid_up_capital_share_value" type="number" class="w-full"></x-text-input>
                                </div>
                            </div>
                            <div class="flex justify-between my-2 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $invoice->orders->first()->id]) }}">
                                    <x-secondary-outline-button class="border-gray-700">
                                        Cancel
                                    </x-secondary-outline-button>
                                </a>
                                <div class="flex gap-2">
                                    <x-secondary-outline-button class="btn-prev border-gray-700"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                    <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                                </div>
                            </div>
                        </div>
                        {{-- Shareholders and Key Management --}}
                        <div class="content md:min-h-[70vh]" id="shareholders-key-management">
                            <div class="grid grid-cols-5 gap-3">
                                <span class="col-span-8 flex justify-between">
                                    <span class="font-bold text-xl">List Shareholders Names</span>
                                    <x-primary-button class="px-4" id="add-shareholder">Add Shareholder</x-primary-button>
                                </span>
                                <div class="col-span-8 grid grid-cols-8 gap-3" id="shareholders">
                                    <div class="form-group col-span-2">
                                        <x-text-input name="shareholders[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-2">
                                        <x-text-input name="shareholders[1]" class="w-full"></x-text-input>
                                    </div>
                                </div>
                                <br>
                                <span class="col-span-8 flex justify-between">
                                    <span class="font-bold text-xl">List of Key Management</span>
                                    <x-primary-button class="px-4" id="add-manager">Add Manger</x-primary-button>
                                </span>
                                <div class="col-span-8 grid grid-cols-6 gap-3" id="managers">
                                    <div class="form-group col-span-2">
                                        <x-input-label>Name</x-input-label>
                                        <x-text-input name="manager_name[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-2">
                                        <x-input-label>Position</x-input-label>
                                        <x-text-input name="manager_position[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-2">
                                        <x-input-label>Duration</x-input-label>
                                        <x-text-input name="manager_position_duration[]" type="number" class="w-full"></x-text-input>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between my-2 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $invoice->orders->first()->id]) }}">
                                    <x-secondary-outline-button class="border-gray-700">
                                        Cancel
                                    </x-secondary-outline-button>
                                </a>
                                <div class="flex gap-2">
                                    <x-secondary-outline-button class="btn-prev border-gray-700"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                    <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                                </div>
                            </div>
                        </div>
                        {{-- Current Bank Indebtness --}}
                        <div class="content md:min-h-[70vh]" id="current-bank-indebtness">
                            <div class="grid grid-cols-9 gap-3">
                                <span class="col-span-9 flex justify-between">
                                    <span class="font-bold text-xl">Details of Current Bank Indebtness</span>
                                    <x-primary-button class="px-4" id="add-debt">Add Debt</x-primary-button>
                                </span>
                                <div class="col-span-9 grid grid-cols-9 gap-3" id="debts">
                                    <div class="form-group col-span-2">
                                        <x-input-label>Bank Name</x-input-label>
                                        <x-text-input name="debt_bank_name[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-2">
                                        <x-input-label>Facility Limits</x-input-label>
                                        <x-text-input name="debt_facility_limits[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-2">
                                        <x-input-label>Current Outstanding Amounts</x-input-label>
                                        <x-text-input name="debt_outstanding_amounts[]" type="number" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-3">
                                        <x-input-label>Reason For Debt</x-input-label>
                                        <textarea type="text" name="debt_reason[]" rows="2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between my-2 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $invoice->orders->first()->id]) }}">
                                    <x-secondary-outline-button class="border-gray-700">
                                        Cancel
                                    </x-secondary-outline-button>
                                </a>
                                <div class="flex gap-2">
                                    <x-secondary-outline-button class="btn-prev border-gray-700"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                    <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                                </div>
                            </div>
                        </div>
                        {{-- Current Operating Indedbtness --}}
                        <div class="content md:min-h-[70vh]" id="current-operating-indebtness">
                            <div class="grid grid-cols-9 gap-3">
                                <span class="col-span-9 flex justify-between">
                                    <span class="font-bold text-xl">Details of Current Operating Indebtness (5 Largest Creditors)</span>
                                    <x-primary-button class="px-4" id="add-credit">Add Credit</x-primary-button>
                                </span>
                                <div class="col-span-9 grid grid-cols-9 gap-3" id="credits">
                                    <div class="form-group col-span-2">
                                        <x-input-label>Creditor Name</x-input-label>
                                        <x-text-input name="creditor_name[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-2">
                                        <x-input-label>Facility Limits</x-input-label>
                                        <x-text-input name="credit_facility_limits[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-2">
                                        <x-input-label>Current Outstanding Amounts</x-input-label>
                                        <x-text-input name="credit_outstanding_amounts[]" type="number" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-3">
                                        <x-input-label>Reason For Debt</x-input-label>
                                        <textarea type="text" name="credit_reason[]" rows="2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between my-2 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $invoice->orders->first()->id]) }}">
                                    <x-secondary-outline-button class="border-gray-700">
                                        Cancel
                                    </x-secondary-outline-button>
                                </a>
                                <div class="flex gap-2">
                                    <x-secondary-outline-button class="btn-prev border-gray-700"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                    <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                                </div>
                            </div>
                        </div>
                        {{-- Anchor History --}}
                        <div class="content md:min-h-[70vh]" id="anchor-history">
                            <div class="grid grid-cols-2 gap-3">
                                <span class="col-span-2">
                                    <span class="font-bold text-xl">History With Anchor</span>
                                </span>
                                <div class="form-group col-span-1">
                                    <x-input-label :value="__('Brief Description of Transaction')" class="text-black" />
                                    <textarea type="text" name="anchor_transaction_history" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                    <x-input-error :messages="$errors->get('anchor_transaction_history')" class="mt-2" />
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label :value="__('Terms of Transaction')" class="text-black" />
                                    <textarea type="text" name="anchor_terms_of_transaction" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                    <x-input-error :messages="$errors->get('anchor_terms_of_transaction')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex justify-between my-2 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $invoice->orders->first()->id]) }}">
                                    <x-secondary-outline-button class="border-gray-700">
                                        Cancel
                                    </x-secondary-outline-button>
                                </a>
                                <div class="flex gap-2">
                                    <x-secondary-outline-button class="btn-prev border-gray-700"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                    <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                                </div>
                            </div>
                        </div>
                        {{-- Credit Terms and Confidentiality Statement --}}
                        <div class="content md:min-h-[70vh]" id="credit-terms-confidentiality-statement">
                            <div class="space-y-2">
                                <span class="font-bold text-xl">Credit Terms and Conditions</span>
                                <p class="text-gray-700">I/We understand that incomplete application forms or forms found to bear false information will not be processed.</p>
                                <p class="text-gray-700">I/We understand that we may be called upon to provide further information in support of our application.</p>
                                <p class="text-gray-700">I/We understand that if our application is approved, the finacier will furnish us with an Offer Letter for an appropriate facility, otherwise a Letter of Regret.</p>
                                <p class="text-gray-700">I/We agree to allow a reasonable period for a complete review of our application.</p>
                                <p class="text-gray-700">I/We hereby certify that all the particulars given by Me/Us above are true and complete.</p>
                                <p class="text-gray-700">In connection with this application and/or maintaining a credit facility with RecoSIB, I/We authorize RecoSIB to carry out credit checks with or obtain my credit information from, a credit reference bureau.</p>
                                <p class="text-gray-700">
                                    In the event of the account going into default, I/We consent to my/our name (s), transaction and default details being forwarded to a credit reference
                                    bureau for listing. I/We acknowledge that this information may be used by banking institutions and other credit grantors in assessing applications for
                                    credit by me/us, associated companies, and supplementary account holders and for occasional debt tracing and fraud prevention purposes.
                                </p>
                                <br>
                                <span class="font-bold text-xl">Confidentiality Statement</span>
                                <p class="text-gray-700">
                                    The applicant and the financier each undertake to the other that all information contained in this document and in any other documents
                                    exchanged or may be exchanged between the financier and the applicant or otherwise disclosed to either party pursuant to the above
                                    arrangements is and shall be kept in confidence, and neither party hereto shall disclose such information or documentation to any other
                                    party or entity without the prior written consent of the other party.
                                </p>
                                <div class="flex gap-2 px-1 md:px-2 text-gray-900">
                                    <input id="checkbox-table-search-1" type="checkbox" required name="agree_to_terms_and_conditions" class="w-4 h-4 mt-1 text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    <h2 class="font-semibold">Agree to Credit Terms and Conditions and Confidentiality Statement</h2>
                                </div>
                            </div>
                            <div class="flex justify-between my-2 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $invoice->orders->first()->id]) }}">
                                    <x-secondary-outline-button class="border-gray-700">
                                        Cancel
                                    </x-secondary-outline-button>
                                </a>
                                <div class="flex gap-2">
                                    <x-secondary-outline-button class="btn-prev border-gray-700"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                    <x-primary-button class="px-4 py-2 text-lg">Submit</x-primary-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/datepicker.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/js/financing-request-wizard.js') }}"></script>
    <script>
        let bankers_count = 1
        let shareholders_count = 2
        let managers_count = 1
        let debt_count = 1
        let credit_count = 1
        let bankers = $('#bankers')
        let shareholders = $('#shareholders')
        let managers = $('#managers')
        let debts = $('#debts')
        let credits = $('#credits')
        $(document.body).on('click', '#add-banker', function(e) {
            e.preventDefault();
            let html = '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Bank Name</label>'
                html += '<input name="bank_names['+bankers_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Branch</label>'
                html += '<input name="bank_branches['+bankers_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Account No.</label>'
                html += '<input name="bank_account_numbers['+bankers_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Period With Bank(YRS)</label>'
                html += '<input name="period_with_banks['+bankers_count+']" type="number" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>';
            $(html).appendTo(bankers);
            bankers_count += 1;
        })

        $(document.body).on('click', '#add-shareholder', function(e) {
            e.preventDefault();
            let html = '<div class="form-group col-span-2">'
                html += '<input name="shareholders['+shareholders_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>';
            $(html).appendTo(shareholders);
            shareholders_count += 1;
        })

        $(document.body).on('click', '#add-manager', function(e) {
            e.preventDefault();
            let html = '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Name</label>'
                html += '<input name="manager_name['+managers_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Position</label>'
                html += '<input name="manager_position['+managers_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Duration</label>'
                html += '<input name="manager_position_duration['+managers_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>';
            $(html).appendTo(managers);
            managers_count += 1;
        })

        $(document.body).on('click', '#add-debt', function(e) {
            e.preventDefault();
            let html = '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Bank Name</label>'
                html += '<input name="debt_bank_name['+debt_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Facility Limit</label>'
                html += '<input name="debt_facility_limits['+debt_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Current Outstanding Amount</label>'
                html += '<input name="debt_outstanding_amounts['+debt_count+']" type="number" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-3">'
                html += '<label class="block font-bold text-dark">Reason for Debt</label>'
                html += '<textarea type="text" name="debt_reason['+debt_count+']" rows="2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>'
                html += '</div>';
            $(html).appendTo(debts);
            debt_count += 1;
        })

        $(document.body).on('click', '#add-credit', function(e) {
            e.preventDefault();
            let html = '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Creditor Name</label>'
                html += '<input name="creditor_name['+credit_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Facility Limit</label>'
                html += '<input name="credit_facility_limits['+credit_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-2">'
                html += '<label class="block font-bold text-dark">Current Outstanding Amount</label>'
                html += '<input name="credit_outstanding_amounts['+credit_count+']" type="number" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-3">'
                html += '<label class="block font-bold text-dark">Reason for Debt</label>'
                html += '<textarea type="text" name="credit_reason['+credit_count+']" rows="2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>'
                html += '</div>';
            $(html).appendTo(credits);
            credit_count += 1;
        })
    </script>
</x-main>
