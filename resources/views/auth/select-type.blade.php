<x-guest-layout class="w-[96%] md:w-[60%] lg:w-[50%] my-16 md:my-20 bg-white">

    <div class="flex flex-col text-center py-10">
        <h1 class="text-3xl font-bold p-2">Select Account Type</h1>
        <span class="p-1">Your Gateway to Finding Awesome Products Across The Continent</span>
    </div>

    {{-- <form method="POST" action="{{ route('selected-type') }}">
        @csrf

        <label
            class="hover:cursor-pointer"
            for="account_type"
        >
            <input
                class="peer float-left mr-1 ml-6 mt-5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                type="radio"
                name="account_type"
                id="account_type"
                value="buyer"
            />
            <div class="mt-px border-2 py-4 border-gray-200 rounded-md mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem] peer-checked:bg-slate-300">Buyer</div>
        </label>

        <label
            class="hover:cursor-pointer"
            for="account_type"
        >
            <input
                class="peer float-left mr-1 ml-6 mt-5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                type="radio"
                name="account_type"
                id="account_type"
                value="vendor"
            />
            <div class="mt-px border-2 py-4 border-gray-200 rounded-md mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem] peer-checked:bg-slate-300">Vendor</div>
        </label>

        <div class="mt-4">
            <x-input-error :messages="$errors->get('account_type')" class="mt-2" />
        </div>

        <div class="flex mt-4">
            <x-primary-button class="w-full py-2">
                {{ __('Proceed to Register') }}
            </x-primary-button>
        </div>

        <div class="mt-4 text-center">
            <h3 class="">Already Have an Account? <a href="{{ route('login') }}" class="underline decoration-orange-500 text-orange-400 font-bold hover:text-orange-500 focus:text-orange-600 transition ease-in-out duration-150">Login</a></h3>
        </div>
    </form> --}}
    <div class="flex gap-8 justify-center pb-6">
        <form action="{{ route('selected-type') }}" method="POST">
            @csrf
            <input type="hidden" name="account_type" value="vendor">
            <button type="submit" class="text-center px-4 py-4 border border-orange-300 hover:bg-orange-200 hover:text-black hover:cursor-pointer transition duration-200 ease-in-out rounded-lg">
                <h3 class="font-bold text-2xl">Proceed as Vendor</h3>
                <span class="font-semibold">Create your business and upload your products to reach a wider range of customers</span>
            </button>
        </form>
        <form action="{{ route('selected-type') }}" method="post">
            @csrf
            <input type="hidden" name="account_type" value="buyer">
            <button type="submit" class="text-center px-4 py-4 border border-orange-300 hover:bg-orange-200 hover:text-black hover:cursor-pointer transition duration-200 ease-in-out rounded-lg">
                <h3 class="font-bold text-2xl">Proceed as Buyer</h3>
                <span class="font-semibold">Find the best quality products from verified businesses delivered to you promptly</span>
            </button>
        </form>
    </div>
</x-guest-layout>
