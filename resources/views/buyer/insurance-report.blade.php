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
            <h2 class="font-bold text-xl">Insurance Request for Order: {{ Str::upper($order->order_id) }}</h2>
            <div class="bs-stepper wizard" id="buyer-insurance-report-wizard">
                <div class="bs-stepper-header mb-4 w-full overflow-y-auto">
                    <div class="step pb-2" data-target="#customer-details">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Your(Customer) Details</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#corporate-details">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Legal Entity,Corporate or SME Details</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#proposal-details">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Propasal Details</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#proposal-details-limit-of-liability">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">4</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">More Propasal Details</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#consent-and-declaration">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">6</span>
                            <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Consent & Declaration</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form action="#" method="POST" id="buyer-insurance-report-wizard-form" class="space-y-4 my-4" enctype="multipart/form-data">
                        @csrf
                        {{-- Individual Customer Details --}}
                        <div class="content md:min-h-[70vh]" id="customer-details">
                            <div class="grid grid-cols-3 gap-3">
                                <div class="form-group col-span-1">
                                    <x-input-label>First Name</x-input-label>
                                    <x-text-input name="first_name" placeholder="Enter First Name" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Last Name</x-input-label>
                                    <x-text-input name="last_name" placeholder="Enter Last Name" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Date of Birth</x-input-label>
                                    <div class="relative max-w-lg">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                            </svg>
                                        </div>
                                        <input id="date-select" datepicker autocomplete="off" type="text" name="date_of_birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                    </div>
                                </div>
                                <div class="form-group col-span-1">
                                    <div class="grid-cols-2 grid gap-3">
                                        <div class="col-span-1">
                                            <x-input-label>Gender</x-input-label>
                                            <div class="flex justify-between w-40">
                                                @foreach ($genders as $gender)
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="gender" value="{{ $gender }}" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-1 truncate">{{ $gender }}</h2>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-span-1">
                                            <x-input-label>Marital Status</x-input-label>
                                            <div class="flex justify-between w-40">
                                                @foreach ($marital_statuses as $marital_status)
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="marital_status" value="{{ $marital_status }}" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-1 truncate">{{ $marital_status }}</h2>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Nationality</x-input-label>
                                    <x-text-input name="nationality" placeholder="Enter Nationality" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Citizenship</x-input-label>
                                    <x-text-input name="citizenship" placeholder="Enter Citizenship" class="w-full"></x-text-input>
                                </div>
                                <span class="flex justify-between col-span-3">
                                    <span class="font-bold text-xl">Contact Details</span>
                                </span>
                                <div class="form-group col-span-1">
                                    <x-input-label>Mobile</x-input-label>
                                    <x-text-input name="mobile_number" placeholder="Enter Mobile Number" class="w-full" type="tel"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Telephone</x-input-label>
                                    <x-text-input name="telephone" placeholder="Enter Telephone" class="w-full" type="tel"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Email</x-input-label>
                                    <x-text-input name="email" placeholder="Enter Email" class="w-full" type="email"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Postal Address</x-input-label>
                                    <x-text-input name="postal_address" placeholder="Enter Postal Address" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Postal Code</x-input-label>
                                    <x-text-input name="postal_code" placeholder="Enter Postal Code" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Town/City</x-input-label>
                                    <x-text-input name="city" placeholder="Enter Town/City" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Residential Address</x-input-label>
                                    <x-text-input name="residential_address" placeholder="Enter Residential Address" class="w-full"></x-text-input>
                                </div>
                                <div class="col-span-3"></div>
                                <div class="col-span-2">
                                    <span class="flex justify-between col-span-2">
                                        <span class="font-bold text-xl">Identification Document</span>
                                    </span>
                                    @foreach ($identification_docs as $document)
                                        <div class="col-span-2">
                                            <div class="grid-cols-3 grid gap-x-3 mb-1">
                                                <span class="font-semibold col-span-3">{{ $document['name'] }}</span>
                                                <div class="form-group col-span-1">
                                                    <x-input-label>{{ $document['name'] }} Number</x-input-label>
                                                    <x-text-input name="identification_number[{{ $document['name'] }}]" class="w-full"></x-text-input>
                                                </div>
                                                <div class="form-group col-span-1">
                                                    @if ($document['requires_expiry_date'])
                                                        <x-input-label>Expiry Date</x-input-label>
                                                        <div class="relative max-w-lg">
                                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                                </svg>
                                                            </div>
                                                            <input id="date-select" datepicker autocomplete="off" type="text" name="identification_document_expiry[{{ $document['name'] }}]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-span-1">
                                                    <x-input-label>Upload Document</x-input-label>
                                                    <x-input-file accept=".pdf" name="identification_document[{{ $document['name'] }}]" class="w-full"></x-input-file>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-span-1 space-y-2">
                                    <div class="form-group col-span-1">
                                        <x-input-label>Income Tax No. (PIN)</x-input-label>
                                        <x-text-input name="income_tax_pin" placeholder="Enter Income Tax PIN" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-1">
                                        <x-input-label>Income Tax No. (PIN) Certificate</x-input-label>
                                        <x-input-file accept=".pdf" name="income_tax_pin_certificate" class="w-full"></x-input-file>
                                    </div>
                                    <div class="form-group col-span-1">
                                        <div class="grid-cols-2 grid gap-3">
                                            <div class="form-group col-span-1">
                                                <x-input-label>Are You Employed?</x-input-label>
                                                <div class="flex justify-between w-32">
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="is_employed" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-1 truncate">Yes</h2>
                                                    </div>
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="is_employed" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-1 truncate">No</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-span-1">
                                                <x-input-label>Are You Self Employed?</x-input-label>
                                                <div class="flex justify-between w-32">
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="is_self_employed" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                                    </div>
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="is_self_employed" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-span-2">
                                        <x-input-label>If Employed, Enter state of current employer</x-input-label>
                                        <x-text-input name="employers_state" class="w-full"></x-text-input>
                                    </div>
                                    <div class="grid-cols-2 col-span-3 grid gap-3">
                                        <div class="form-group col-span-1">
                                            <x-input-label>Occupation</x-input-label>
                                            <x-text-input name="occupation" placeholder="Enter Occupation" class="w-full"></x-text-input>
                                        </div>
                                        <div class="form-group col-span-1">
                                            <x-input-label>Sector</x-input-label>
                                            <x-text-input name="occupation_sector" placeholder="Enter Sector" class="w-full"></x-text-input>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <div class="grid grid-cols-5 gap-3">
                                        <div class="col-span-3">
                                            <span class="flex justify-between col-span-3">
                                                <x-input-label>Source of Income</x-input-label>
                                            </span>
                                            <div class="flex justify-between w-full">
                                                @foreach ($sources_of_income as $source_of_income)
                                                    <div class="flex flex-wrap">
                                                        <input id="checkbox-table-search-1" type="checkbox" name="source_of_income[{{ $source_of_income }}]" value="{{ $source_of_income }}" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-sm focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold ml-1 text-sm truncate">{{ $source_of_income }}</h2>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <span class="flex justify-between col-span-3">
                                        <x-input-label>Source of Wealth</x-input-label>
                                    </span>
                                    <div class="flex justify-between w-full">
                                        @foreach ($sources_of_wealth as $source_of_wealth)
                                            <div class="flex flex-wrap">
                                                <input id="checkbox-table-search-1" type="checkbox" name="source_of_wealth[{{ $source_of_wealth }}]" value="{{ $source_of_wealth }}" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-sm focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold ml-1 text-sm truncate">{{ $source_of_wealth }}</h2>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <span class="flex justify-between col-span-3">
                                        <span class="font-bold text-xl">Next of Kin</span>
                                    </span>
                                    <div class="grid grid-cols-3 gap-3">
                                        <div class="form-group col-span-1">
                                            <x-input-label>Name</x-input-label>
                                            <x-text-input name="next_of_kin_name" placeholder="Enter Name" class="w-full"></x-text-input>
                                        </div>
                                        <div class="form-group col-span-1">
                                            <x-input-label>Relationship</x-input-label>
                                            <x-text-input name="next_of_kin_relationship" placeholder="Enter Relationship" class="w-full"></x-text-input>
                                        </div>
                                        <div class="form-group col-span-1">
                                            <x-input-label>Phone Number</x-input-label>
                                            <x-text-input name="next_of_kin_phone_number" placeholder="Enter Phone Number" class="w-full"></x-text-input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between my-3 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $order]) }}">
                                    <x-secondary-outline-button class="border-gray-700">
                                        Cancel
                                    </x-secondary-outline-button>
                                </a>
                                <div class="flex gap-2">
                                    <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                                </div>
                            </div>
                        </div>
                        {{-- Legal Entity, Corporate or SME Details --}}
                        <div class="content md:min-h-[70vh]" id="corporate-details">
                            <div class="grid grid-cols-3 gap-3">
                                <div class="form-group col-span-1">
                                    <x-input-label>Trade Name</x-input-label>
                                    <x-text-input name="business_trade_name" placeholder="Enter Trade Name" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Legal/Registered Name</x-input-label>
                                    <x-text-input name="business_legal_name" placeholder="Enter Legal/Registered Name" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Registration Number</x-input-label>
                                    <x-text-input name="business_registration_number" placeholder="Enter Registration Number" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Country of Incorporation</x-input-label>
                                    <x-text-input name="business_country_of_incorporation" placeholder="Enter Country of Incorporation" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Country of Parent Company</x-input-label>
                                    <x-text-input name="business_country_of_parent_company" placeholder="Enter Country of Parent Company" class="w-full"></x-text-input>
                                </div>
                                <span class="flex justify-between col-span-3">
                                    <span class="font-bold text-xl">Contact Details</span>
                                </span>
                                <div class="form-group col-span-1">
                                    <x-input-label>Mobile</x-input-label>
                                    <x-text-input name="business_mobile_number" placeholder="Enter Mobile Number" class="w-full" type="tel"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Telephone</x-input-label>
                                    <x-text-input name="business_telephone" placeholder="Enter Telephone" class="w-full" type="tel"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Email</x-input-label>
                                    <x-text-input name="business_email" placeholder="Enter Email" class="w-full" type="email"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Postal Address</x-input-label>
                                    <x-text-input name="business_postal_address" placeholder="Enter Postal Address" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Postal Code</x-input-label>
                                    <x-text-input name="business_postal_code" placeholder="Enter Postal Code" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Town/City</x-input-label>
                                    <x-text-input name="business_city" placeholder="Enter Town/City" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Physical Location</x-input-label>
                                    <x-text-input name="business_residential_address" placeholder="Enter Physical Location" class="w-full"></x-text-input>
                                </div>
                                <div class="col-span-3">
                                    <div class="grid grid-cols-4 gap-3">
                                        <div class="form-group col-span-1">
                                            <x-input-label>Income Tax No. (PIN)</x-input-label>
                                            <x-text-input name="business_income_tax_pin" placeholder="Enter Income Tax PIN" class="w-full"></x-text-input>
                                        </div>
                                        <div class="form-group col-span-1">
                                            <x-input-label>Income Tax No. (PIN) Certificate</x-input-label>
                                            <x-input-file accept=".pdf" name="business_income_tax_pin_certificate" class="w-full"></x-input-file>
                                        </div>
                                        <div class="form-group col-span-1">
                                            <x-input-label>Nature of Business</x-input-label>
                                            <x-text-input name="business_nature" placeholder="Enter Nature of Business" class="w-full"></x-text-input>
                                        </div>
                                        <div class="form-group col-span-1">
                                            <x-input-label>Sector</x-input-label>
                                            <x-text-input name="business_sector" placeholder="Enter Physical Location" class="w-full"></x-text-input>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <div class="grid grid-cols-5 gap-3">
                                        <div class="col-span-3">
                                            <span class="flex justify-between col-span-3">
                                                <x-input-label>Source of Income</x-input-label>
                                            </span>
                                            <div class="flex justify-between w-full">
                                                @foreach ($business_sources_of_income as $source_of_income)
                                                    <div class="flex flex-wrap">
                                                        <input id="checkbox-table-search-1" type="checkbox" name="business_source_of_income[{{ $source_of_income }}]" value="{{ $source_of_income }}" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-sm focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold ml-1 text-sm truncate">{{ $source_of_income }}</h2>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <span class="flex justify-between col-span-3">
                                        <x-input-label>Source of Wealth</x-input-label>
                                    </span>
                                    <div class="flex justify-between w-full">
                                        @foreach ($business_sources_of_wealth as $source_of_wealth)
                                            <div class="flex flex-wrap">
                                                <input id="checkbox-table-search-1" type="checkbox" name="business_source_of_wealth[{{ $source_of_wealth }}]" value="{{ $source_of_wealth }}" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-sm focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold ml-1 text-sm truncate">{{ $source_of_wealth }}</h2>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between my-2 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $order]) }}">
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
                        {{-- Proposal Details --}}
                        <div class="content md:min-h-[70vh]" id="proposal-details">
                            <div class="grid grid-cols-3 gap-3">
                                <div class="cols-span-2 grid grid-cols-2">
                                    <x-input-label class="col-span-2">Period of Insurance:</x-input-label>
                                    <div date-rangepicker class="col-span-2 flex items-center">
                                        <span class="mx-4 text-gray-700">From</span>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <input name="period_of_insurance_start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select Start Date">
                                        </div>
                                        <span class="mx-4 text-gray-700">to</span>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <input name="period_of_insurance_end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select End Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Mode of Conveyance</x-input-label>
                                    <x-text-input name="conveyance_mode" placeholder="Enter Mode of Conveyance" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Territory Limits</x-input-label>
                                    <x-text-input name="territory_limits" placeholder="Enter Territory Limits" class="w-full"></x-text-input>
                                </div>
                                <div class="col-span-3">
                                    <div class="grid grid-cols-2 gap-2">
                                        <x-input-label class="col-span-2 mb-1">If cover is required on specified vehicles, complete the schedule below:</x-input-label>
                                        <div class="col-span-1">
                                            <div class="grid grid-cols-4 gap-1">
                                                <div class="col-span-4 flex justify-between">
                                                    <x-input-label class="underline">Vehicles</x-input-label>
                                                    <x-primary-button id="add-vehicle">Add Vehicle</x-primary-button>
                                                </div>
                                                <div class="col-span-4 grid grid-cols-4 gap-1 gap-y-2" id="vehicles">
                                                    <div class="col-span-1 form-group">
                                                        <x-input-label class="text-sm">Make & Description</x-input-label>
                                                        <x-text-input class="w-full" name="vehicle_description[]"></x-text-input>
                                                    </div>
                                                    <div class="col-span-1 form-group">
                                                        <x-input-label class="text-sm">Reg Number</x-input-label>
                                                        <x-text-input class="w-full" name="vehicle_reg_number[]"></x-text-input>
                                                    </div>
                                                    <div class="col-span-1 form-group">
                                                        <x-input-label class="text-sm">Carrying Capacity</x-input-label>
                                                        <x-text-input class="w-full" name="vehicle_carrying_capacity[]"></x-text-input>
                                                    </div>
                                                    <div class="col-span-1 form-group">
                                                        <x-input-label class="text-sm">Sum Insured</x-input-label>
                                                        <x-text-input class="w-full" name="vehicle_sum_insured[]"></x-text-input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-1">
                                            <div class="grid grid-cols-4 gap-1">
                                                <div class="col-span-4 flex justify-between">
                                                    <x-input-label class="underline">Trailers</x-input-label>
                                                    <x-primary-button id="add-trailer">Add Trailer</x-primary-button>
                                                </div>
                                                <div class="col-span-4 grid grid-cols-4 gap-1 gap-y-2" id="trailers">
                                                    <div class="col-span-1 form-group">
                                                        <x-input-label class="text-sm">Make & Description</x-input-label>
                                                        <x-text-input class="w-full" name="trailer_description[]"></x-text-input>
                                                    </div>
                                                    <div class="col-span-1 form-group">
                                                        <x-input-label class="text-sm">Reg Number</x-input-label>
                                                        <x-text-input class="w-full" name="trailer_reg_number[]"></x-text-input>
                                                    </div>
                                                    <div class="col-span-1 form-group">
                                                        <x-input-label class="text-sm">Carrying Capacity</x-input-label>
                                                        <x-text-input class="w-full" name="trailer_carrying_capacity[]"></x-text-input>
                                                    </div>
                                                    <div class="col-span-1 form-group">
                                                        <x-input-label class="text-sm">Sum Insured</x-input-label>
                                                        <x-text-input class="w-full" name="trailer_sum_insured[]"></x-text-input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <div class="grid grid-cols-5 gap-2">
                                        <div class="form-group col-span-3">
                                            <x-input-label>How will the goods be packaged?</x-input-label>
                                            <textarea type="text" name="product_packaging" rows="4" id="product_packaging" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                        </div>
                                        <div class="col-span-2 space-y-2">
                                            <x-input-label>Will you transport any of the following?</x-input-label>
                                            <div class="flex justify-between">
                                                <x-input-label class="text-sm">Wines and Spirits?</x-input-label>
                                                <div class="flex justify-between w-40">
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="wines_and_spirits" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-1 truncate">Yes</h2>
                                                    </div>
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="wines_and_spirits" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-1 truncate">No</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-between">
                                                <x-input-label class="text-sm">Fragile Articles?</x-input-label>
                                                <div class="flex justify-between w-40">
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="fragile_goods" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-1 truncate">Yes</h2>
                                                    </div>
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="fragile_goods" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-1 truncate">No</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-between">
                                                <x-input-label class="text-sm">Explosive or hazardous goods?</x-input-label>
                                                <div class="flex justify-between w-40">
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="explosive_goods" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-1 truncate">Yes</h2>
                                                    </div>
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="explosive_goods" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-1 truncate">No</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <div class="grid grid-cols-5 gap-2">
                                        <div class="col-span-2 space-y-2">
                                            <div>
                                                <x-input-label>Will you use hired vehicles?</x-input-label>
                                                <div class="flex justify-between">
                                                    <div class="flex justify-between w-40">
                                                        <div class="flex">
                                                            <input id="checkbox-table-search-1" type="radio" name="will_use_hired_vehicles" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                            <h2 class="font-semibold text-sm ml-1 truncate">Yes</h2>
                                                        </div>
                                                        <div class="flex">
                                                            <input id="checkbox-table-search-1" type="radio" name="will_use_hired_vehicles" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                            <h2 class="font-semibold text-sm ml-1 truncate">No</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <x-input-label>If so give details?</x-input-label>
                                                    <textarea type="text" name="product_packaging" rows="3" id="hired_vehicles_details" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-span-3">
                                            <x-input-label>How do you ensure safety of the goods when the vehicle(s) are temporarily garaged during transit? Please explain?</x-input-label>
                                            <textarea type="text" name="goods_safety" rows="4" id="goods_safety" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <div class="grid grid-cols-5 gap-3">
                                        <div class="col-span-3">
                                            <span class="flex justify-between col-span-3">
                                                <x-input-label>Are the vehicles fitted with</x-input-label>
                                            </span>
                                            <div class="flex justify-between w-full">
                                                @foreach ($vehicle_devices as $vehicle_device)
                                                    <div class="flex flex-wrap">
                                                        <input id="checkbox-table-search-1" type="checkbox" name="vehicle_devices[{{ $vehicle_device }}]" value="{{ $vehicle_device }}" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-400 rounded-sm focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold ml-1 text-sm truncate">{{ $vehicle_device }}</h2>
                                                    </div>
                                                @endforeach
                                                <div>
                                                    <x-input-label>Any Other</x-input-label>
                                                    <x-text-input name="other_vehicle_devices" class="w-full"></x-text-input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between my-3 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $order]) }}">
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
                        {{-- Proposal Details (Limit of Liability) --}}
                        <div class="content md:min-h-[70vh]" id="proposal-details-limit-of-liability">
                            <div class="grid grid-cols-3 gap-3">
                                <span class="flex justify-between col-span-3">
                                    <x-input-label>Limit of Liability</x-input-label>
                                </span>
                                <div class="col-span-1">
                                    <x-input-label>In Respect of any one consignment(Ksh)</x-input-label>
                                    <x-text-input name="limit_of_liability_one_consignment" class="w-full"></x-text-input>
                                </div>
                                <div class="col-span-1">
                                    <x-input-label>In Respect of any one period of insurance(Ksh)</x-input-label>
                                    <x-text-input name="prev_insurer" class="w-full"></x-text-input>
                                </div>
                                <div class="col-span-1">
                                    <x-input-label>State your estimated annual carry(Ksh)</x-input-label>
                                    <x-text-input name="limit_of_liability_annual_carry_estimate" class="w-full"></x-text-input>
                                </div>
                                <div class="col-span-3">
                                    <div class="grid grid-cols-5 gap-2">
                                        <div class="col-span-3">
                                            <x-input-label>Are you now or have you been insured for this type of insurance?</x-input-label>
                                            <div class="flex justify-between w-40">
                                                <div class="flex">
                                                    <input id="checkbox-table-search-1" type="radio" name="have_been_insured" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                    <h2 class="font-semibold text-sm ml-1 truncate">Yes</h2>
                                                </div>
                                                <div class="flex">
                                                    <input id="checkbox-table-search-1" type="radio" name="have_been_insured" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                    <h2 class="font-semibold text-sm ml-1 truncate">No</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-1">
                                            <x-input-label>If Yes, Name of Insurer</x-input-label>
                                            <x-text-input name="prev_insurer" class="w-full"></x-text-input>
                                        </div>
                                        <div class="col-span-1">
                                            <x-input-label>If Yes, Enter Policy Number</x-input-label>
                                            <x-text-input name="prev_insurance_policy_number" class="w-full"></x-text-input>
                                        </div>
                                    </div>
                                </div>
                                <span class="flex justify-between col-span-3">
                                    <x-input-label>Insurance/Loss History</x-input-label>
                                </span>
                                <div class="col-span-3">
                                    <div class="grid grid-cols-5">
                                        <x-input-label class="col-span-3">Have you ever suffered a loss in connection of the insurance now proposed?</x-input-label>
                                        <div class="co-span-2 flex justify-between w-40">
                                            <div class="flex">
                                                <input id="checkbox-table-search-1" type="radio" name="have_been_insured" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-1 truncate">Yes</h2>
                                            </div>
                                            <div class="flex">
                                                <input id="checkbox-table-search-1" type="radio" name="have_been_insured" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-1 truncate">No</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-col-6 gap-3">
                                        <x-input-label class="col-span-6">If Yes, give details in the last three year(s)</x-input-label>
                                        @for ($i = 0; $i < 3; $i++)
                                            <div class="col-span-1 form-group">
                                                <x-input-label>Year</x-input-label>
                                                <x-text-input class="w-full" name="prev_loss_year[{{ $i }}]" type="number"></x-text-input>
                                            </div>
                                            <div class="col-span-2 form-group">
                                                <x-input-label>Cause of Loss</x-input-label>
                                                <x-text-input class="w-full" name="prev_loss_cause[{{ $i }}]"></x-text-input>
                                            </div>
                                            <div class="col-span-2 form-group">
                                                <x-input-label>Brief details of each loss</x-input-label>
                                                <x-text-input class="w-full" name="prev_loss_description[{{ $i }}]"></x-text-input>
                                            </div>
                                            <div class="col-span-1 form-group">
                                                <x-input-label>Amount</x-input-label>
                                                <x-text-input class="w-full" type="number" name="prev_loss_amount[{{ $i }}]"></x-text-input>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <div class="form-group col-span-3">
                                        <x-input-label>What precautions do you now engage to avoid recurrence of such claim/s?</x-input-label>
                                        <textarea type="text" name="precautions_engaged" rows="3" id="precautions_engaged" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <div class="grid grid-cols-5 gap-2">
                                        <x-input-label class="col-span-5">Has any Insurance Company ever;</x-input-label>
                                        <div class="col-span-2 space-y-2">
                                            <div class="grid grid-cols-3">
                                                <x-input-label class="col-span-2">Cancelled your Policy?</x-input-label>
                                                <div class="col-span-1 flex justify-between">
                                                    <div class="flex justify-between w-40">
                                                        <div class="flex">
                                                            <input id="checkbox-table-search-1" type="radio" name="had_cancelled_policy" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                            <h2 class="font-semibold text-sm ml-1 truncate">Yes</h2>
                                                        </div>
                                                        <div class="flex">
                                                            <input id="checkbox-table-search-1" type="radio" name="had_cancelled_policy" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                            <h2 class="font-semibold text-sm ml-1 truncate">No</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3">
                                                <x-input-label class="col-span-2">Declined to insure you?</x-input-label>
                                                <div class="col-span-1 flex justify-between">
                                                    <div class="flex justify-between w-40">
                                                        <div class="flex">
                                                            <input id="checkbox-table-search-1" type="radio" name="had_insurance_declined" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                            <h2 class="font-semibold text-sm ml-1 truncate">Yes</h2>
                                                        </div>
                                                        <div class="flex">
                                                            <input id="checkbox-table-search-1" type="radio" name="had_insurance_declined" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                            <h2 class="font-semibold text-sm ml-1 truncate">No</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3">
                                                <x-input-label class="col-span-2">Declined to renew your Policy?</x-input-label>
                                                <div class="col-span-1 flex justify-between">
                                                    <div class="flex justify-between w-40">
                                                        <div class="flex">
                                                            <input id="checkbox-table-search-1" type="radio" name="had_declined_policy_renewal" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                            <h2 class="font-semibold text-sm ml-1 truncate">Yes</h2>
                                                        </div>
                                                        <div class="flex">
                                                            <input id="checkbox-table-search-1" type="radio" name="had_declined_policy_renewal" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                            <h2 class="font-semibold text-sm ml-1 truncate">No</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3">
                                                <x-input-label class="col-span-2">Imposed any special terms?</x-input-label>
                                                <div class="col-span-1 flex justify-between">
                                                    <div class="flex justify-between w-40">
                                                        <div class="flex">
                                                            <input id="checkbox-table-search-1" type="radio" name="has_special_terms_imposed" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                            <h2 class="font-semibold text-sm ml-1 truncate">Yes</h2>
                                                        </div>
                                                        <div class="flex">
                                                            <input id="checkbox-table-search-1" type="radio" name="has_special_terms_imposed" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                            <h2 class="font-semibold text-sm ml-1 truncate">No</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3">
                                                <x-input-label class="col-span-2">Declined any claim?</x-input-label>
                                                <div class="col-span-1 flex justify-between">
                                                    <div class="flex justify-between w-40">
                                                        <div class="flex">
                                                            <input id="checkbox-table-search-1" type="radio" name="had_claim_denied" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                            <h2 class="font-semibold text-sm ml-1 truncate">Yes</h2>
                                                        </div>
                                                        <div class="flex">
                                                            <input id="checkbox-table-search-1" type="radio" name="had_claim_denied" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                            <h2 class="font-semibold text-sm ml-1 truncate">No</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-span-3">
                                            <x-input-label>If the answer for any of the reasons is ‘YES’, Please give detail:</x-input-label>
                                            <textarea type="text" name="goods_safety" rows="4" id="goods_safety" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between my-3 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $order]) }}">
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
                        {{-- Consent and Declaration --}}
                        <div class="content md:min-h-[70vh]" id="consent-and-declaration">
                            <div class="space-y-2">
                                <span class="font-bold text-xl">Consent and Declaration</span><br>
                                <span class="font-semibold text-lg">I/We consent to The Insurance Company to:</span>
                                <ul class="list-disc">
                                    <li class="text-gray-700">Collect, use, disclose and/or process and/or store my/our personal data for purposes that are
                                        relevant to my policy and as permitted by law;</li>
                                    <li class="text-gray-700">Collect and share my personal data in accordance with its privacy statement;</li>
                                    <li class="text-gray-700">Transfer my/our personal data to their reinsurers and aliated companies for the purposes of insurance
                                        and as permitted by law;</li>
                                    <li class="text-gray-700">And/or its contracted Third parties contacting me via email/phone-call/SMS/post in regard to insurance
                                        products and/or services.</li>
                                </ul>
                                <br>
                                <p class="text-gray-700">I/We hereby declare the truth and correctness of the above statements and agree that this Declaration
                                    shall be held to be promissory and the basis of the contract between me/ us and The Insurance
                                    Company Limited.</p>
                                <br>
                                <p class="text-gray-700">
                                    I/We hereby declare the truth and correctness of all the statements and particulars entered in this Proposal
                                    and that I have not withheld any material information, and that my/our answers herein are in my/our full
                                    knowledge and have been written by me/us or with my/our full authority.
                                </p>
                                <p class="text-gray-700">
                                    I/we agree that this Declaration shall form the basis of the contract between me/us and the Insurer
                                </p>
                                <p class="text-gray-700">
                                    I/we agree to abide by the terms and conditions of the Policy to be issued.
                                </p>
                                <div class="flex gap-2 px-1 text-gray-900">
                                    <input id="checkbox-table-search-1" type="checkbox" required name="agree_to_terms_and_conditions" class="w-4 h-4 mt-1 text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    <h2 class="font-semibold">Agree</h2>
                                </div>
                            </div>
                            <div class="flex justify-between my-3 sticky top-full">
                                <a href="{{ route('orders.show', ['order' => $order]) }}">
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
    <script src="{{ asset('assets/js/buyer-insurance-report-wizard.js') }}"></script>
    <script>
        let vehicles_count = 1
        let vehicles = $('#vehicles')
        $(document.body).on('click', '#add-vehicle', function(e) {
            e.preventDefault();
            let html = '<div class="form-group col-span-1">'
                html += '<label class="block font-bold text-dark text-sm">Make & Description</label>'
                html += '<input name="vehicle_description['+vehicles_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-1">'
                html += '<label class="block font-bold text-dark text-sm">Reg Number</label>'
                html += '<input name="vehicle_reg_number['+vehicles_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-1">'
                html += '<label class="block font-bold text-dark text-sm">Carrying Capacity</label>'
                html += '<input name="vehicle_carrying_capacity['+vehicles_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-1">'
                html += '<label class="block font-bold text-dark text-sm">Sum Insured</label>'
                html += '<input name="vehicle_sum_insured['+vehicles_count+']" type="number" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>';
            $(html).appendTo(vehicles);
            vehicles_count += 1;
        })

        let trailers_count = 1
        let trailers = $('#trailers')
        $(document.body).on('click', '#add-trailer', function(e) {
            e.preventDefault();
            let html = '<div class="form-group col-span-1">'
                html += '<label class="block font-bold text-dark text-sm">Make & Description</label>'
                html += '<input name="trailer_description['+trailers_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-1 text-sm">'
                html += '<label class="block font-bold text-dark">Reg Number</label>'
                html += '<input name="trailer_reg_number['+trailers_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-1 text-sm">'
                html += '<label class="block font-bold text-dark">Carrying Capacity</label>'
                html += '<input name="trailer_carrying_capacity['+trailers_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>'
                html += '<div class="form-group col-span-1 text-sm">'
                html += '<label class="block font-bold text-dark">Sum Insured</label>'
                html += '<input name="trailer_sum_insured['+trailers_count+']" type="number" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
                html += '</div>';
            $(html).appendTo(trailers);
            trailers_count += 1;
        })

        // $(document.body).on('click', '#add-shareholder', function(e) {
        //     e.preventDefault();
        //     let html = '<div class="form-group col-span-2">'
        //         html += '<input name="shareholders['+shareholders_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
        //         html += '</div>';
        //     $(html).appendTo(shareholders);
        //     shareholders_count += 1;
        // })

        // $(document.body).on('click', '#add-manager', function(e) {
        //     e.preventDefault();
        //     let html = '<div class="form-group col-span-2">'
        //         html += '<label class="block font-bold text-dark">Name</label>'
        //         html += '<input name="manager_name['+managers_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
        //         html += '</div>'
        //         html += '<div class="form-group col-span-2">'
        //         html += '<label class="block font-bold text-dark">Position</label>'
        //         html += '<input name="manager_position['+managers_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
        //         html += '</div>'
        //         html += '<div class="form-group col-span-2">'
        //         html += '<label class="block font-bold text-dark">Duration</label>'
        //         html += '<input name="manager_position_duration['+managers_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
        //         html += '</div>';
        //     $(html).appendTo(managers);
        //     managers_count += 1;
        // })

        // $(document.body).on('click', '#add-debt', function(e) {
        //     e.preventDefault();
        //     let html = '<div class="form-group col-span-2">'
        //         html += '<label class="block font-bold text-dark">Bank Name</label>'
        //         html += '<input name="debt_bank_name['+debt_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
        //         html += '</div>'
        //         html += '<div class="form-group col-span-2">'
        //         html += '<label class="block font-bold text-dark">Facility Limit</label>'
        //         html += '<input name="debt_facility_limits['+debt_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
        //         html += '</div>'
        //         html += '<div class="form-group col-span-2">'
        //         html += '<label class="block font-bold text-dark">Current Outstanding Amount</label>'
        //         html += '<input name="debt_outstanding_amounts['+debt_count+']" type="number" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
        //         html += '</div>'
        //         html += '<div class="form-group col-span-3">'
        //         html += '<label class="block font-bold text-dark">Reason for Debt</label>'
        //         html += '<textarea type="text" name="debt_reason['+debt_count+']" rows="2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>'
        //         html += '</div>';
        //     $(html).appendTo(debts);
        //     debt_count += 1;
        // })

        // $(document.body).on('click', '#add-credit', function(e) {
        //     e.preventDefault();
        //     let html = '<div class="form-group col-span-2">'
        //         html += '<label class="block font-bold text-dark">Creditor Name</label>'
        //         html += '<input name="creditor_name['+credit_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
        //         html += '</div>'
        //         html += '<div class="form-group col-span-2">'
        //         html += '<label class="block font-bold text-dark">Facility Limit</label>'
        //         html += '<input name="credit_facility_limits['+credit_count+']" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
        //         html += '</div>'
        //         html += '<div class="form-group col-span-2">'
        //         html += '<label class="block font-bold text-dark">Current Outstanding Amount</label>'
        //         html += '<input name="credit_outstanding_amounts['+credit_count+']" type="number" class="w-full border-2 border-gray-300 dark:border-gray-300 dark:text-dark bg-slate-200 focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400 rounded-md shadow-sm h-10"></input>'
        //         html += '</div>'
        //         html += '<div class="form-group col-span-3">'
        //         html += '<label class="block font-bold text-dark">Reason for Debt</label>'
        //         html += '<textarea type="text" name="credit_reason['+credit_count+']" rows="2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>'
        //         html += '</div>';
        //     $(html).appendTo(credits);
        //     credit_count += 1;
        // })
    </script>
</x-main>
