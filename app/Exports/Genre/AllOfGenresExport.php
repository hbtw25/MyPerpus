<?php

namespace App\Exports\Genre;

use App\Models\Kategori;

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

class AllOfGenresExport extends DefaultValueBinder
implements WithProperties, FromCollection, WithTitle, WithHeadings, WithMapping, WithCustomValueBinder, WithStyles
{
    // ---------------------------------
    // TRAITS
    use Exportable;


    // ---------------------------------
    // PROPERTIES


    // ---------------------------------
    // CORES
    public function properties(): array
    {
        return [
            'title'          => 'All of Genres Export',
            'description'    => "Total of genres which have registered on Lidia",
            'subject'        => 'Genres',
            'keywords'       => 'Genres,export,spreadsheet',
            'category'       => 'Genres',
        ];
    }

    public function collection()
    {
        return Kategori::with(['books', "createdBy"])
            ->get();
    }


    // ---------------------------------
    // UTILITIES
    public function title(): string
    {
        return "All of Genres";
    }
    public function headings(): array
    {
        return [
            'Name',
            'Description',
            'Book(s)',
            'Active',
            'Created at',
        ];
    }
    public function map($genre): array
    {
        return [
            $genre->nama,
            $genre->deskripsi,
            $genre->books->count(),
            $genre->flag_active,
            $genre->created_at->format('j F Y, \a\t H.i'),
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
