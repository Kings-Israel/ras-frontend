<div class="bg-red-800">
    <div class="px-52 py-6 text-white">
        <div class="flex justify-between">
            <div>
                <h3 class="text-lg font-thin text-slate-200">Join Us</h3>
                <h5 class="text-sm text-slate-300">We'll send you daily special offers</h5>
            </div>
            <div class="flex flex-col w-2/5">
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
                <span class="text-xs text-right mt-3">We Care About Your Privacy. Read Our <span class="underline underline-offset-2">Privacy Policy</span>
            </div>
        </div>

        <div class="flex justify-between">
            <a href="{{ url('/') }}">
                <x-application-logo class="w-12 h-12 fill-current text-white" />
            </a>
            <ul class="list-none flex space-x-6 my-auto">
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
