<x-main>
    <div class="mx-auto px-4 md:px-6 lg:px-28 my-5 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-4xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-4xl">
                @include('profile.partials.update-password-form')
            </div>
        </div> --}}

        {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div> --}}
    </div>
</x-main>
