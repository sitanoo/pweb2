<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller {

    public function index() {
        $produtos = \App\Produto::get();
        return view('produto.index', compact('produtos'));
    }
    
    public function create() {
        return view('produto.create');
    }
    
    public function store(Request $request) {
        
        $produto = new \App\Produto();
        $produto->nompro = $request->get('nompro');
        $produto->despro = $request->get('despro');
        $produto->vlrpro = $request->get('vlrpro');
        $produto->codcat = $request->get('codcat');
        $produto->nompro = $request->get('nompro');
        $produto->save();
       
        redirect('/produto')->with('msg', 'Produto cadastrada com sucesso!');
    }
    
    public function destroy($codpro){
        $produto = \App\Produto::find($codpro);
        $produto->delete();
        return redirect('/produto')->with('proEliminado', 'Produto eliminada');
    }
    
    public function edit($codpro){
        $produto = \App\Produto::find($codpro);
        return view('produto.edit', compact('produto'));
    }
    
    public function update(Request $request, $codpro){
        $produto = \App\Produto::find($codpro);
        $produto->nompro = $request->get('nompro');
        $produto->despro = $request->get('despro');
        $produto->vlrpro = $request->get('vlrpro');
        $produto->codcat = $request->get('codcat');
        $produto->nompro = $request->get('nompro');
        $produto->save();
        
        return redirect('/produto')->with('alterada', 'Produto alterada com sucesso!');
    }
}
