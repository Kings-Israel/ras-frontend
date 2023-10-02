<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Profile" sub-title="View Your Profile Here" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div class="relative">
                <img src="{{ auth()->user()->business->primary_cover_image }}" alt="" class="rounded-lg w-full h-56 object-cover">
                <form action="{{ route('vendor.business.image.update') }}" method="POST" enctype="multipart/form-data" id="change_primary_cover_image_form">
                    @csrf
                    @method('PATCH')
                    <input type="file" name="primary_cover_image" class="hidden" id="primary_cover_image_input">
                    <x-secondary-outline-button class="absolute top-2 right-2 text-white bg-gray-500 border-2" id="change_primary_cover_image_btn">
                        <i class="fas fa-camera mr-1"></i> Change Cover
                    </x-secondary-outline-button>
                </form>
            </div>
            <div class="lg:flex lg:flex-row gap-2 lg:w-[90%] mx-auto mt-4 lg:-mt-24 profile-form lg:relative">
                <div class="basis-1/4 border border-gray-300 rounded-lg py-6 divide-y-2 bg-white h-[20%]">
                    <div class="flex flex-col pb-5">
                        <img src="{{ auth()->user()->avatar }}" alt="" class="rounded-full w-16 h-16 mx-auto object-cover">
                        <h2 class="font-bold text-xl text-center">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h2>
                    </div>
                    <div class="text-center pt-5">
                        <h4 class="text-gray-500">Bio</h4>
                        <p class="text-gray-600 text-left px-3 text-sm">{{ auth()->user()->business->about }}</p>
                    </div>
                </div>
                <div class="mt-2 lg:mt-0 lg:basis-3/4 border border-gray-300 rounded-lg bg-white py-4 px-4 divide-y-4">
                    <div class="flex gap-6">
                        <span class="font-semibold text-primary-one underline underline-offset-4 decoration-4 hover:cursor-pointer" id="account-settings-btn">Account Settings</span>
                        <span class="font-semibold text-gray-400 hover:cursor-pointer" id="business-account-settings-btn">Business Account Settings</span>
                        <span class="font-semibold text-gray-400 hover:cursor-pointer" id="notifications">Notifications</span>
                    </div>
                    <form action="{{ route('vendor.profile.update') }}" method="POST" enctype="multipart/form-data" id="account-settings" class="">
                        @csrf
                        @method('PATCH')
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                            <div>
                                <x-input-label for="first_name" :value="__('First Name')" class="text-gray-500" />
                                <x-text-input id="first_name" class="block w-full" type="text" name="first_name" :value="old('first_name', auth()->user()->first_name)" required autofocus autocomplete="first_name"/>
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="last_name" :value="__('Last Name')" class="text-gray-500" />
                                <x-text-input id="last_name" class="block w-full" type="text" name="last_name" :value="old('last_name', auth()->user()->last_name)" required autocomplete="last_name" />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="text-gray-500" />
                            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email', auth()->user()->email)" required autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="phone_number" :value="__('Phone Number')" class="text-gray-500" />
                            <x-text-input id="phone_number" class="block w-full" type="tel" name="phone_number" :value="old('phone_number', auth()->user()->phone_number)" required />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="avatar" :value="__('Profile Photo')"  class="text-gray-500" />
                            <x-input-file id="avatar" class="block w-full" type="file" name="avatar" accept="jpg,jpeg,png" />
                            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 mt-2 gap-2">
                            <div class="">
                                <x-input-label for="password" :value="__('Current Password')" class="text-gray-500" />

                                <x-text-input id="password" class="block w-full"
                                                type="password"
                                                name="old_password"
                                                autocomplete="old_password" />

                                <x-input-error :messages="$errors->get('old_password')" class="mt-2" />
                            </div>
                            <div class="">
                                <x-input-label for="password" :value="__('New Password')" class="text-gray-500" />

                                <x-text-input id="new_password" class="block w-full"
                                                type="password"
                                                name="new_password" />

                                <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
                            </div>
                        </div>

                        <x-primary-button class="mt-2 px-8 py-2">
                            {{ __('Update Details') }}
                        </x-primary-button>
                    </form>
                    <form action="{{ route('vendor.business.update') }}" method="POST" enctype="multipart/form-data" id="business-account-settings" class="hidden">
                        @csrf
                        @method('PATCH')
                        <div>
                            <x-input-label for="business_name" :value="__('Busness Name')" class="text-gray-500" />
                            <x-text-input id="business_name" class="block w-full" type="text" name="business_name" :value="old('business_name', $business->name)" required autocomplete="business_name" />
                            <x-input-error :messages="$errors->get('business_name')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="secondary_cover_image" :value="__('Secondary Cover Image')"  class="text-gray-500" />
                            <x-input-file id="secondary_cover_image" class="block w-full" type="file" name="secondary_cover_image" accept="jpg,jpeg,png" />
                            <x-input-error :messages="$errors->get('secondary_cover_image')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="tag_line" :value="__('Tag Line')" class="text-gray-500"></x-input-label>
                            <x-text-input id="tag_line" class="block w-full" type="text" name="tag_line" :value="old('tag_line', $business->tag_line)" />
                            <x-input-error :messages="$errors->get('tag_line')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="mission" :value="__('Mission')" class="text-gray-500" />
                            <x-text-input id="mission" class="block w-full" type="text" name="mission" :value="old('mission', $business->mission)" autocomplete="mission" />
                            <x-input-error :messages="$errors->get('mission')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="vision" :value="__('Vision')" class="text-gray-500" />
                            <x-text-input id="vision" class="block w-full" type="text" name="vision" :value="old('vision', $business->vision)" autocomplete="vision" />
                            <x-input-error :messages="$errors->get('vision')" class="mt-2" />
                        </div>
                        <div class="mt-2">
                            <x-input-label for="tag_line" :value="__('About/Bio')" class="text-gray-500"></x-input-label>
                            <textarea id="about" class="block w-full border border-gray-300 rounded-lg placeholder-gray-400" name="about">{{ old('about', $business->about) }}</textarea>
                            <x-input-error :messages="$errors->get('about')" class="mt-2" />
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <div class="mt-2">
                                <x-input-label for="contact_email" :value="__('Business Email')" class="text-gray-500"></x-input-label>
                                <x-text-input id="contact_email" class="block w-full" type="email" name="contact_email" :value="old('contact_email', $business->contact_email)" autocomplete="contact_email" />
                                <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                            </div>
                            <div class="mt-2">
                                <x-input-label for="contact_phone_number" :value="__('Business Phone Number')" class="text-gray-500"></x-input-label>
                                <x-text-input id="contact_phone_number" class="block w-full" type="phone_number" name="contact_phone_number" :value="old('contact_phone_number', $business->contact_phone_number)" autocomplete="contact_phone_number" />
                                <x-input-error :messages="$errors->get('contact_phone_number')" class="mt-2" />
                            </div>
                        </div>
                        <x-primary-button class="mt-2 px-8 py-2">
                            {{ __('Update Details') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
        <x-right-side-bar />
    </div>
    <script>
        const account_settings_btn = document.querySelector('#account-settings-btn')
        const account_settings = document.querySelector('#account-settings')
        const business_account_settings_btn = document.querySelector('#business-account-settings-btn')
        const business_account_settings = document.querySelector('#business-account-settings')

        const current_settings_mode = localStorage.getItem('settings-mode');

        switch (current_settings_mode) {
            case 'account-settings':
                account_settings_btn.classList.add('text-primary-one', 'underline', 'underline-offset-4', 'decoration-4')
                account_settings_btn.classList.remove('text-gray-400')
                business_account_settings_btn.classList.add('text-gray-400')
                business_account_settings_btn.classList.remove('text-primary-one', 'underline', 'underline-offset-4', 'decoration-4')
                business_account_settings.classList.add('hidden')
                account_settings.classList.remove('hidden')
                break;
            case 'business-account-settings':
                business_account_settings_btn.classList.add('text-primary-one', 'underline', 'underline-offset-4', 'decoration-4')
                business_account_settings_btn.classList.remove('text-gray-400')
                account_settings_btn.classList.add('text-gray-400')
                account_settings_btn.classList.remove('text-primary-one', 'underline', 'underline-offset-4', 'decoration-4')
                business_account_settings.classList.remove('hidden')
                account_settings.classList.add('hidden')
                break;
            default:
                account_settings_btn.classList.add('text-primary-one', 'underline', 'underline-offset-4', 'decoration-4')
                account_settings_btn.classList.remove('text-gray-400')
                business_account_settings_btn.classList.add('text-gray-400')
                business_account_settings_btn.classList.remove('text-primary-one', 'underline', 'underline-offset-4', 'decoration-4')
                business_account_settings.classList.add('hidden')
                account_settings.classList.remove('hidden')
                break;
        }

        let settings_mode = '';

        account_settings_btn.addEventListener('click', function() {
            settings_mode = 'account-settings';
            localStorage.setItem('settings-mode', settings_mode);
            account_settings_btn.classList.add('text-primary-one', 'underline', 'underline-offset-4', 'decoration-4')
            account_settings_btn.classList.remove('text-gray-400')
            business_account_settings_btn.classList.add('text-gray-400')
            business_account_settings_btn.classList.remove('text-primary-one', 'underline', 'underline-offset-4', 'decoration-4')
            business_account_settings.classList.add('hidden')
            account_settings.classList.remove('hidden')
        })

        business_account_settings_btn.addEventListener('click', function() {
            settings_mode = 'business-account-settings';
            localStorage.setItem('settings-mode', settings_mode);
            business_account_settings_btn.classList.add('text-primary-one', 'underline', 'underline-offset-4', 'decoration-4')
            business_account_settings_btn.classList.remove('text-gray-400')
            account_settings_btn.classList.add('text-gray-400')
            account_settings_btn.classList.remove('text-primary-one', 'underline', 'underline-offset-4', 'decoration-4')
            business_account_settings.classList.remove('hidden')
            account_settings.classList.add('hidden')
        })

        const change_primary_cover_image_btn = document.querySelector('#change_primary_cover_image_btn')
        const change_primary_cover_image_input = document.getElementById('primary_cover_image_input')
        change_primary_cover_image_btn.addEventListener('click', function(e) {
            e.preventDefault();
            change_primary_cover_image_input.click()
        })

        change_primary_cover_image_input.addEventListener('change', function() {
            document.getElementById("change_primary_cover_image_form").submit();
        })
    </script>
</x-app-layout>
