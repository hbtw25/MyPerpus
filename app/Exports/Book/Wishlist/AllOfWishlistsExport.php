<?php

namespace App\Exports\Book\Wishlist;


use App\Models\Koleksi_pribadi;

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

class AllOfWishlistsExport extends DefaultValueBinder
implements WithProperties, FromCollection, WithTitle, WithHeadings, WithMapping, WithCustomValueBinder, WithStyles
{
    use Exportable;

    public function properties(): array
    {
        return [
            'title'          => 'All of Wishlists Export',
            'description'    => "Total of wishlists which have created on Lidia",
            'subject'        => 'Wishlists',
            'keywords'       => 'Wishlists,export,spreadsheet',
            'category'       => 'Wishlists',
        ];
    }

    public function collection()
    {
        return Koleksi_pribadi::with(['book', "user"])
            ->get();
    }


    // ---------------------------------
    // UTILITIES
    public function title(): string
    {
        return "All of Wishlists";
    }
    public function headings(): array
    {
        return [
            "User",
            "Book",
            "Created at",
        ];
    }
    public function map($wishlist): array
    {
        return [
            $wishlist->user->nama_lengkap,
            $wishlist->book->judul,
            $wishlist->created_at->format('j F Y, \a\t H.i'),
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
