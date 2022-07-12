<?php

namespace App\Exports;

use App\Models\tbl_users;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class UserExport implements FromCollection,WithHeadingRow
{
    
   public function heading():array{ 
       return [
           'id',
           'name',
           'email',
           'address',
           'files',
       ];
   }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return tbl_users::all();
        return collect(tbl_users::getUsers());
    }
}
 