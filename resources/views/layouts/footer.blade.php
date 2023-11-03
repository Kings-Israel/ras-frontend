<div class="bg-red-800">
    <div class="px-2 md:px-8 lg:px-52 py-6 text-white">
        <div class="grid md:flex md:justify-between">
            <div>
                @guest
                    <a href="route('register')" class="text-lg font-thin text-slate-50 text-center md:text-start">Join Us</a>
                    <h5 class="text-sm text-slate-100 text-center md:text-start mb-4 md:mb-0">We'll send you daily special offers</h5>
                @endguest
            </div>
            <div class="grid md:flex md:flex-col lg:w-2/5">
                <form action="#">
                    <div class="flex flex-row-reverse">
                        <div class="relative w-full">
                            <x-text-input class="bg-opacity-0 text-white text-sm placeholder-slate-100 h-9 w-full" placeholder="Enter Your Email"></x-text-input>
                            <button type="submit" class="absolute top-0 right-0 py-1 px-5 text-xs font-small h-full text-gray-900 bg-white rounded-r-lg">
                                <span class="">Subscribe</span>
                            </button>
                        </div>
                    </div>
                </form>
                <span class="text-xs text-center md:text-right mt-3">We Care About Your Privacy. Read Our <span class="underline underline-offset-2">Privacy Policy</span>
            </div>
        </div>

        <div class="grid md:flex md:justify-between">
            <a href="{{ url('/') }}" class="mx-auto md:mx-0 md:py-0">
                <img src="{{ asset('assets/img/logo-alt.png') }}" class="w-[10rem] h-[10rem] object-contain -my-6" alt="">
            </a>
            <ul class="md:list-none flex flex-wrap justify-center md:justify-end space-x-2 md:space-x-4 lg:space-x-6 my-auto">
                <li class="text-sm">Overview</li>
                <li class="text-sm">Features</li>
                <li class="text-sm">About Us</li>
                <li class="text-sm">Help</li>
                <li class="text-sm">Vendors</li>
                <li class="text-sm">Financiers</li>
                <li class="text-sm">Shipping</li>
                <li class="text-sm">Orders</li>
                <li class="text-sm">Privacy</li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="text-center text-white py-6">
        <span class="text-xs">Real African Sources. All Rights Reserved <i class="fas fa-copyright"></i></span>
    </div>
</div>
