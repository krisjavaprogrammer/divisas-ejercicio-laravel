<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Divisa;

use Carbon\Carbon;

class DivisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisas = Divisa::orderby('fecha', 'DESC')->paginate(9);

        return [
            'paginate' => [
                'total'         => $divisas->total(),
                'current_page'  => $divisas->currentPage(),
                'per_page'      => $divisas->perPage(),
                'last_page'     => $divisas->lastPage(),
                'from'          => $divisas->firstItem(),
                'to'            => $divisas->lastItem()
            ],
            'divisas' => $divisas
        ];

        // return $divisas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $name = $request->input('fecha');
        $this->validate($request, [
            'fecha' => 'required',
            'usdmxn' => 'required'
        ]);

        
        $fecha = Divisa::where('fecha', $request->input('fecha'))->get();

        // foreach ($fecha as $key => $value) {
        //     # code...
        //     $id = $key . ' '. $value['id_divisa'];
        // }

        $val = array_has($fecha, '0.fecha');

        $f = array_get($fecha, '0.fecha');
        $dt = Carbon::parse($f);
        $dt->dayOfWeek;

        if(array_has($fecha, '0.fecha')){
            $mensaje = 'actualizando divisa';

            $id = array_get($fecha, '0.id_divisa');

            $divisas = Divisa::find($id);


            $divisas->fecha = $request->input('fecha');
            $divisas->m1 = $request->input('usdmxn');
            $divisas->m2 = $request->input('usdeuros');
            $divisas->m3 = $request->input('eurosusd');
            $divisas->m4 = $request->input('yuanusd');
            $divisas->m5 = $request->input('audusd');
            $divisas->m6 = $request->input('cadusd');
            $divisas->m7 = $request->input('gbpusd');
            $divisas->m8 = $request->input('usdmxn2');

            $divisas->save();

        }else{

            $mensaje = 'guardando nuevas divisa';
            $divisas = new Divisa;
            $divisas->fecha = $request->input('fecha');
            $divisas->m1 = $request->input('usdmxn');
            $divisas->m2 = $request->input('usdeuros');
            $divisas->m3 = $request->input('eurosusd');
            $divisas->m4 = $request->input('yuanusd');
            $divisas->m5 = $request->input('audusd');
            $divisas->m6 = $request->input('cadusd');
            $divisas->m7 = $request->input('gbpusd');
            $divisas->m8 = $request->input('usdmxn2');

            $divisas->save();

        }
        
        // return;        
        return  response()->json( ['fecha' => $val, 'mensaje' => $mensaje, 'id_divisa' => $id, 'carbon_day' => $dt->dayOfWeek] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
