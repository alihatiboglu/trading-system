<?php

namespace Modules\Dashboard\Http\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class UserExport implements FromView, ShouldAutoSize
{

    use Exportable;

    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }


    public function view(): View
    {

        if ($this->type == 2) {
            $users = User::withCount('referrals')
                         ->has('referrals')
                         ->whereNull('type')
                         ->orderby('id','DESC')
                         ->get();
        } elseif ($this->type== 3) {
            $users = User::withCount('referrals')
                         ->whereNull('parent_id')
                         ->where('type','partner')
                         ->orderby('id','DESC')
                         ->get();
        } else {
            $users = User::whereNull('type')
                         ->orderby('id','DESC')
                         ->get();
        }

        return view('dashboard::pages.users.export', [
            'users' => $users
        ]);
    }
}
