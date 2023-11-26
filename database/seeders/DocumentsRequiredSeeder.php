<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Document;
use App\Models\RequiredDocumentPerCountry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentsRequiredSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $document = Document::create([
            'name' => 'Business Registration',
            'requires_expiry_date' => false,
        ]);

        RequiredDocumentPerCountry::create([
            'document_id' => $document->id,
            'country_id' => NULL,
        ]);

        $document = Document::create([
            'name' => 'Tax Compliance',
            'requires_expiry_date' => true
        ]);

        RequiredDocumentPerCountry::create([
            'document_id' => $document->id,
            'country_id' => NULL
        ]);

        $country = Country::inRandomOrder()->first();

        $document = Document::create([
            'name' => 'Export Certificate',
            'requires_expiry_date' => true
        ]);

        RequiredDocumentPerCountry::create([
            'document_id' => $document->id,
            'country_id' => $country->id,
        ]);

        $country = Country::inRandomOrder()->first();

        $document = Document::create([
            'name' => 'Import Certificate',
            'requires_expiry_date' => true
        ]);

        RequiredDocumentPerCountry::create([
            'document_id' => $document->id,
            'country_id' => $country->id,
        ]);
    }
}
