<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;
use Validator;

class PedidosController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rules = array(
            'nombre'       => 'required|max:255',
            'email'        => 'required|email',
            'asunto'       => 'required|max:255',
            'mensaje'      => 'required',
        ); 

        $msg = array(
            'nombre.required'    => 'Debe Ingresar su Nombre',
            'nombre.max'         => 'El Nombre no puede superar los 255 carácteres',
            'email.required'     => 'Debe Ingresar un Email',
            'email.email'        => 'Debe Ingresar un Email Válido',
            'asunto.required'    => 'Debe Ingresar un Asunto',
            'asunto.max'         => 'El Asunto no puede superar los 255 carácteres',
            'mensaje.required'   => 'Debe Ingresar un Mensaje',
        );

        $validador = Validator::make($request->all(), $rules, $msg);

        if ($validador->passes()) 
        {
            $objPedidos = new Pedidos();

            $data = array(
                'nombre'          =>  $request->input('nombre'),
                'email'           =>  $request->input('email'),
                'asunto'          =>  $request->input('asunto'),
                'mensaje'         =>  $request->input('mensaje'),
                'fecha_solicitud' =>  date('Y-m-d')
            );

            $response = $objPedidos->grabarPedidos($data);

            if($response)
            {
                $this->data['status'] = "success";
                $this->data['msg'] = "Mensaje enviado exitosamente, Pronto nos contactaremos con usted.";
            }
            else
            {
                $this->data['status'] = "error";
                $this->data['msg'] = "Hubo un error al enviar el mensaje, intente nuevamente.";
            }
        }
        else 
        {
            $this->data['status'] = "error";
            $this->data['msg'] = $validador->errors()->first();
        } 

        return json_encode($this->data);

    }

}
