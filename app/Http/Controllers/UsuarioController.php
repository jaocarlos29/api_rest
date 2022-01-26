<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\UsuarioService;

class UsuarioController extends Controller
{

    public function __construct(UsuarioService $usuario)
    {
        parent::__construct($usuario);
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $this->service->create($data);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        return $this->service->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }

}
