<x-guest-layout class="w-[98%] md:w-[80%] lg:w-[60%] my-10 md:my-16 bg-white">
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
                            <x-input-label for="city" :value="__('Business Location(City/Town)')" />
                            <select name="city" id="city" class="border-2 border-gray-200 rounded-md bg-gray-200 w-full">
                                <option value="">Select City</option>
                            </select>
                            <x-input-error :messages="$errors->get('city')" class="mt-1" />
                        </div>
                    </div>

                    <div class="form-group lg:col-span-2">
                        <x-input-label for="product_link_to_warehouse" :value="__('Countries Of Operation')" class="text-black" />
                        <select name="countries_of_operation[]" id="select" class="border-2 border-gray-200 rounded-md bg-gray-200 w-full" multiple>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        {{-- <div x-data="dropdown()" x-init="loadOptions()">
                            <input name="countries_of_operation" type="hidden" x-bind:value="selectedValues()">
                            <div class="inline-block relative w-full">
                                <div class="flex flex-col items-center relative">
                                    <div x-on:click="open" class="w-full">
                                        <div class="flex border-none bg-white rounded-lg">
                                            <div class="flex flex-auto flex-wrap">
                                                <template x-for="(option,index) in selected" :key="options[option].value">
                                                    <div
                                                        class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-full text-teal-700 bg-teal-100 border border-teal-300 ">
                                                        <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="options[option]" x-text="options[option].text"></div>
                                                        <div class="flex flex-auto flex-row-reverse">
                                                            <div x-on:click="remove(index,option)">
                                                                <svg class="fill-current h-6 w-6 " role="button" viewBox="0 0 20 20">
                                                                    <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                        c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                        l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                        C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                                <div x-show="selected.length == 0" class="flex-1">
                                                    <input placeholder="Select Country where you operate"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                        x-bind:value="selectedValues()"
                                                    >
                                                </div>
                                            </div>
                                            <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                                                <button type="button" x-show="isOpen() === true" x-on:click="open"
                                                    class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                    <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                                        <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                L17.418,6.109z" />
                                                    </svg>
                                                </button>
                                                <button type="button" x-show="isOpen() === false" @click="close"
                                                    class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                                    <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                                        <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83
                                                            c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z
                                                            "/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full px-4">
                                        <div x-show.transition.origin.top="isOpen()"
                                            class="absolute shadow top-100 bg-white z-50 w-full left-0 rounded max-h-select overflow-y-auto"
                                            x-on:click.away="close">
                                            <div class="flex flex-col w-full z-50">
                                                <template x-for="(option,index) in options" :key="index">
                                                    <div>
                                                        <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100"
                                                            @click="select(index,$event)">
                                                            <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                                                class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                                                <div class="w-full items-center flex">
                                                                    <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <x-input-error :messages="$errors->get('countries_of_operation')" class="mt-2" />
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

                    <div class="flex flex-col pt-2">
                        <h1 class="text-2xl font-bold p-1">Business Identity</h1>
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

        function dropdown() {
                return {
                    options: [],
                    selected: [],
                    show: false,
                    open() { this.show = true },
                    close() { this.show = false },
                    isOpen() { return this.show === true },
                    select(index, event) {
                        if (!this.options[index].selected) {

                            this.options[index].selected = true;
                            this.options[index].element = event.target;
                            this.selected.push(index);

                        } else {
                            this.selected.splice(this.selected.lastIndexOf(index), 1);
                            this.options[index].selected = false
                        }
                    },
                    remove(index, option) {
                        this.options[option].selected = false;
                        this.selected.splice(index, 1);
                    },
                    loadOptions() {
                        const options = document.getElementById('select').options;
                        for (let i = 0; i < options.length; i++) {
                            this.options.push({
                                value: options[i].value,
                                text: options[i].innerText,
                                selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                            });
                        }
                    },
                    selectedValues(){
                        return this.selected.map((option)=>{
                            return this.options[option].value;
                        })
                    }
                }
            }
    </script>
</x-guest-layout>
