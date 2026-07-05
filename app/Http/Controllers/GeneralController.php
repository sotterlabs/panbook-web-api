<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Carne;
use App\Models\Ingrediente;
use App\Models\Promocione;
use App\Models\Bebida;
use App\Models\Cliente;
use App\Models\BoletaTemp;
use App\Models\Vendido;
use App\Models\Colacione;
use App\Models\Pasta;
use App\Models\Extra;
use App\Models\Printer;
use App\Models\ComandaNum;
use App\Models\ProductInventory;
use Carbon\Carbon;

class GeneralController extends Controller
{
    public function getProductList(Request $request){
        $prods = Producto::where('tienda',$request->tienda)->get();
        return response(json_encode($prods));
    }

    public function getMeatList(){
        $carne = Carne::all();
        return response(json_encode($carne));
    }

    public function getIngredientsList(){
        $ing = Ingrediente::all();
        return response(json_encode($ing));
    }

    public function getIngredients2List(Request $request){
        $ing = Ingrediente::where('tipo',$request->tipo)->get();
        return response(json_encode($ing));
    }

    public function getPromotions(){
        $prom = Promocione::all();
        return response(json_encode($prom));
    }

    public function getDrinksList(){
        $beb = Bebida::all();
        return response(json_encode($beb));
    }

    public function getClientsList(){
        $cl = Cliente::all();
        return response(json_encode($cl));
    }

    public function getSaleList(Request $request){
        $bt = BoletaTemp::where('tienda',$request->tienda)->get();
        return response(json_encode($bt));
    }

    public function getTotalList(Request $request){
        $bt = BoletaTemp::where('tienda',$request->tienda)->get();
        $i = 0;
        $total = 0;
        if(count($bt) != 0){
            while( $i < count($bt)){
                $total = $total + $bt[$i]->precio;
                $i++;
            }
        }
        return response(json_encode($total));
    }

    public function getMechadaEqualsPrice(){
        $pr = Promocione::select('valor')->where('nombre','mechada_iguales')->get();
        return response(json_encode($pr[0]));
    }

    public function getMechadaDifferentPrice(){
        $pr = Promocione::select('valor')->where('nombre','mechada_diferentes')->get();
        return response(json_encode($pr[0]));
    }
    

    public function insertTemp(Request $request){
        $bt = new BoletaTemp();

        $bt->detalle = $request->detalle;
        $bt->precio = $request->precio;
        $bt->tienda = $request->tienda;

        if( $bt->save() ){
            return response(json_encode("success"));
        }
    }

    public function getPromoIPrice(){
        $pr = Promocione::select('valor')->where('nombre','Iguales')->get();
        return response(json_encode($pr[0]));
    }

    public function getPromoDPrice(){
        $pr = Promocione::select('valor')->where('nombre','Diferentes')->get();
        return response(json_encode($pr[0]));
    }

    public function getPromoIndPrice(){
        $pr = Promocione::select('valor')->where('nombre','Individual')->get();
        return response(json_encode($pr[0]));
    }

    public function deleteItem(Request $request){
        $bt = BoletaTemp::where('detalle', $request->detalle)->take(1)->delete();

        if($bt){
            return response(json_encode("success"));
        }
    }

    public function endSale(Request $request){
        $carbon = new \Carbon\Carbon();
        $date = Carbon::now();
        $date = $date->addHours(-3);
        $bt = BoletaTemp::where('tienda',$request->tienda)->get();
        $detalle = "";
        $total = 0;
        foreach($bt as $b){
            $detalle = $detalle . " - " . $b->detalle;
            $total = $total + $b->precio;
        }

        $vend = new Vendido();

        $vend->detalle = $detalle;
        $vend->total = $total;
        $vend->tipo = $request->tipo;
        $vend->tipo_de_pago = $request->pago;
        $vend->tienda = $request->tienda;
        $vend->comanda = $request->comanda;
        $vend->created_at = $date;

        if($vend->save()){
            $b = BoletaTemp::truncate();
        }

    }

    public function getColaciones(){
        $col = Colacione::all();

        return response(json_encode($col));
    }

    public function getExtras(){
        $ext = Extra::all();

        return response(json_encode($ext));
    }

    public function getPastas(){
        $pas = Pasta::all();

        return response(json_encode($pas));
    }

    public function getPrice(Request $request){
        $pr = Producto::select('precio')->where('nombre',$request->nombre)->where('tienda', $request->tienda)->get();
        return response(json_encode($pr[0]->precio));
    }

    public function getPriceDrinks(Request $request){
        $pr = Bebida::select('valor')->where('nombre',$request->nombre)->get();
        return response(json_encode($pr[0]->valor));
    }

    public function getIngredientsPrice(Request $request){
        $pr = Ingrediente::select('precio')->where('nombre',$request->nombre)->where('tienda',$request->tienda)->get();
        return response(json_encode($pr[0]->precio));
    }

    public function getIngredientsPrice2(Request $request){
        $pr = Ingrediente::select('precio')->where('nombre',$request->nombre)->where('tienda',$request->tienda)->where('tipo',$request->tipo)->get();
        return response(json_encode($pr[0]->precio));
    }

    public function getIngredientsPrice2fam(Request $request){
        $pr = Ingrediente::select('precio_fam')->where('nombre',$request->nombre)->where('tienda',$request->tienda)->where('tipo',$request->tipo)->get();
        return response(json_encode($pr[0]->precio_fam));
    }
    public function getIngredientsPrice2famMitad(Request $request){
        $pr = Ingrediente::select('precio_fam_mitad')->where('nombre',$request->nombre)->where('tienda',$request->tienda)->where('tipo',$request->tipo)->get();
        return response(json_encode($pr[0]->precio_fam_mitad));
    }


    public function getColationsPrice(Request $request){
        $pr = Colacione::select('precio')->where('nombre',$request->nombre)->get();
        return response(json_encode($pr[0]->precio));
    }

    public function getExtrasPrice(Request $request){
        $pr = Extra::select('precio')->where('nombre',$request->nombre)->get();
        return response(json_encode($pr[0]->precio));
    }

    public function getPastasPrice(Request $request){
        $pr = Pasta::select('precio')->where('nombre',$request->nombre)->get();
        return response(json_encode($pr[0]->precio));
    }

    public function getPrinterIP(Request $request){
        $pr = Printer::select('ip')->where('tienda',$request->tienda)->get();
        return response(json_encode($pr[0]->ip));
    }

    public function updateClient(Request $request){
        $c = Cliente::where('telefono',$request->telefono)->update(['direccion' => $request->direccion, 'nombre' => $request->nombre]);
        return response(json_encode("success"));
    }

    public function createClient(Request $request){
        $c = new Cliente();
        $c->nombre = $request->nombre;
        $c->telefono = $request->telefono;
        $c->direccion = $request->direccion;

        if($c->save()){
            return response(json_encode("success"));
        }
        
    }

    public function updateIP(Request $request){
        $c = Printer::where('tienda',$request->tienda_1)->update(['ip' => $request->ip_1]);
        $c2 = Printer::where('tienda',$request->tienda_2)->update(['ip' => $request->ip_2]);

        return response(json_encode("success"));
    }

    public function getComandaNum(Request $request){
        $carbon = new \Carbon\Carbon();
        $date = Carbon::now();

        $num = ComandaNum::where('tienda',$request->tienda)->whereDate('created_at',$date)->get();
        if(count($num) == 0){
            $n = new ComandaNum();
            $n->comanda = 1;
            $n->tienda = $request->tienda;
            $n->save();
            return response(json_encode("1"));
        } else{
           return response(json_encode($num[0]->comanda)); 
        }
    }

    public function comandaNumReboot(Request $request){
        $carbon = new \Carbon\Carbon();
        $date = Carbon::now();

        $num = ComandaNum::where('tienda',$request->tienda)->whereDate('created_at',$date)
        ->update(['comanda' => 1]);
        return response(json_encode("success")); 
        
    }

    public function comandaNumUpdate(Request $request){
        $carbon = new \Carbon\Carbon();
        $date = Carbon::now();

        $num = ComandaNum::where('tienda',$request->tienda)->whereDate('created_at',$date)->get();
        $comanda_nueva = $num[0]->comanda + 1;
        $nu = ComandaNum::where('tienda',$request->tienda)
        ->whereDate('created_at',$date)
        ->update(['comanda' => $comanda_nueva]);
        return response(json_encode("success")); 
        
    }

    public function getInventory(Request $request){
        $pr = ProductInventory::where('nombre',$request->nombre)->get();
        return response(json_encode($pr[0]->cantidad));
    }

    public function updateInventorybread(Request $request){
        $pr = ProductInventory::where('nombre',"pan chico")->get();
        $nuevo_pchico = $pr[0]->cantidad + $request->pchico;

        $pr2 = ProductInventory::where('nombre',"pan grande")->get();
        $nuevo_pgrande = $pr2[0]->cantidad + $request->pgrande;

        $pr3 = ProductInventory::where('nombre',"pan chico")->update(["cantidad" => $nuevo_pchico]);
        $pr4 = ProductInventory::where('nombre',"pan grande")->update(["cantidad" => $nuevo_pgrande]);
    }

    public function getDrinksTable(Request $request){
        $pr = Bebida::all();
        return response(json_encode($pr));
    }

    

   

    
}
