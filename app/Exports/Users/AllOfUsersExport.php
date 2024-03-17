<?php

namespace App\Exports\Users;

use App\Models\User;
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

class AllOfUsersExport extends DefaultValueBinder
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
            'title'          => 'All of Users Export',
            'description'    => "Total of users who have registered on Lidia",
            'subject'        => 'Users',
            'keywords'       => 'Users,export,spreadsheet',
            'category'       => 'Users',
        ];
    }

    public function collection()
    {
        return User::latest()
            ->get();
    }


    // ---------------------------------
    // UTILITIES
    public function title(): string
    {
        return "All of Users";
    }
    public function headings(): array
    {
        return [
            'Full name',
            'Username',
            'Address',
            'Email',
            'Profile picture',
            'Active',
            'Role',
            'Created at',
        ];
    }
    public function map($user): array
    {
        return [

            $user->nama_lengkap,
            $user->username,
            $user->alamat,
            $user->email,
            $user->profile_picture ?? "-",
            $user->flag_active,
            $user->role,
            $user->created_at->format('j F Y, \a\t H.i'),
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
