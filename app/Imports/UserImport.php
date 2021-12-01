<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'apellido' => $row['apellido'],
            'celular' => $row['celular'],
            'direccion' => $row['direccion'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name'      => 'required',
            'email'     => 'required',
            'password'     => 'required',
            'apellido'  => 'required',
            'celular'   => 'required',
            'direccion' => 'required'
        ];
    }
//El primero nos permite especificar un tamaño del lote, mientras que el segundo nos permite leer el archivo en trozos
    public function batchSize(): int{
        return 1000;
    }

    public function chunkSize(): int{
        return 1000;
    }

}
