@extends('admin.template')
@section('styles')
    <style>
        body
        {overflow-x:hidden;}
    </style>
@endsection
@section('content')

    <section class="basic-select2">
        <div class="row">
            <!-- Congratulations Card -->
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cuentas de la Empresa</h5>
                        <form id="form-info" class="form form-vertical">
                            @csrf
                            <div class="row">
                             
                            <div class="row">
                            
                            <div class="col-12 col-md-3 mb-3">
                                    <label for="nombre_ban">Nombre del Banco</label>
                                    <textarea name="nombre_ban" id="nombre_ban" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>

                               
                                <div class="col-12 col-md-3 mb-3">
                                    <label for="moneda">Moneda</label>
                                    <textarea name="moneda" id="moneda" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>

                                <div class="col-12 col-md-3 mb-3">
                                    <label for="num_cuenta">Numero De Cuenta</label>
                                    <textarea name="num_cuenta" id="num_cuenta" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>

                                <div class="col-12 col-md-3 mb-3">
                                    <label for="cci">CCI</label>
                                    <textarea name="cci" id="cci" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>
                                </div>

                                <div class="row">
                            
                            <div class="col-12 col-md-3 mb-3">
                                    <label for="nombre_ban1">Nombre del Banco</label>
                                    <textarea name="nombre_ban1" id="nombre_ban1" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>

                               
                                <div class="col-12 col-md-3 mb-3">
                                    <label for="moneda1">Moneda</label>
                                    <textarea name="moneda1" id="moneda1" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>

                                <div class="col-12 col-md-3 mb-3">
                                    <label for="num_cuenta1">Numero De Cuenta</label>
                                    <textarea name="num_cuenta1" id="num_cuenta1" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>

                                <div class="col-12 col-md-3 mb-3">
                                    <label for="cci1">CCI</label>
                                    <textarea name="cci1" id="cci1" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>
                                </div>
                                

                                <div class="row">
                            
                            <div class="col-12 col-md-3 mb-3">
                                    <label for="nombre_ban2">Nombre del Banco</label>
                                    <textarea name="nombre_ban2" id="nombre_ban2" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>

                               
                                <div class="col-12 col-md-3 mb-3">
                                    <label for="moneda2">Moneda</label>
                                    <textarea name="moneda2" id="moneda2" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>

                                <div class="col-12 col-md-3 mb-3">
                                    <label for="num_cuenta2">Numero De Cuenta</label>
                                    <textarea name="num_cuenta2" id="num_cuenta2" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>

                                <div class="col-12 col-md-3 mb-3">
                                    <label for="cci2">CCI</label>
                                    <textarea name="cci2" id="cci2" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>
                                </div>
                    

                                <div class="row">
                            
                            <div class="col-12 col-md-3 mb-3">
                                    <label for="nombre_ban3">Nombre del Banco</label>
                                    <textarea name="nombre_ban3" id="nombre_ban3" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>

                               
                                <div class="col-12 col-md-3 mb-3">
                                    <label for="moneda3">Moneda</label>
                                    <textarea name="moneda3" id="moneda3" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>

                                <div class="col-12 col-md-3 mb-3">
                                    <label for="num_cuenta3">Numero De Cuenta</label>
                                    <textarea name="num_cuenta3" id="num_cuenta3" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>

                                <div class="col-12 col-md-3 mb-3">
                                    <label for="cci3">CCI</label>
                                    <textarea name="cci3" id="cci3" class="form-control text-uppercase" cols="3" rows="1"></textarea>
                                </div>
                                </div>
                    

                                <div class="col-12 text-end mb-2">
                                    <button type="button" class="btn btn-primary btn-save-info">
                                        <span class="text-save-info">Guardar</span>
                                        <span class="spinner-border spinner-border-sm me-1 d-none text-saving-info" role="status" aria-hidden="true"></span>
                                        <span class="text-saving-info d-none">Guardando...</span>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
         
        </div>
    </section>
@endsection
@section('scripts')
@include('admin.cuentas.js-home')
  
@endsection
