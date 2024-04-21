<?php

namespace App\Exports\Book\Review;


use App\Models\Ulasan_buku;
use Maatwebsite\Excel\Concerns\{
    Exportable,
    WithProperties,
    WithTitle,
    FromCollection,
    WithHeadings,
    WithMapping,
    WithCustomValueBinder,
    WithStyles,
};
use PhpOffice\PhpSpreadsheet\Cell\{
    DefaultValueBinder,
    Cell,
    DataType,
};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AllOfReviewsExport extends DefaultValueBinder
implements WithProperties, FromCollection, WithTitle, WithHeadings, WithMapping, WithCustomValueBinder, WithStyles
{
    use Exportable;

    public function properties(): array
    {
        return [
            'title'          => 'All of Reviews Export',
            'description'    => "Total of reviews which have created on Lidia",
            'subject'        => 'Reviews',
            'keywords'       => 'Reviews,export,spreadsheet',
            'category'       => 'Reviews',
        ];
    }

    public function collection()
    {
        return Ulasan_buku::with(['book', "user", "createdBy"])
            ->get();
    }


    // ---------------------------------
    // UTILITIES
    public function title(): string
    {
        return "All of Reviews";
    }
    public function headings(): array
    {
        return [
            "Book",
            "User",
            "Photo",
            "Body",
            "rating",
            "Created at",
        ];
    }
    public function map($review): array
    {
        return [
            $review->book->judul,
            $review->user->nama_lengkap,
            $review->photo ? "yes" : 'no',
            strip_tags($review->body),
            $review->rating,
            $review->created_at->format('j F Y, \a\t H.i'),
        ];
    }
    public function bindValue(Cell $cell, $value)
    {
        // Convert numeric into text
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return true;
        }

        // Return default behavior
        return parent::bindValue($cell, $value);
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle("1")->getFont()->setBold(true);
    }
}
