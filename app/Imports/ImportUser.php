<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\User;
use League\CommonMark\Inline\Parser\EscapableParser;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUser implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
            $emailData = User::where('email','=',$row['email'])->first();
            $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');
            if($row['name'] != null)
            {
                if(empty($emailData))
                {
                    return new User([
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'userType' => $row['usertype'],
                        'phone' => $row['phone'],
                        'status' => 0,
                        'isActive' => 1,
                        'created_at' => $Date,
                        'updated_at' => $Date,
                        ]);
                }
            }
    }
}
