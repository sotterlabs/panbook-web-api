<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pago;
use App\Models\Tienda;
use App\Models\Vendido;
use App\Models\bebida;
use Illuminate\Http\Request;
use App\Models\Borrado;
use App\Models\ProductInventory;

class AdminController extends Controller
{
    public function users(){
        $user = User::all();

        return view('admin.users',compact('user'));
    }

    public function users_list(){
        $user = User::all();

        return response(json_encode($user));
    }

    public function accountActivate(Request $request){

        $user = User::where('id',$request->id)->update(['pago' => 'si']);

        if($user){
            $pago = new Pago();
            $pago->tienda = $request->empresa;

            if($pago->save()){
                return response(json_encode("success"));
            }
        }

    }

    public function planActivate(Request $request){

        $user = User::where('id',$request->id)->update(['s_activa' => 'si']);

        if($user){
            
            return response(json_encode("success"));
            
        }
    }

    public function planDesactivate(Request $request){

        $user = User::where('id',$request->id)->update(['s_activa' => 'no']);

        if($user){            
            return response(json_encode("success"));
        }
    }

    public function planReport(Request $request){
        $carbon = new \Carbon\Carbon();
        $date = Carbon::now();
        $date = $date->format('Y');
        $pago = Pago::where('tienda',$request->tienda)->whereYear('created_at',$date)->get();
        return view('reports.pay', compact('pago'));

    }

    public function insertLocal(Request $request){

        $tienda = new Tienda();
        $tienda->nombre_comercial = $request->nombre_tienda;
        $tienda->razon_social = $request->razon_social;
        $tienda->rut_comercial = $request->rut;
        $tienda->correo = $request->correo;
        $tienda->direccion = $request->direccion;
        $tienda->telefono = $request->telefono;

        if($tienda->save()){
            $t = Tienda::where('rut_comercial',$request->rut)->get();

            $user = User::where('id',$request->id)->update(['nombre_tienda' => $t[0]->id]);
            return response(json_encode("success"));
        }

    }

    public function panbookRes(Request $request){
        $carbon = new \Carbon\Carbon();
        $date = Carbon::now();

        if($request->fecha == "Click aqui para fecha"){
            $ventas = Vendido::where('tienda','panbook')->whereDate('created_at',$date)->orderBy('created_at','asc')->get();
        } else{
            $date1 = str_split ($request->fecha);
            $date_def = $date1[8].$date1[9].$date1[10].$date1[11]."-";
            if($date1[0].$date1[1].$date1[2] == "Jan"){
                $date_def = $date_def."01-";
            } else if($date1[0].$date1[1].$date1[2] == "Feb"){
                $date_def = $date_def."02-";
            } else if($date1[0].$date1[1].$date1[2] == "Mar"){
                $date_def = $date_def."03-";
            } else if($date1[0].$date1[1].$date1[2] == "Apr"){
                $date_def = $date_def."04-";
            } else if($date1[0].$date1[1].$date1[2] == "May"){
                $date_def = $date_def."05-";
            } else if($date1[0].$date1[1].$date1[2] == "Jun"){
                $date_def = $date_def."06-";
            } else if($date1[0].$date1[1].$date1[2] == "Jul"){
                $date_def = $date_def."07-";
            } else if($date1[0].$date1[1].$date1[2] == "Aug"){
                $date_def = $date_def."08-";
            } else if($date1[0].$date1[1].$date1[2] == "Sep"){
                $date_def = $date_def."09-";
            } else if($date1[0].$date1[1].$date1[2] == "Oct"){
                $date_def = $date_def."10-";
            } else if($date1[0].$date1[1].$date1[2] == "Nov"){
                $date_def = $date_def."11-";
            } else if($date1[0].$date1[1].$date1[2] == "Dec"){
                $date_def = $date_def."12-";
            }
            $date_def = $date_def.$date1[4].$date1[5];
            $date_def = strtotime($date_def);
            $date_def = date('Y-m-d',$date_def);

            echo $date_def;

           $ventas = Vendido::where('tienda','panbook')->whereDate('created_at',$date_def)->orderBy('created_at','asc')->get();
        }
        

        return view('reports.daily', compact('ventas'));
    }

    public function piczaRes(Request $request){
        $carbon = new \Carbon\Carbon();
        $date = Carbon::now();
        if($request->fecha == "Click aqui para fecha"){
            $ventas = Vendido::where('tienda','picza')->whereDate('created_at',$date)->orderBy('created_at','asc')->get();
        } else{
            $date1 = str_split ($request->fecha);
            $date_def = $date1[8].$date1[9].$date1[10].$date1[11]."-";
            if($date1[0].$date1[1].$date1[2] == "Jan"){
                $date_def = $date_def."01-";
            } else if($date1[0].$date1[1].$date1[2] == "Feb"){
                $date_def = $date_def."02-";
            } else if($date1[0].$date1[1].$date1[2] == "Mar"){
                $date_def = $date_def."03-";
            } else if($date1[0].$date1[1].$date1[2] == "Apr"){
                $date_def = $date_def."04-";
            } else if($date1[0].$date1[1].$date1[2] == "May"){
                $date_def = $date_def."05-";
            } else if($date1[0].$date1[1].$date1[2] == "Jun"){
                $date_def = $date_def."06-";
            } else if($date1[0].$date1[1].$date1[2] == "Jul"){
                $date_def = $date_def."07-";
            } else if($date1[0].$date1[1].$date1[2] == "Aug"){
                $date_def = $date_def."08-";
            } else if($date1[0].$date1[1].$date1[2] == "Sep"){
                $date_def = $date_def."09-";
            } else if($date1[0].$date1[1].$date1[2] == "Oct"){
                $date_def = $date_def."10-";
            } else if($date1[0].$date1[1].$date1[2] == "Nov"){
                $date_def = $date_def."11-";
            } else if($date1[0].$date1[1].$date1[2] == "Dec"){
                $date_def = $date_def."12-";
            }
            $date_def = $date_def.$date1[4].$date1[5];
            $date_def = strtotime($date_def);
            $date_def = date('Y-m-d',$date_def);

           $ventas = Vendido::where('tienda','picza')->whereDate('created_at',$date_def)->orderBy('created_at','asc')->get();
        }

        return view('reports.daily2', compact('ventas'));
    }

    public function inventario(){
        
        $beb = Bebida::all();
        $pan = ProductInventory::all();

        return view('reports.inventario', compact('beb','pan'));
    }

    public function borraPanb(Request $request){

        $borr = new Borrado();
        $borr->justificacion = $request->motivo;
        $borr->detalle = $request->detalle;
        $borr->tipo_de_pago = $request->tipo_de_pago;
        $borr->total = $request->total;
        $borr->tienda = 'panbook';
        if($borr->save()){
            $vend = Vendido::where('id',$request->id)->delete();
            return response(json_encode("success"));
        }
        
    }

    public function borraPicza(Request $request){

        $borr = new Borrado();
        $borr->justificacion = $request->motivo;
        $borr->detalle = $request->detalle;
        $borr->tipo_de_pago = $request->tipo_de_pago;
        $borr->total = $request->total;
        $borr->tienda = 'picza';
        if($borr->save()){
            $vend = Vendido::where('id',$request->id)->delete();
            return response(json_encode("success"));
        }
        
    }

    public function panbookErrased(){
        $carbon = new \Carbon\Carbon();
        $date = Carbon::now();
        $ventas = Borrado::where('tienda','panbook')->whereDate('created_at',$date)->orderBy('created_at','asc')->get();

        return view('reports.errasedPanb', compact('ventas'));
    }

    public function piczaErrased(){
        $carbon = new \Carbon\Carbon();
        $date = Carbon::now();
        $ventas = Borrado::where('tienda','picza')->whereDate('created_at',$date)->orderBy('created_at','asc')->get();

        return view('reports.errasedPicza', compact('ventas'));
    }

    
}
