<x-main>
    <div class="">
        <div class="bg-gray-200 mx-auto px-1 md:px-8 lg:px-24 py-1 sticky top-16 z-30">
            <x-nav-categories></x-nav-categories>
        </div>
        <div class="px-2 md:px-4 lg:px-28 mt-2">
            <h2 class="font-bold text-xl">Inspection Report For {{ Str::title($order_item->product->name) }}</h2>
            <div>
                <form method="POST" action="{{ route('order.inspection.report.store', ['order_item' => $order_item]) }}" id="submit-wallet-form" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-3 gap-3">
                        <div class="col-span-3">
                            <h5 class="font-semibold text-lg">Applicant</h5>
                        </div>
                        {{-- Applicant --}}
                        <div class="">
                            <label for="name">Applicant Company Name</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" placeholder="Enter Applicant Company Name" name="applicant_company_name" value="{{ old('applicant_company_name') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('applicant_company_name')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="name">Applicant Company Address</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" placeholder="Enter Applicant Company Address" name="applicant_company_address" value="{{ old('applicant_company_address') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('applicant_company_address')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">Applicant Company Email</label>
                            <div class="form-group">
                                <x-text-input type="email" class="w-full" name="applicant_company_email" value="{{ old('applicant_company_email') }}"></x-text-input>
                                <x-input-error :messages="$errors->get('applicant_company_email')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">Applicant Company Phone Number</label>
                            <div class="form-group">
                                <x-text-input type="tel" class="w-full" name="applicant_company_phone_number" value="{{ old('applicant_company_phone_number') }}"></x-text-input>
                                <x-input-error :messages="$errors->get('applicant_company_phone_number')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="name">Applicant Company Contact Person</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" placeholder="Enter Applicant Company Contact Person" name="applicant_company_contact_person" value="{{ old('applicant_company_contact_person') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('applicant_company_contact_person')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="name">Applicant Company Contact Person Email</label>
                            <div class="form-group">
                                <x-text-input type="email" class="w-full" placeholder="Enter Applicant Company Contact Person" name="applicant_company_contact_person_email" value="{{ old('applicant_company_contact_person_email') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('applicant_company_contact_person_email')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">Applicant Company Contact Person Phone Number</label>
                            <div class="form-group">
                                <x-text-input type="tel" class="w-full" name="applicant_company_contact_person_phone_number" value="{{ old('applicant_company_contact_person_phone_number') }}"></x-text-input>
                                <x-input-error :messages="$errors->get('applicant_company_contact_person_phone_number')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        {{-- End Applicant --}}
                        {{-- License Holder --}}
                        <div class="col-span-3">
                            <h5 class="font-semibold text-lg">License Holder</h5>
                        </div>
                        <div class="">
                            <label for="name">License Company Name</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" placeholder="Enter License Company Name" name="license_holder_company_name" value="{{ old('license_holder_company_name') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('license_holder_company_name')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="name">License Company Address</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" placeholder="Enter License Company Address" name="license_holder_company_address" value="{{ old('license_holder_company_address') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('license_holder_company_address')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">License Company Email</label>
                            <div class="form-group">
                                <x-text-input type="email" class="w-full" name="license_holder_company_email" :value="old('license_holder_company_email')"></x-text-input>
                                <x-input-error :messages="$errors->get('license_holder_company_email')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">License Company Phone Number</label>
                            <div class="form-group">
                                <x-text-input type="tel" class="w-full" name="license_holder_company_phone_number" :value="old('license_holder_company_phone_number')"></x-text-input>
                                <x-input-error :messages="$errors->get('license_holder_company_phone_number')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="name">Licenst Company Contact Person</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" placeholder="Enter License Holder Company Contact Person" name="license_holder_company_contact_person" value="{{ old('license_holder_company_contact_person') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('license_holder_company_contact_person')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="name">License Company Contact Person Email</label>
                            <div class="form-group">
                                <x-text-input type="email" class="w-full" placeholder="Enter License Company Contact Person Email" name="license_holder_company_contact_person_email" value="{{ old('license_holder_company_contact_person_email') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('license_holder_company_contact_person_email')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">License Company Contact Person Phone Number</label>
                            <div class="form-group">
                                <x-text-input type="tel" class="w-full" name="license_holder_company_contact_person_phone_number" :value="old('license_holder_company_contact_person_phone_number')"></x-text-input>
                                <x-input-error :messages="$errors->get('license_holder_company_contact_person_phone_number')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        {{-- End License Holder --}}
                        {{-- Place of Manufacture --}}
                        <div class="col-span-3">
                            <h5 class="font-semibold text-lg">Place of Manufacture</h5>
                        </div>
                        <div class="">
                            <label for="name">Place of Manufacture Company Name</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" placeholder="Enter Manufacture Place Company Name" name="place_of_manufacture_company_name" value="{{ old('place_of_manufacture_company_name') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('place_of_manufacture_company_name')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="name">Place of Manufacture Company Address</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" placeholder="Enter Manufacture Place Company Address" name="place_of_manufacture_company_address" value="{{ old('place_of_manufacture_company_address') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('place_of_manufacture_company_address')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">Place of Manufacture Company Email</label>
                            <div class="form-group">
                                <x-text-input type="email" class="w-full" name="place_of_manufacture_company_email" :value="old('place_of_manufacture_company_email')"></x-text-input>
                                <x-input-error :messages="$errors->get('place_of_manufacture_company_email')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">Place of Manufacture Company Phone Number</label>
                            <div class="form-group">
                                <x-text-input type="tel" class="w-full" name="place_of_manufacture_company_phone_number" :value="old('place_of_manufacture_company_phone_number')"></x-text-input>
                                <x-input-error :messages="$errors->get('place_of_manufacture_company_phone_number')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="name">Place of Manufacture Company Contact Person</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" placeholder="Enter Manufacture Place Holder Company Contact Person" name="place_of_manufacture_company_contact_person" value="{{ old('place_of_manufacture_company_contact_person') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('place_of_manufacture_company_contact_person')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="name">Place of Manufacture Company Contact Person Email</label>
                            <div class="form-group">
                                <x-text-input type="email" class="w-full" placeholder="Enter Manufacture Place Company Contact Person Email" name="place_of_manufacture_company_contact_person_email" value="{{ old('place_of_manufacture_company_contact_person_email') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('place_of_manufacture_company_contact_person_email')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">Place of Manufacture Company Contact Person Phone Number</label>
                            <div class="form-group">
                                <x-text-input type="tel" class="w-full" name="place_of_manufacture_company_contact_person_phone_number" :value="old('place_of_manufacture_company_contact_person_phone_number')"></x-text-input>
                                <x-input-error :messages="$errors->get('place_of_manufacture_company_contact_person_phone_number')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">Place of Manufacture Inspection Done By</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" name="place_of_manufacture_factory_inspection_done_by" :value="old('place_of_manufacture_factory_inspection_done_by')"></x-text-input>
                                <x-input-error :messages="$errors->get('place_of_manufacture_factory_inspection_done_by')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        {{-- End place of Manufacture --}}

                        {{-- Product --}}
                        <div class="col-span-3">
                            <h5 class="font-semibold text-lg">Product</h5>
                        </div>
                        <div class="">
                            <label for="name">Product</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" placeholder="Enter Product" name="product" value="{{ old('product') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('product')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="name">Product Type Ref</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" placeholder="" name="product_type_ref" value="{{ old('product_type_ref') }}" autocomplete="off"></x-text-input>
                                <x-input-error :messages="$errors->get('product_type_ref')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">Product Trademark</label>
                            <div class="form-group">
                                <x-text-input type="text" class="w-full" name="product_trade_mark" :value="old('product_trade_mark')"></x-text-input>
                                <x-input-error :messages="$errors->get('product_trade_mark')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">Product Ratings and Principle Characteristics</label>
                            <div class="form-group">
                                <textarea type="text" class="w-full border border-gray-400 rounded-lg placeholder-gray-400" name="product_ratings_and_principle_characteristics" rows="3"></textarea>
                                <x-input-error :messages="$errors->get('product_ratings_and_principle_characteristics')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                        <div class="">
                            <label for="Max Capacity">Differences From Previously Certifed Product</label>
                            <div class="form-group">
                                <textarea type="text" class="w-full border border-gray-400 rounded-lg placeholder-gray-400" name="differences_from_previously_certified_product" rows="3"></textarea>
                                <x-input-error :messages="$errors->get('differences_from_previously_certified_product')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>

                        <div class="">
                            <div class="row">
                                <div class="">
                                    <label for="">General Product Validity Status</label>
                                    <select name="product_validity" id="" class="border-2 border-gray-300 rounded-md bg-gray-200 w-full focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400">
                                        <option value="valid">Valid</option>
                                        <option value="invalid">Invalid</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <label for="Max Capacity">Applicant Signature</label>
                            <div class="form-group">
                                <x-text-input type="file" accept=".pdf" name="applicant_sign" class="w-full" id=""></x-text-input>
                                <x-input-error :messages="$errors->get('applicant_sign')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>

                        <div class="">
                            <label for="Max Capacity">Certificate</label>
                            <div class="form-group">
                                <x-text-input type="file" accept=".pdf" name="report" class="w-full" id="" required></x-text-input>
                                <x-input-error :messages="$errors->get('report')" class="mt-2 list-unstyled"></x-input-error>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between my-2 sticky top-full">
                        <a href="{{ route('orders.show', ['order' => $order_item->order]) }}">
                            <x-secondary-outline-button class="border-gray-700">
                                Cancel
                            </x-secondary-outline-button>
                        </a>
                        <div class="flex gap-2">
                            <x-primary-button class="px-4 py-2 text-lg">Submit</x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/datepicker.min.js"></script>
</x-main>
