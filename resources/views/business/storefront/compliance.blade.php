<x-vendor>
    <x-storefront-header :business="$business"></x-storefront-header>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 flex-wrap px-2 md:px-8 lg:px-32 py-6">
        @foreach ($business->documents as $document)
            <div>
                <x-card class="border-2 border-gray-200 p-10 rounded-md justify-center">
                    <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="w-40 h-52 object-cover" alt="">
                </x-card>
                <h3 class="text-gray-500 font-extrabold">{{ $document->name }}</h3>
                @if ($document->expires_on)
                    <h5 class="text-gray-500 font-light text-sm">Renewal: <span>{{ Carbon\Carbon::parse($document->expires_on)->diffForHumans() }}</span></h5>
                @endif
            </div>
        @endforeach
        {{-- <div>
            <x-card class="border-2 border-gray-200 p-10 rounded-md justify-center">
                <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="w-40 h-52 object-cover" alt="">
            </x-card>
            <h3 class="text-gray-500 font-extrabold">Business Permit</h3>
            <h5 class="text-gray-500 font-light text-sm">Renewal: <span>30th June 2024</span></h5>
        </div>
        <div>
            <x-card class="border-2 border-gray-200 p-10 rounded-md justify-center">
                <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="w-40 h-52 object-cover" alt="">
            </x-card>
            <h3 class="text-gray-500 font-extrabold">Tax Compliance</h3>
            <h5 class="text-gray-500 font-light text-sm">Renewal: <span>30th June 2024</span></h5>
        </div>
        <div>
            <x-card class="border-2 border-gray-200 p-10 rounded-md justify-center">
                <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="w-40 h-52 object-cover" alt="">
            </x-card>
            <h3 class="text-gray-500 font-extrabold">Export Permit</h3>
            <h5 class="text-gray-500 font-light text-sm">Renewal: <span>30th June 2024</span></h5>
        </div>
        <div>
            <x-card class="border-2 border-gray-200 p-10 rounded-md justify-center">
                <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="w-40 h-52 object-cover" alt="">
            </x-card>
            <h3 class="text-gray-500 font-extrabold">Import Permit</h3>
            <h5 class="text-gray-500 font-light text-sm">Renewal: <span>30th June 2024</span></h5>
        </div>
        <div>
            <x-card class="border-2 border-gray-200 p-10 rounded-md justify-center">
                <img src="{{ asset('assets/img/skLbbi.jpg') }}" class="w-40 h-52 object-cover" alt="">
            </x-card>
            <h3 class="text-gray-500 font-extrabold">Tax Compliance</h3>
            <h5 class="text-gray-500 font-light text-sm">Renewal: <span>30th June 2024</span></h5>
        </div> --}}
    </div>
</x-vendor>
