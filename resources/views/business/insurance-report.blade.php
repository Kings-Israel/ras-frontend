<x-app-layout>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
    <!-- Page Heading -->
    <x-page-nav-header main-title="Orders" sub-title="Upload Insurance Report" />
    <div class="p-3 sm:ml-64">
        <div class="bs-stepper wizard ml-2" id="insurance-report-wizard">
            <div class="bs-stepper-header mb-4 w-full overflow-y-auto">
                <div class="step pb-2" data-target="#business-details">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">Business Details</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="step" data-target="#subsidiaries">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">Subsidiaries to be Insured</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="step" data-target="#business-information">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">Information on Your Business</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="step" data-target="#business-sales-information">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">Information on Your Sales</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="step" data-target="#securities-information">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">5</span>
                        <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">Securities Information</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="step" data-target="#credit-management-information">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">6</span>
                        <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">Credit Management Information</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="step" data-target="#additional-information">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">7</span>
                        <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">Additional Information</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i class="fas fa-chevron-right"></i>
                </div>
                <div class="step" data-target="#consent-and-declaration">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">8</span>
                        <span class="bs-stepper-label mt-1">
                        <span class="bs-stepper-title">Consent and Declaration</span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <form action="#" method="POST" id="insurance-report-wizard-form" class="space-y-4 my-4" enctype="multipart/form-data">
                    @csrf
                    {{-- Business Details --}}
                    <div class="content md:min-h-[74vh]" id="business-details">
                        <div class="grid grid-cols-6 gap-3">
                            <div class="form-group col-span-2">
                                <x-input-label>Company Name</x-input-label>
                                <x-text-input name="company_name" placeholder="Enter Company Name" value="{{ auth()->user()->business->name }}" class="w-full"></x-text-input>
                            </div>
                            <div class="form-group col-span-2">
                                <x-input-label>Registration Number</x-input-label>
                                <x-text-input name="company_registration_number" class="w-full"></x-text-input>
                            </div>
                            <div class="form-group col-span-2">
                                <x-input-label>PIN No.</x-input-label>
                                <x-text-input name="company_pin_number" class="w-full"></x-text-input>
                            </div>
                            <div class="form-group col-span-2">
                                <x-input-label>Contact Email</x-input-label>
                                <x-text-input name="company_email" type="email" value="{{ auth()->user()->business->contact_email }}" class="w-full"></x-text-input>
                            </div>
                            <div class="form-group col-span-2">
                                <x-input-label>Contact Email</x-input-label>
                                <x-text-input name="company_phone_number" type="tel" value="{{ auth()->user()->business->contact_phone_number }}" class="w-full"></x-text-input>
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
                        </div>
                        <div class="flex justify-between my-2 sticky top-full">
                            <a href="{{ route('vendor.orders.show', ['order' => $order]) }}">
                                <x-secondary-outline-button>
                                    Cancel
                                </x-secondary-outline-button>
                            </a>
                            <div class="flex gap-2">
                                <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                            </div>
                        </div>
                    </div>
                    {{-- Subsidiaries --}}
                    <div class="content md:min-h-[74vh]" id="subsidiaries">
                        <div class="flex gap-3">
                            <x-input-label>Period of Insurance:</x-input-label>
                            <div date-rangepicker class="flex items-center">
                                <span class="mx-4 text-gray-500">From</span>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                                </div>
                                <span class="mx-4 text-gray-500">to</span>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <span class="flex justify-between">
                                <span class="font-bold text-xl">Subsidiaries to be Insured</span>
                                <x-primary-button class="px-4" id="add-banker">Add Subsidiary</x-primary-button>
                            </span>
                            <div class="col-span-2 grid grid-cols-2 gap-3" id="subsidiaries-to-insurer">
                                <div class="form-group col-span-1">
                                    <x-input-label>Name</x-input-label>
                                    <x-text-input name="bank_names[]" class="w-full"></x-text-input>
                                </div>
                                <div class="form-group col-span-1">
                                    <x-input-label>Address</x-input-label>
                                    <x-text-input name="bank_branches[]" class="w-full"></x-text-input>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between my-2 sticky top-full">
                            <a href="{{ route('vendor.orders.show', ['order' => $order]) }}">
                                <x-secondary-outline-button>
                                    Cancel
                                </x-secondary-outline-button>
                            </a>
                            <div class="flex gap-2">
                                <x-secondary-outline-button class="btn-prev"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                            </div>
                        </div>
                    </div>
                    {{-- Business Information --}}
                    <div class="content md:min-h-[74vh]" id="business-information">
                        <div class="grid grid-cols-2 gap-3">
                            <div class="form-group col-span-2">
                                <x-input-label>General Description of your business</x-input-label>
                                <textarea type="text" name="debt_reason[]" rows="2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                            </div>
                            <div class="form-group col-span-1">
                                <x-input-label>Number of Employees</x-input-label>
                                <x-text-input name="company_registration_number" type="number" class="w-full"></x-text-input>
                            </div>
                            <div class="form-group col-span-1">
                                <x-input-label>Goods being Insured</x-input-label>
                                <x-text-input name="company_postal_address" class="w-full"></x-text-input>
                            </div>
                            <div class="form-group col-span-1">
                                <x-input-label>Do you manufacture the product that you are selling?</x-input-label>
                                <div class="flex justify-between w-96">
                                    <div class="flex">
                                        <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                    </div>
                                    <div class="flex">
                                        <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-span-1">
                                <x-input-label for="company_clients_information" :value="__('If No, Please give details')" class="text-black" />
                                <textarea type="text" name="company_clients_information" rows="2" id="company_clients_information" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                <x-input-error :messages="$errors->get('company_clients_information')" class="mt-2" />
                            </div>
                            <div class="form-group col-span-1">
                                <x-input-label>What are your normal terms of payment?</x-input-label>
                                <x-text-input name="company_city" class="w-full"></x-text-input>
                            </div>
                            <div class="form-group col-span-1">
                                <x-input-label>What are your maximum terms of payment?</x-input-label>
                                <x-text-input name="company_physical_address" class="w-full"></x-text-input>
                            </div>
                            <div class="form-group col-span-2">
                                <x-input-label for="company_clients_information" :value="__('Details of any security, guarantees, non-recourse financing and credit insurance on place in respect of buyers insured')" class="text-black" />
                                <textarea type="text" name="company_clients_information" rows="4" id="company_clients_information" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                <x-input-error :messages="$errors->get('company_clients_information')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex justify-between my-2 sticky top-full">
                            <a href="{{ route('vendor.orders.show', ['order' => $order]) }}">
                                <x-secondary-outline-button>
                                    Cancel
                                </x-secondary-outline-button>
                            </a>
                            <div class="flex gap-2">
                                <x-secondary-outline-button class="btn-prev"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                            </div>
                        </div>
                    </div>
                    {{-- Business Sales Information --}}
                    <div class="content md:min-h-[74vh]" id="business-sales-information">
                        <div class="grid grid-cols-5 gap-3">
                            <span class="col-span-5 flex justify-between">
                                <span class="font-bold text-xl">Business Sales Information</span>
                            </span>
                            <div class="form-group col-span-2">
                                <x-input-label>Currency</x-input-label>
                                <x-text-input name="company_physical_address" class="w-full"></x-text-input>
                            </div>
                            <div class="form-group col-span-3">
                                <x-input-label>Estimated sales for the year</x-input-label>
                                <x-text-input name="company_physical_address" class="w-full"></x-text-input>
                            </div>
                            <div class="form-group col-span-2">
                                <x-input-label>Are the sales seasonal?</x-input-label>
                                <div class="flex justify-between w-96">
                                    <div class="flex">
                                        <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                    </div>
                                    <div class="flex">
                                        <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-span-3">
                                <x-input-label for="company_clients_information" :value="__('If Yes, Please give details')" class="text-black" />
                                <textarea type="text" name="company_clients_information" rows="2" id="company_clients_information" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                <x-input-error :messages="$errors->get('company_clients_information')" class="mt-2" />
                            </div>
                            <div class="col-span-5 mt-2">
                                <span class="flex justify-between">
                                    <span class="font-bold text-xl">Bad Debts</span>
                                    <x-primary-button class="px-4" id="add-banker">Add Debt</x-primary-button>
                                </span>
                                <div class="col-span-5 grid grid-cols-5 gap-3" id="debtors">
                                    <div class="form-group col-span-1">
                                        <x-input-label>Period</x-input-label>
                                        <x-text-input name="bank_names[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-1">
                                        <x-input-label>Sales</x-input-label>
                                        <x-text-input name="bank_branches[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-1">
                                        <x-input-label>Total Bad Debts</x-input-label>
                                        <x-text-input name="bank_branches[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-1">
                                        <x-input-label>Larget bad debts</x-input-label>
                                        <x-text-input name="bank_branches[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-1">
                                        <x-input-label>No. of Bad Debts</x-input-label>
                                        <x-text-input name="bank_branches[]" class="w-full"></x-text-input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-5 mt-2">
                                <span class="flex justify-between">
                                    <span class="font-bold text-xl">Largest Bad Debts</span>
                                    <x-primary-button class="px-4" id="add-banker">Add Debt</x-primary-button>
                                </span>
                                <div class="col-span-5 grid grid-cols-5 gap-3" id="debtors">
                                    <div class="form-group col-span-1">
                                        <x-input-label>Year</x-input-label>
                                        <x-text-input name="bank_names[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-1">
                                        <x-input-label>Name of Buyer</x-input-label>
                                        <x-text-input name="bank_branches[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-1">
                                        <x-input-label>Country</x-input-label>
                                        <x-text-input name="bank_branches[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-1">
                                        <x-input-label>Registration Number</x-input-label>
                                        <x-text-input name="bank_branches[]" class="w-full"></x-text-input>
                                    </div>
                                    <div class="form-group col-span-1">
                                        <x-input-label>Amount of Loss</x-input-label>
                                        <x-text-input name="bank_branches[]" class="w-full"></x-text-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between my-2 sticky top-full">
                            <a href="{{ route('vendor.orders.show', ['order' => $order]) }}">
                                <x-secondary-outline-button>
                                    Cancel
                                </x-secondary-outline-button>
                            </a>
                            <div class="flex gap-2">
                                <x-secondary-outline-button class="btn-prev"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                            </div>
                        </div>
                    </div>
                    {{-- Securities Information --}}
                    <div class="content md:min-h-[74vh]" id="securities-information">
                        <div class="grid grid-cols-2 gap-3">
                            <span class="col-span-2 flex justify-between">
                                <span class="font-bold text-xl">Securities Information</span>
                            </span>
                            <div class="form-group col-span-2">
                                <x-input-label>Do your contracts with your customers allow you to be the principle entitled to take recovery action?</x-input-label>
                                <div class="flex justify-between w-96">
                                    <div class="flex">
                                        <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                    </div>
                                    <div class="flex">
                                        <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-span-2">
                                <x-input-label for="company_clients_information" :value="__('If No, Please give details')" class="text-black" />
                                <textarea type="text" name="company_clients_information" rows="2" id="company_clients_information" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                <x-input-error :messages="$errors->get('company_clients_information')" class="mt-2" />
                            </div>
                            <div class="form-group col-span-2">
                                <x-input-label>Do your standard terms and conditions contain "All Monies" retention and title clause?</x-input-label>
                                <div class="flex justify-between w-96">
                                    <div class="flex">
                                        <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                    </div>
                                    <div class="flex">
                                        <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-span-2">
                                <x-input-label for="company_clients_information" :value="__('If No, Please give details')" class="text-black" />
                                <textarea type="text" name="company_clients_information" rows="2" id="company_clients_information" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                <x-input-error :messages="$errors->get('company_clients_information')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex justify-between my-2 sticky top-full">
                            <a href="{{ route('vendor.orders.show', ['order' => $order]) }}">
                                <x-secondary-outline-button>
                                    Cancel
                                </x-secondary-outline-button>
                            </a>
                            <div class="flex gap-2">
                                <x-secondary-outline-button class="btn-prev"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                            </div>
                        </div>
                    </div>
                    {{-- Credit Management Information --}}
                    <div class="content md:min-h-[74vh]" id="credit-management-information">
                        <div class="grid grid-cols-3 gap-3">
                            <span class="col-span-3 flex justify-between">
                                <span class="font-bold text-xl">Information on your Credit Management</span>
                            </span>
                            <div class="col-span-3">
                                <div class="grid grid-cols-2">
                                    <div class="col-span-1">
                                        <div class="grid grid-cols-3">
                                            <div class="col-span-3">
                                                <x-input-label>Do you have a separate credit management department?</x-input-label>
                                                <div class="flex justify-between w-32">
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                                    </div>
                                                    <div class="flex">
                                                        <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                        <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="grid grid-cols-3">
                                            <x-input-label class="col-span-3">Who in your company is responsible for your credit management?</x-input-label>
                                            <div class="col-span-2 flex gap-2">
                                                <div class="form-group">
                                                    <x-input-label>Name</x-input-label>
                                                    <x-text-input name="bank_branches[]" class="w-full"></x-text-input>
                                                </div>
                                                <div class="form-group">
                                                    <x-input-label>Position</x-input-label>
                                                    <x-text-input name="bank_branches[]" class="w-full"></x-text-input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-3 flex gap-3">
                                <x-input-label>Do you asses you customer's credit worthiness?</x-input-label>
                                <div class="flex justify-between w-24">
                                    <div class="flex">
                                        <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                    </div>
                                    <div class="flex">
                                        <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-3 grid grid-cols-3">
                                <x-input-label class="col-span-3">If Yes, please indicate with method(s) you use?</x-input-label>
                                <div class="col-span-3 grid grid-cols-5">
                                    <div class="col-span-2 grid grid-cols-2">
                                        <x-input-label class="col-span-1">Bank or Trade Reference</x-input-label>
                                        <div class="col-span-1 grid grid-cols-2">
                                            <div class="cols-span-1 flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                            </div>
                                            <div class="cols-span-1 flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3 grid grid-cols-5">
                                    <div class="col-span-2 grid grid-cols-2">
                                        <x-input-label class="col-span-1">Trading History</x-input-label>
                                        <div class="col-span-1 grid grid-cols-2">
                                            <div class="cols-span-1 flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                            </div>
                                            <div class="cols-span-1 flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3 grid grid-cols-5">
                                    <div class="col-span-2 grid grid-cols-2">
                                        <x-input-label class="col-span-1">Credit insurance on-line service</x-input-label>
                                        <div class="col-span-1 grid grid-cols-2">
                                            <div class="cols-span-1 flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                            </div>
                                            <div class="cols-span-1 flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3 grid grid-cols-5">
                                    <div class="col-span-2 grid grid-cols-2">
                                        <x-input-label class="col-span-1">Credit Agency Report</x-input-label>
                                        <div class="col-span-1 grid grid-cols-2">
                                            <div class="cols-span-1 flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                            </div>
                                            <div class="cols-span-1 flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <x-input-label>If Yes, indicate which agencies</x-input-label>
                                        <x-text-input class="w-full"></x-text-input>
                                    </div>
                                </div>
                                <div class="col-span-3">
                                    <div class="grid grid-cols-3">
                                        <div class="col-span-2 flex gap-2">
                                            <x-input-label>Do you risk-score your buyers?</x-input-label>
                                            <div class="flex justify-between w-24">
                                                <div class="flex">
                                                    <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                    <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                                </div>
                                                <div class="flex">
                                                    <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                    <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-3 flex gap-2">
                                    <x-input-label>How often do you update your credit report?</x-input-label>
                                    <x-text-input class="w-72"></x-text-input>
                                </div>
                                <div class="col-span-3 grid grid-cols-3">
                                    <div class="col-span-1">
                                        <x-input-label>Do you currently have a credit insurance policy?</x-input-label>
                                        <div class="flex justify-between w-32">
                                            <div class="flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                            </div>
                                            <div class="flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <x-input-label>If Yes, give details of insurer, renewal date and premium costs?</x-input-label>
                                        <textarea type="text" name="company_clients_information" rows="2" id="company_clients_information" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                        <x-input-error :messages="$errors->get('company_clients_information')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-span-3 grid grid-cols-2">
                                    <div class="col-span-1">
                                        <x-input-label>Have you ever been refused credit insurance policy or had a policy avoided?</x-input-label>
                                        <div class="flex justify-between w-32">
                                            <div class="flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="Yes" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">Yes</h2>
                                            </div>
                                            <div class="flex">
                                                <input id="checkbox-table-search-1" type="radio" name="facility_duration" value="No" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                <h2 class="font-semibold text-sm ml-2 truncate">No</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-1">
                                        <x-input-label>If Yes, explain why</x-input-label>
                                        <textarea type="text" name="company_clients_information" rows="2" id="company_clients_information" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                        <x-input-error :messages="$errors->get('company_clients_information')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between my-2 sticky top-full">
                            <a href="{{ route('vendor.orders.show', ['order' => $order]) }}">
                                <x-secondary-outline-button>
                                    Cancel
                                </x-secondary-outline-button>
                            </a>
                            <div class="flex gap-2">
                                <x-secondary-outline-button class="btn-prev"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                            </div>
                        </div>
                    </div>
                    {{-- Additional Information --}}
                    <div class="content md:min-h-[74vh]" id="additional-information">
                        <div class="grid grid-cols-2 gap-3">
                            <span class="col-span-2">
                                <span class="font-bold text-xl">Additional Information</span>
                            </span>
                            <div class="col-span-2">
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="col-span-1">
                                        <x-input-label>Please attach copy of credit management procedures (if avalable)</x-input-label>
                                    </div>
                                    <x-input-file accept=".pdf" class="col-span-2 w-64" name="company_documents"></x-input-file>
                                </div>
                            </div>
                            <x-input-label class="col-span-2">Sales Information</x-input-label>
                            <div class="col-span-2 grid grid-cols-6 gap-2">
                                <div class="col-span-1">
                                    <x-input-label>Country</x-input-label>
                                    <x-text-input class="w-full"></x-text-input>
                                </div>
                                <div class="col-span-1">
                                    <x-input-label>Sales in last 12 Months</x-input-label>
                                    <x-text-input class="w-full"></x-text-input>
                                </div>
                                <div class="col-span-1">
                                    <x-input-label>Projected 12 Months Sales</x-input-label>
                                    <x-text-input class="w-full"></x-text-input>
                                </div>
                                <div class="col-span-1">
                                    <x-input-label>Country Limit Required</x-input-label>
                                    <x-text-input class="w-full"></x-text-input>
                                </div>
                                <div class="col-span-2">
                                    <x-input-label>Terms of Payments</x-input-label>
                                    <textarea type="text" name="company_clients_information" rows="2" id="company_clients_information" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between my-2 sticky top-full">
                            <a href="{{ route('vendor.orders.show', ['order' => $order]) }}">
                                <x-secondary-outline-button>
                                    Cancel
                                </x-secondary-outline-button>
                            </a>
                            <div class="flex gap-2">
                                <x-secondary-outline-button class="btn-prev"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                <x-primary-button class="px-4 py-2 text-lg btn-next">Next</x-primary-button>
                            </div>
                        </div>
                    </div>
                    {{-- Credit Terms and Confidentiality Statement --}}
                    <div class="content md:min-h-[74vh]" id="consent-and-declaration">
                        <div class="space-y-2">
                            <span class="font-bold text-xl">Consent and Declaration</span><br>
                            <span class="font-semibold text-lg">I/We consent to The Insurance Company to:</span>
                            <ul class="list-disc">
                                <li class="text-gray-700">Collecting, using, disclosing and/or processing and/or storing my/our personal data for purposes that are
                                    relevant to my policy and as permitted by law;</li>
                                <li class="text-gray-700">Collecting and sharing my personal data in accordance with its privacy statement;</li>
                                <li class="text-gray-700">Transferring my/our personal data to their reinsurers and aliated companies for the purposes of insurance
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
                        <div class="flex justify-between my-2 sticky top-full">
                            <a href="{{ route('vendor.orders.show', ['order' => $order]) }}">
                                <x-secondary-outline-button>
                                    Cancel
                                </x-secondary-outline-button>
                            </a>
                            <div class="flex gap-2">
                                <x-secondary-outline-button class="btn-prev"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                                <x-primary-button class="px-4 py-2 text-lg">Submit</x-primary-button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
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
        <script src="{{ asset('assets/js/insurance-report-wizard.js') }}"></script>
        <script>
            function decrement(e) {
                const btn = e.target.parentNode.parentElement.querySelector(
                    'button[data-action="decrement"]'
                );
                const target = btn.nextElementSibling;
                let value = Number(target.value);
                value--;
                target.value = value;
            }

            function increment(e) {
                const btn = e.target.parentNode.parentElement.querySelector(
                    'button[data-action="decrement"]'
                );
                const target = btn.nextElementSibling;
                let value = Number(target.value);
                value++;
                target.value = value;
            }

            const decrementButtons = document.querySelectorAll(
                `button[data-action="decrement"]`
            );

            const incrementButtons = document.querySelectorAll(
                `button[data-action="increment"]`
            );

            decrementButtons.forEach(btn => {
                btn.addEventListener("click", decrement);
            });

            incrementButtons.forEach(btn => {
                btn.addEventListener("click", increment);
            });
        </script>
    @endpush
</x-app-layout>