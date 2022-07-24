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
 
// for add custom row data
//use Maatwebsite\Excel\Concerns\FromCollection;
//use Maatwebsite\Excel\Concerns\WithHeadings;
// class NewUserExport implements FromCollection, WithHeadings
    
// {

//    protected $data;
  
//     /**
//      * Write code on Method
//      *
//      * @return response()
//      */
//     public function __construct($data)
//     {
//         $this->data = $data;
//     }
        // public function startCell(): string
        //     {
        //         return 'A2';
        //     }
//     /**
//      * Write code on Method
//      *
//      * @return response()
//      */
//     public function collection()
//     {
//         return collect($this->data);
//     }
  
//     /**
//      * Write code on Method
//      *
//      * @return response()
//      */
//     public function headings() :array
//     {
//         return [
//             'ID',
//             'Name',
//             'Email',
//         ];
//     }
// }