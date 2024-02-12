<x-vendor>
    <x-storefront-header :business="$business" :categories="$categories"></x-storefront-header>
    <div>
        <img src="{{ $business->primary_cover_image }}" alt="" class="h-32 w-full object-cover">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 flex-wrap px-2 md:px-8 lg:px-32 py-6">
        @foreach ($business->documents as $document)
            <div class="hover:cursor-pointer" data-modal-target="view-document-modal-{{ $document->id }}" data-modal-toggle="view-document-modal-{{ $document->id }}">
                {{-- <div data-modal-target="view-document-modal-{{ $document->id }}" data-modal-toggle="view-document-modal-{{ $document->id }}" class="hover:cursor-pointer"> --}}
                <x-card class="border-2 border-gray-200 p-10 rounded-md justify-center">
                    <img src="{{ asset('assets/img/PDF_file_icon.svg.png') }}" class="w-40 h-52 object-cover" alt="">
                </x-card>
                <h3 class="text-gray-500 font-extrabold">{{ $document->name }}</h3>
                @if ($document->expires_on)
                    <h5 class="text-gray-500 font-light text-sm">Renewal: <span>{{ Carbon\Carbon::parse($document->expires_on)->diffForHumans() }}</span></h5>
                @endif
            </div>
            <x-modal modal_id="view-document-modal-{{ $document->id }}">
                <div class="relative w-full max-w-4xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-document-modal-{{ $document->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-2 py-2 lg:px-4">
                            <h3 class="mb-2 text-2xl font-semibold md:font-bold text-gray-900 dark:text-white space-y-4">{{ $document->name }}</h3>
                            <iframe src ="{{ $document->file }}" class="w-[100%] h-[600px]"></iframe>
                        </div>
                    </div>
                </div>
            </x-modal>
        @endforeach
    </div>
</x-vendor>
