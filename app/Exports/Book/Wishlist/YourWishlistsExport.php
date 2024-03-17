<?php

namespace App\Exports\Book\Wishlist;

use App\Models\HistoryBookWishlist;
use App\Models\Koleksi_pribadi;
use App\Models\RecBookReview;
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

class YourWishlistsExport implements WithProperties, FromCollection, WithTitle, WithHeadings, WithMapping, WithStyles
{
    use Exportable;

    protected int $idUser;

    public function properties(): array
    {
        return [
            'title'          => 'Your Wishlists Export',
            'description'    => "Total of your wishlists that have been made on Lidia",
            'subject'        => 'Your Wishlists',
            'keywords'       => 'Your Wishlists,export,spreadsheet',
            'category'       => 'Your Wishlists',
        ];
    }

    public function forIdUser(int $idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function collection()
    {
        return Koleksi_pribadi::with(["book", "user"])
            ->whereIdUser($this->idUser)
            ->latest("updated_at")
            ->get();
    }

    public function title(): string
    {
        return "Your Wishlists";
    }

    public function headings(): array
    {
        return [
            "Book",
            "User",
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

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle("1")->getFont()->setBold(true);
    }
}
