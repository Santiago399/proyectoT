<?php

namespace App\Imports;

use App\Models\Obra;
use App\Models\User;
use App\Models\Categoria;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithBatchInserts;
// use Maatwebsite\Excel\Concerns\WithChunkReading;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithValidation;

class ObrasImport implements ToModel
{
    // private $users;
    // private $categorias;

    // public function __construct(){
    //     $this->users = User::select('id', 'name', 'email','apellido','celular','direccion')->get();
    //     $this->categorias = Categoria::select('id', 'nombre')->get();
    // }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $user = $this->users->where('name', $row['name'])
        //                     ->where('email', $row['email'])
        //                     ->where('apellido', $row['apellido'])
        //                     ->where('celular', $row['celular'])
        //                     ->where('direccion', $row['direccion'])
        //                     ->first();
        // $categoria = $this->categorias->where('nombre', $row['nombre'])
        //                               ->first();
        // return new Obra([
        //     'nombre' => $row['nombre'],
        //     'fechaInicio' => $row['fechaInicio'],
        //     'fechaEntrega' => $row['fechaEntrega'],
        //     'descripcion' => $row['descripcion'],
        //     'categoria_id' => $categoria->id ?? NULL,
        //     'usuario_id' => $user->id ?? NULL,
        //     'estado' => $row['estado'],
        // ]);
        return new Obra([
            'nombre' => $row[0],
            'fechaInicio' => $row[1],
            'fechaEntrega' => $row[2],
            'descripcion' => $row[3],
            'categoria_id' => $row[4],
            'usuario_id' => $row[5],
            'estado' => $row[6]
        ]);
    }
    // public function rules(): array
    // {
    //     return [
    //         'nombre'      => 'required',
    //         'fechaInicio'     => 'required',
    //         'fechaEntrega'     => 'required',
    //         'descripcion'  => 'required',
    //         'categoria_id'   => 'required',
    //         'usuario_id' => 'required',
    //         'estado' => 'required',
    //     ];
    // }
//El primero nos permite especificar un tamaño del lote, mientras que el segundo nos permite leer el archivo en trozos
    // public function batchSize(): int{
    //     return 1000;
    // }

    // public function chunkSize(): int{
    //     return 1000;
    // }
}
