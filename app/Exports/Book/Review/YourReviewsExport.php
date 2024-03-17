<?php

namespace App\Exports\Book\Review;


use App\Models\Ulasan_buku;
use Maatwebsite\Excel\Concerns\{
    Exportable,
    WithProperties,
    FromCollection,
    WithTitle,
    WithHeadings,
    WithMapping,
    WithStyles,
};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class YourReviewsExport implements WithProperties, FromCollection, WithTitle, WithHeadings, WithMapping, WithStyles
{
    use Exportable;

    protected int $idUser;

    public function properties(): array
    {
        return [
            'title'          => 'Your Reviews Export',
            'description'    => "Total of your reviews that have been made on Lidia",
            'subject'        => 'Your Reviews',
            'keywords'       => 'Your Reviews,export,spreadsheet',
            'category'       => 'Your Reviews',
        ];
    }

    public function forIdUser(int $idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function collection()
    {
        return Ulasan_buku::with(["book", "user", "createdBy"])
            ->whereIdUser($this->idUser)
            ->latest("updated_at")
            ->get();
    }

    public function title(): string
    {
        return "Your Reviews";
    }

    public function headings(): array
    {
        return [
            "Book",
            "User",
            "Photo",
            "Body",
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
            $review->created_at->format('j F Y, \a\t H.i'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle("1")->getFont()->setBold(true);
    }
}
