<x-guest-layout class="w-[98%] md:w-[80%] lg:w-[60%] my-10 md:my-16">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />

    <div class="bs-stepper wizard p-4" id="business-details-wizard">
        <div class="bs-stepper-header mb-4">
            <div class="step" data-target="#business-details">
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
            <div class="step" data-target="#business-documents">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label mt-1">
                      <span class="bs-stepper-title">Documents</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="bs-stepper-content">
            <form method="POST" action="{{ route('auth.business.create') }}" id="business-details-wizard-form" enctype="multipart/form-data">
                @csrf
                <div class="space-y-2 content" id="business-details">
                    <div class="flex flex-col py-1">
                        <h1 class="text-3xl font-bold">Business Profile</h1>
                    </div>
                    <!-- Business Name -->
                    <div class="form-group">
                        <x-input-label for="name" :value="__('Business/Store Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="off" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-2">
                        {{-- Business Country --}}
                        <div class="form-group">
                            <x-input-label for="country" :value="__('Business Location(Country)')" />
                            <livewire:vendor.profile.select-country />
                            <x-input-error :messages="$errors->get('country')" class="mt-1" />
                        </div>

                        {{-- Business City --}}
                        <div>
                            <x-input-label for="city" :value="__('Business Location(City)')" />
                            <select name="city" id="city" class="border-2 border-gray-200 rounded-md bg-gray-200 w-full">
                                <option value="">Select City</option>
                            </select>
                            <x-input-error :messages="$errors->get('city')" class="mt-1" />
                        </div>
                    </div>

                    <!-- Primary Cover Image -->
                    <div class="mt-3 form-group">
                        <x-input-label for="primary_cover_image" :value="__('Primary Cover Image')" />
                        <x-input-file id="primary_cover_image" type="file" name="primary_cover_image" :value="old('primary_cover_image')" />
                        <x-input-error :messages="$errors->get('primary_cover_image')" class="mt-1" />
                    </div>

                    <!-- Secondary Cover Image -->
                    <div class="mt-3">
                        <x-input-label for="secondary_cover_image" :value="__('Secondary Cover Image')" />
                        <x-input-file id="secondary_cover_image" type="file" name="secondary_cover_image" :value="old('secondary_cover_image')" />
                        <x-input-error :messages="$errors->get('secondary_cover_image')" class="mt-1" />
                    </div>

                    <div class="flex mt-4 justify-end">
                        <x-primary-button class="w-2/5 font-semibold rounded-lg px-5 py-2.5 text-center btn-next">
                            {{ __('Next') }}
                        </x-primary-button>
                    </div>
                </div>

                <div id="business-documents" class="content">
                    <div class="flex flex-col py-3">
                        <h1 class="text-3xl font-bold p-1">Business Validity Documents</h1>
                    </div>

                    <livewire:vendor.profile.upload-documents />

                    <div class="flex mt-3 justify-end gap-2">
                        <x-secondary-outline-button class="btn-prev"> <i class="fas fa-arrow-left mr-2 my-auto"></i> Back</x-secondary-outline-button>
                        <x-primary-button class="w-full lg:w-[40%] ml-2 py-2 font-semibold tracking-wide">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
    <script src="{{ asset('assets/js/business-profile-wizard.js') }}"></script>
    <script>
        function getDetails() {
            let country = $('#country').find(':selected').val()
            let cities = $('#country').find(':selected').data('cities');
            let required_documents = $('#country').find(':selected').data('documents');
            let cityOptions = document.getElementById('city')
            while (cityOptions.options.length) {
                cityOptions.remove(0);
            }
            var city = new Option('Select City', '');
            cityOptions.options.add(city);
            if (cities) {
                var i;
                for (i = 0; i < cities.length; i++) {
                    var city = new Option(cities[i].name, cities[i].id);
                    cityOptions.options.add(city);
                }
            }
        }
    </script>
</x-guest-layout>
