<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'delivery_date' => 'date',
    ];

    /**
     * Get the order that owns the OrderItem
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product that owns the OrderItem
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the inspectionRequest associated with the OrderItem
     */
    public function inspectionRequest(): HasOne
    {
        return $this->hasOne(InspectionRequest::class);
    }

    /**
     * Get the inspectionReport associated with the OrderItem
     */
    public function inspectionReport(): HasOne
    {
        return $this->hasOne(InspectionReport::class);
    }

    /**
     * Get the warehouseOrder associated with the OrderItem
     */
    public function warehouseOrder(): HasOne
    {
        return $this->hasOne(WarehouseOrder::class);
    }

    /**
     * Get the deliveryRequest associated with the OrderItem
     */
    public function deliveryRequest(): HasOne
    {
        return $this->hasOne(OrderDeliveryRequest::class);
    }

    /**
     * Get the storageRequest associated with the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function storageRequest(): HasOne
    {
        return $this->hasOne(OrderStorageRequest::class);
    }

    /**
     * Get all of the quotationResponses for the OrderItem
     */
    public function quotationResponses(): HasMany
    {
        return $this->hasMany(QuotationRequestResponse::class);
    }

    /**
     * Get the insuranceRequest associated with the OrderItem
     */
    public function insuranceRequest(): HasOne
    {
        return $this->hasOne(InsuranceRequest::class);
    }

    /**
     * Get all of the orderRequests for the OrderItem
     */
    public function orderRequests(): HasMany
    {
        return $this->hasMany(OrderRequest::class);
    }

    public function productReleaseRequest(): HasOne
    {
        return $this->hasOne(ReleaseProductRequest::class);
    }

    public function hasReport(string $report)
    {
        $report = Str::lower($report);

        switch ($report) {
            case 'inspection':
                $request = $this->inspectionReport()->exists();
                if ($request) {
                    return true;
                }
                break;
            case 'insurance':
                $order_request = $this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first();
                if ($order_request) {
                    if (
                        $this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->insuranceRequestBuyerDetails()->exists()
                        && $this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->insuranceRequestBuyerCompanyDetails()->exists()
                        && $this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->insuranceRequestBuyerInuranceLossHistories()->exists()
                        && $this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->insuranceRequestProposalDetails()->exists()
                        && $this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->insuranceRequestProposalVehicleDetails()->exists()
                    ) {
                        return true;
                    }
                }
                break;
            case 'logistics':
                $order_request = $this->orderRequests()->where('requesteable_type', LogisticsCompany::class)->first();
                if ($order_request) {
                    if (
                        $this->orderRequests()->where('requesteable_type', LogisticsCompany::class)->first()->importInstruction()->exists()
                        && $this->orderRequests()->where('requesteable_type', LogisticsCompany::class)->first()->exportInstruction()->exists()
                    ) {
                        return true;
                    }
                }
                break;
            default:
                return false;
                break;
        }

        return false;
    }

    public function hasRequest(string $request)
    {
        $request = Str::lower($request);

        switch ($request) {
            case 'inspection':
                $request = $this->orderRequests()->where('requesteable_type', InspectingInstitution::class)->exists();
                if ($request) {
                    return true;
                }
                break;
            case 'insurance':
                $request = $this->orderRequests()->where('requesteable_type', InsuranceCompany::class)->exists();
                if ($request) {
                    return true;
                }
                break;
            case 'logistics':
                $request = $this->orderRequests()->where('requesteable_type', LogisticsCompany::class)->exists();
                if ($request) {
                    return true;
                }
                break;
            case 'warehousing':
                $request = $this->orderRequests()->where('requesteable_type', Warehouse::class)->exists();
                if ($request) {
                    return true;
                }
                break;
            default:
                return false;
                break;
        }

        return false;
    }

    public function hasAcceptedAllRequests(): bool
    {
        $order_requests = $this->orderRequests->groupBy('requesteable_type');

        $requested_services_count = count($order_requests);

        $accepted_requests_count = 0;

        foreach ($order_requests as $key => $order_request) {
            if (collect($order_request)->where('status', 'accepted')->first()) {
                $accepted_requests_count += 1;
                continue;
            }
        }

        if ($accepted_requests_count == $requested_services_count) {
            return true;
        }

        return false;
    }

    public function vendorHasCompletedInsuranceReport(): bool
    {
        if (
            !$this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->businessSubsidiaries()->exists()
            && !$this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->businessInformation()->exists()
            && !$this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->businessSalesInformation()->exists()
            && !$this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->businessSales()->exists()
            && !$this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->businessSalesBadDebts()->exists()
            && !$this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->businessSalesLargeBadDebts()->exists()
            && !$this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->businessSecurity()->exists()
            && !$this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->businessCreditManagement()->exists()
            && !$this->orderRequests()->where('requesteable_type', 'App\Models\InsuranceCompany')->first()->businessCreditLimits()->exists()
        ) {
            return false;
        }

        return true;
    }
}
