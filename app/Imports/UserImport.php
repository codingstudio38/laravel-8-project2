<?php

namespace App\Imports;

use App\Models\tbl_users;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
 
class UserImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { 
        return new tbl_users([ 
            'name'=> $row['name'],
            'email'=> $row['email'],
            'address'=> $row['address'],
            'files'=> $row['files'],
        ]);
    }
}  
