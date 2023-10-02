<x-guest-layout class="w-full md:w-[60%] lg:w-[25%] my-16 md:my-20">
    <div class="flex flex-col text-center py-10">
        <h1 class="text-3xl font-bold p-2">Enter the Code</h1>
        <span class="p-1">Enter the 5-digit code sent to your phone. Be careful not to share the code with anyone</span>
    </div>

    <form method="POST" action="{{ route('verification-phone') }}" class="py-5">
        @csrf

        <div class="">
            <div class="flex justify-evenly gap-3 w-full-mt-3">
                <x-text-input id="verify-code-input-1" class="w-1/5 border-slate-400 dark:border-slate-400 bg-slate-200 dark:bg-slate-200 text-center text-2xl font-bold"
                                type="number"
                                name="number[]"
                                required
                />

                <x-text-input id="verify-code-input-2" class="w-1/5 border-slate-400 dark:border-slate-400 bg-slate-200 dark:bg-slate-200 text-center text-2xl font-bold"
                                type="number"
                                name="number[]"
                                required />

                <x-text-input id="verify-code-input-3" class="w-1/5 border-slate-400 dark:border-slate-400 bg-slate-200 dark:bg-slate-200 text-center text-2xl font-bold"
                                type="number"
                                name="number[]"
                                required />

                <x-text-input id="verify-code-input-4" class="w-1/5 border-slate-400 dark:border-slate-400 bg-slate-200 dark:bg-slate-200 text-center text-2xl font-bold"
                                type="number"
                                name="number[]"
                                required />

                <x-text-input id="verify-code-input-5" class="w-1/5 border-slate-400 dark:border-slate-400 bg-slate-200 dark:bg-slate-200 text-center text-2xl font-bold"
                                type="number"
                                name="number[]"
                                required />
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex mt-20">
            <a href="#" class="">
                <x-secondary-outline-button>
                    {{ __('Help') }}
                </x-secondary-outline-button>
            </a>

            <x-primary-button class="w-full ml-2" id="confirm-btn">
                {{ __('Confirm Code') }}
            </x-primary-button>
        </div>
    </form>
    <div class="mt-4 text-center">
        <h3 class=""><a href="{{ route('resend-phone-code') }}" class="underline">Resend Code</a></h3>
    </div>
    @push('scripts')
        <script>
            const first_number_el = document.getElementById('verify-code-input-1');
            const second_number_el = document.getElementById('verify-code-input-2');
            const third_number_el = document.getElementById('verify-code-input-3');
            const fourth_number_el = document.getElementById('verify-code-input-4');
            const fifth_number_el = document.getElementById('verify-code-input-5');
            const confirm_btn = document.getElementById('confirm-btn');
            first_number_el.addEventListener('input', function() {
                second_number_el.focus()
            })
            second_number_el.addEventListener('input', function() {
                third_number_el.focus()
            })
            third_number_el.addEventListener('input', function() {
                fourth_number_el.focus()
            })
            fourth_number_el.addEventListener('input', function() {
                fifth_number_el.focus()
            })
            fifth_number_el.addEventListener('input', function() {
                confirm_btn.focus()
                confirm_btn.click()
            })
        </script>
    @endpush
</x-guest-layout>
