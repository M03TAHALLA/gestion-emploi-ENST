<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SpreadsheetController extends Controller
{
    public function createSpreadsheet()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World!');

        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/public/hello_world.xlsx');
        $writer->save($filePath);

        return response()->download($filePath);
    }
}
