<x-guest-layout class="w-[98%] md:w-[80%] lg:w-[40%] my-10 md:my-16 bg-white">
    <div class="">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="flex flex-col text-center py-2">
            <h1 class="text-3xl font-bold p-2">Create Wallet</h1>
            <span class="p-1">Create Your Wallet Account to perform transactions</span>
        </div>

        <form method="POST" action="{{ route('wallet.store') }}" id="submit-wallet-form">
            @csrf
            <!-- Birth Date -->
            <div class="w-full">
                <x-input-label for="birth_date" :value="__('Birth Date')" />
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input id="date-select" datepicker autocomplete="off" type="text" name="date_of_birth" value="{{ old('date_of_birth') }}" class="w-full bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-400 dark:focus:ring-gray-400 block ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Select date">
                </div>
                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                    <p class="text-red-600 hidden" id="date-select-error">Select Valid Date</p>
            </div>

            <div class="grid md:grid-cols-2 md:gap-2">
                <!-- Identity Type -->
                <div class="mt-4">
                    <x-input-label for="identity_type" :value="__('Identity Type')" />
                    <select name="identity_type" id="identity_type" class="border-2 border-gray-300 rounded-md bg-gray-200 w-full focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400">
                        <option value="">Select Identity Type</option>
                        <option value="NationalId" @if(old('identity_type') == 'NationalId') selected @endif>National Id</option>
                        <option value="Passport" @if(old('identity_type') == 'Passport') selected @endif>Passport</option>
                    </select>
                </div>

                <!-- ID Number -->
                <div class="mt-4">
                    <x-input-label for="id_number" :value="__('ID Number')" />
                    <x-text-input id="id_number" class="block mt-1 w-full"
                                    type="number"
                                    name="id_number"
                                    required autocomplete="off" />

                    <x-input-error :messages="$errors->get('id_number')" class="mt-2" />
                </div>
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <select name="gender" id="gender" class="border-2 border-gray-300 rounded-md bg-gray-200 w-full focus:border-gray-400 dark:focus:border-gray-400 focus:ring-gray-400 dark:focus:ring-gray-400">
                    <option value="">Select Gender</option>
                    <option value="Male" @if(old('gender') == 'Male') selected @endif>Male</option>
                    <option value="Female" @if(old('gender') == 'Female') selected @endif>Female</option>
                </select>
            </div>

            <!-- County -->
            <div class="form-group mt-4">
                <x-input-label for="county" :value="__('Enter County of Residence')" />
                <x-text-input id="county" class="block mt-1 w-full" type="text" name="county" :value="old('county')" autocomplete="off" />
                <x-input-error :messages="$errors->get('county')" class="mt-1" />
            </div>

            <!-- Physical Address -->
            <div class="form-group mt-4">
                <x-input-label for="Physical Address" :value="__('Enter Physical Address')" />
                <x-text-input id="physical_address" class="block mt-1 w-full" type="text" name="physical_address" :value="old('physical_address')" autocomplete="off" />
                <x-input-error :messages="$errors->get('physical_address')" class="mt-1" />
            </div>

            <div class="flex mt-4 justify-between">
                <a href="#" class="">
                    <x-secondary-outline-button>
                        {{ __('Help') }}
                    </x-secondary-outline-button>
                </a>

                <x-primary-button class="w-full lg:w-[60%] tracking-wide ml-2">
                    {{ __('Create Wallet') }}
                </x-primary-button>
            </div>

        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/datepicker.min.js"></script>
    <script>
        // $('#submit-wallet-form').on('submit', function(e) {
        //     e.preventDefault()
        //     let selected_date = new Date($('#date-select').val())
        //     let current_date = new Date()
        //     // console.log(selected_date)
        //     if (selected_date > current_date) {
        //         $('#date-select-error').removeClass('hidden')
        //         $('#date-select').removeClass('border-gray-300').addClass('border-red-500')
        //         setTimeout(() => {
        //             $('#date-select-error').addClass('hidden')
        //         }, 5000);
        //     } else {
        //         $(this).submit()
        //     }
        // })
    </script>
</x-guest-layout>
