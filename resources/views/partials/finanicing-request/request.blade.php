<h2 class="px-2 py-2 lg:px-4 font-bold text-xl">Financing Application</h2>
<div class="px-2 py-2 lg:px-4 bs-stepper wizard" id="financing-request-wizard">
    <div class="bs-stepper-header mb-4 w-full overflow-y-auto">
        <div class="step" data-target="#financing-requirements">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-circle">1</span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Financing Requirements</span>
                </span>
            </button>
        </div>
        <div class="line">
            <i class="fas fa-chevron-right"></i>
        </div>
        <div class="step" data-target="#company-details">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Documents</span>
                </span>
            </button>
        </div>
        <div class="line">
            <i class="fas fa-chevron-right"></i>
        </div>
        <div class="step" data-target="#company-details">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-circle">3</span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Company Details</span>
                </span>
            </button>
        </div>
        <div class="line">
            <i class="fas fa-chevron-right"></i>
        </div>
        <div class="step" data-target="#bankers-capital-structure">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-circle">4</span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Bankers & Capital Stucture</span>
                </span>
            </button>
        </div>
        <div class="line">
            <i class="fas fa-chevron-right"></i>
        </div>
        <div class="step" data-target="#shareholders">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-circle">5</span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Shareholders</span>
                </span>
            </button>
        </div>
        <div class="line">
            <i class="fas fa-chevron-right"></i>
        </div>
        <div class="step" data-target="#key-management">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-circle">6</span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Key Management</span>
                </span>
            </button>
        </div>
        <div class="line">
            <i class="fas fa-chevron-right"></i>
        </div>
        <div class="step" data-target="#current-bank-indebtness">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-circle">7</span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Current Bank Indebtness</span>
                </span>
            </button>
        </div>
        <div class="line">
            <i class="fas fa-chevron-right"></i>
        </div>
        <div class="step" data-target="#current-operating-indebtness">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-circle">9</span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Current Operating Indebtness</span>
                </span>
            </button>
        </div>
        <div class="line">
            <i class="fas fa-chevron-right"></i>
        </div>
        <div class="step" data-target="#anchor-history">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-circle">10</span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Anchor History</span>
                </span>
            </button>
        </div>
        <div class="line">
            <i class="fas fa-chevron-right"></i>
        </div>
        <div class="step" data-target="#credit-terms">
            <button type="button" class="step-trigger">
                <span class="bs-stepper-circle">11</span>
                <span class="bs-stepper-label mt-1">
                  <span class="bs-stepper-title">Credit Terms & Confidentiality Statement</span>
                </span>
            </button>
        </div>
    </div>
    <form action="#" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-3 space-y-2">
            <div class="col-span-2 w-full">
                <x-input-label>Amount Required</x-input-label>
                <x-text-input name="amount" disabled value="{{ $order_total }}"></x-text-input>
            </div>
            <div class="col-span-3">
                <x-input-label>Facility Required</x-input-label>
                <div class="flex justify-between w-full">
                    @foreach ($available_facilities as $key => $facility)
                        <div class="flex">
                            <input id="checkbox-table-search-1" type="radio" name="{{ $key }}" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-semibold text-sm ml-2 truncate">{{ $facility }}</h2>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-1">
                <x-input-label>Duration</x-input-label>
                <div class="flex justify-between w-full">
                    @foreach ($durations as $duration)
                        <div class="flex">
                            <input id="checkbox-table-search-1" type="radio" name="{{ $duration }}" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded-full focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-semibold text-sm ml-2 truncate">{{ $duration }}</h2>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-3">
                <x-input-label>Purpose of Facility(Describe)</x-input-label>
                <div class="flex justify-between w-full">
                    <textarea name="additional_notes" rows="5" class="w-full border border-gray-300 rounded-lg placeholder-gray-400"></textarea>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <x-primary-button class="px-4 py-2 text-lg">Submit</x-primary-button>
        </div>
    </form>
</div>
