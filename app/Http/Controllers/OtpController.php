<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class OtpController extends Controller
{
    public function getCountries(Request $request)
    {
        $spreadsheet = IOFactory::load($request->countries->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $row_limit = $sheet->getHighestDataRow();
        $row_range = range(6, $row_limit - 1);

        $data = [];

        foreach ($row_range as $key => $row) {
            $country = $sheet->getCell('B' . $row)->getValue();
            $city_spreadsheet = IOFactory::load($request->cities->getRealPath());
            $city_sheet = $city_spreadsheet->getActiveSheet();
            $city_row_limit = $sheet->getHighestDataRow();
            $city_row_range = range(2, $city_row_limit);
            $cities = [];
            foreach ($city_row_range as $key => $city_row) {
                if ($city_sheet->getCell('E'.$city_row) === $country) {
                    info($key.' - '.$city_sheet->getCell('E'.$city_row).' - '.$sheet->getCell('A'.$city_row));
                    if ($city_sheet->getCell('A'.$city_row) !== '' && $city_sheet->getCell('A'.$city_row) !== NULL) {
                        $city_data = [
                            'name' => $city_sheet->getCell('A'.$city_row),
                            'iso' => $city_sheet->getCell('F'.$city_row),
                        ];
                        array_push($cities, $city_data);
                    }
                }
            }
            $country_data = [
                'country' => $country,
                'cities' => $cities,
            ];
            array_push($data, $country_data);
        }

        Storage::disk('public')->put('countries.json', json_encode($data));
    }
}
