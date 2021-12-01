<?php

namespace App\Imports;

use App\Models\Material;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class MaterialesImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Material([
            'nombre' => $row['nombre'],
            'peso' => $row['peso'],
            'tamaño' => $row['tamaño'],
            'cantidad' => $row['cantidad'],
            'tipo_id' => $row['tipo_id'],
            'marca_id' => $row['marca_id'],
            'estado' => $row['estado'],
        ]);
    }
    public function rules(): array
    {
        return [
            'nombre'      => 'required',
            'peso'     => 'required',
            'tamaño'     => 'required',
            'cantidad'  => 'required',
            'tipo_id'   => 'required',
            'marca_id' => 'required'
        ];
    }
    public function batchSize(): int{
        return 1000;
    }

    public function chunkSize(): int{
        return 1000;
    }

}
