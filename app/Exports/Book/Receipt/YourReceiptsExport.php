<?php

namespace App\Exports\Book\Receipt;

use App\Models\Peminjaman;
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

class YourReceiptsExport implements WithProperties, FromCollection, WithTitle, WithHeadings, WithMapping, WithStyles
{
  use Exportable;

  protected int $idUser;

  public function properties(): array
  {
    return [
      'title'          => 'Your Receipts Export',
      'description'    => "Total of your receipts that have been made on Lidia",
      'subject'        => 'Your Receipts',
      'keywords'       => 'Your Receipts,export,spreadsheet',
      'category'       => 'Your Receipts',
    ];
  }

  public function forIdUser(int $idUser)
  {
    $this->idUser = $idUser;

    return $this;
  }

  public function collection()
  {
    return Peminjaman::with(["book", "user", "createdBy"])
      ->whereIdUser($this->idUser)
      ->latest("updated_at")
      ->get();
  }

  public function title(): string
  {
    return "Your Receipts";
  }

  public function headings(): array
  {
    return [
      'Reader',
      'Book',
      'Amount',
      'Status',
      'From',
      'To',
      'Returned at',
      'Created by',
      'Created at',
    ];
  }

  public function map($receipt): array
  {
    return [
        $receipt->user->nama_lengkap,
        $receipt->book->judul,
        $receipt->jumlah,
        $receipt->status,
        $receipt->tanggal_peminjaman->format("j F Y"),
        $receipt->tanggal_pengembalian->format("j F Y"),
        $receipt->tanggal_dikembalikan ? $receipt->tanggal_dikembalikan->format("j F Y") : "-",
        $receipt->createdBy->nama_lengkap,
        $receipt->created_at->format('j F Y, \a\t H.i'),
    ];
  }

  public function styles(Worksheet $sheet)
  {
    $sheet->getStyle("1")->getFont()->setBold(true);
  }
}
