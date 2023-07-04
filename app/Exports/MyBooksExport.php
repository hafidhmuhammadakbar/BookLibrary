<?php

namespace App\Exports;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xls\Worksheet;

class MyBooksExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $mybooks;

    public function __construct()
    {
        $user = auth()->user();
        $mybooks = Book::where('author_id', $user->id);
        
        $this->mybooks = $mybooks->get();
    }


    public function view(): View
    {
        return view('mybooks.export-excel', [
            'mybooks' => $this->mybooks
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Author ID',
            'Author Name',
            'Publisher Name',
            'Description',
            'Publication Date',
            'Pages',
        ];
    }

    public function title(): string
    {
        return 'My Books Report'; // Replace with your desired title
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]], // Apply bold font to the first row (title)
            'A1:I1' => ['borders' => ['outline' => Border::BORDER_THIN]], // Apply border to the title row
            'A2:I' . ($this->mybooks->count() + 1) => ['borders' => ['outline' => Border::BORDER_THIN]], // Apply border to the data rows
        ];
    }
}
