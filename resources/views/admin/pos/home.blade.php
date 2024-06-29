@extends('admin.pos.template')
<style>
    .table-responsive {
        overflow-x: auto; 
    }
</style>
@section('content')
<div class="container-xxl flex-grow-1 container-p-y" style="max-width: 1530px">
    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-md-6 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body" style="height: 85vh;">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon-search31">
                                    <i class="ti ti-barcode"></i>
                                </span>
                                <input type="text" class="form-control input-search-product" placeholder="Buscar por nombre, código o código de barras" name="input-search-product" autocomplete="off">
                                <span class="input-group-text btn-create-product" id="basic-addon11" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-original-title="Crear nuevo producto">
                                    <i class="ti ti-plus"></i>
                                </span>
                                <span class="input-group-text text-danger btn-clear-input" id="basic-addon11" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-original-title="Limpiar descripción">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x align-middle mr-25">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div id="content-pos-product" class="pos mt-3 p-3 rounded overflow-auto" style="height: calc(100% - 40px);">
                        <div id="wrapper-products" class="row"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Invoice -->



        <!-- Invoice Actions -->
        <div class="col-md-6 col-12 invoice-actions">
            <div class="card invoice-preview-card">
                <div class="card-body" style="padding: 1rem 1rem;">
                    <div class="d-flex justify-content-end flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
                        <!-- <div class="mb-xl-0 mb-0">
                                <div class="d-flex svg-illustration mb-2 gap-2 align-items-center"
                                    style="justify-content: flex-end;">
                                    <div class="app-brand-logo demo">
                                        <img src="{{ asset('assets/img/icons/icon-login.svg') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <span class="fw-bold fs-4">{{ $business->razon_social }}</span>
                                </div>

                                <p class="mb-1 text-end">R.U.C. {{ $business->ruc }}</p>
                                <p class="mb-1 text-end">{{ $ubigeo["distrito"] }} - {{ $ubigeo["provincia"] }} - {{ $ubigeo["departamento"] }}</p>
                            </div>
                        </div>-->
                        <label></label>
                        <div class="container d-flex justify-content-start">
                            <div class="col-lg-3 text-center">
                                <label class="col-form-label">Divisa:</label>
                            </div>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">1 USD </span>
                                    <!-- <span class="input-group-text" id="basic-addon1">S/</span> -->
                                    <input type="text" id="tipo_cambio" class="form-control" name="tipo_cambio" value="0.00" readonly>
                                </div>
                            </div>
                            
                        </div>&nbsp;&nbsp;&nbsp;
                        <!-- <div class="searchBox" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Precios"> -->

                            

                            <!-- <div class="search-field"> -->
                                <button type="button" id="btn_tipo_precio" class="btn btn-primary"><i class="fa-solid fa-hand-holding-dollar fa-2x"></i></button>

                                <!-- <select class="form-select" id="s_tipo_precio">
                                    <option value="0" selected>Precio Público</option>
                                    <option value="1">Precio por Mayor</option>
                                    <option value="2">Precio Distribuidor</option>
                                </select> -->
                            <!-- </div> -->

                        <!-- </div> -->&nbsp;&nbsp;&nbsp;

                        <button title="Lista ventas" type="button" id="btn_modalventas" data-bs-toggle="modal" data-bs-target="#ModalListaVentas" class="btn btn-blue"><i class="fa-solid fa-receipt fa-2x"></i></button>
                        &nbsp;&nbsp;&nbsp;
                        <button title="Cajas" type="button" class="btn btn-blue" id="btn_modalproducto" data-bs-toggle="modal" data-bs-target="#modalCaja">
                            <i class="fa-solid fa-cash-register fa-2x"></i>
                        </button>
                        <!-- <button type="button" class="btn btn-blue" ></button> -->
                        &nbsp;&nbsp;&nbsp;
                        <button title="De Soles a Dolares" type="button" class="btn btn-success" id="btn_cambioMoneda"><i class="fa-solid fa-dollar-sign fa-2x"></i></button>

                    </div>

                    <hr class="my-0">
                    <div style="height: 43vh;">
                        <div class="pos table-responsive-sm border-top pos overflow-auto" style="height: calc(100% - 0.5rem); ">
                            <table class="table m-0" style="font-size: 12.5px;">
                                <thead>
                                    <tr>
                                        <th width="8%" class="text-center">#</th>
                                        <th class="text-left" width="60%">Descripción&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th class="text-center" width="13%">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cantidad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </th>
                                        <th class="text-center" width="14%">Precio Unitario</th>
                                        <th class="text-center" width="10%">Total</th>
                                        <th class="text-right" width="5%"></th>
                                    </tr>
                                </thead>
                                <tbody id="wrapper-tbody-pos"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card invoice-preview-card mt-2">
                    <div class="pos table-responsive-sm border-top">
                        <div class="card-body">
                            <div>
                                <div id="wrapper-totals"></div>
                                <div class="mt-3 d-flex justify-content-end">
                                    <a class="btn btn-primary waves-effect waves-light mx-2" href="/create-quote">
                                        <span class="me-2">Cotizar venta</span>
                                    </a>

                                    <button class="btn btn-danger waves-effect waves-light btn-cancel-pay">
                                        <span class="me-2">Cancelar venta</span>
                                    </button>

                                    <button class="btn btn-success waves-effect waves-light btn-process-pay" style="margin-left: 5px;">
                                        <span class="me-2 text-process">Procesar Pago</span>
                                        <span class="spinner-border spinner-border-sm me-1 d-none text-processing" role="status" aria-hidden="true"></span>
                                        <span class="text-processing d-none">Espere...</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal fade" id="ModalListaVentas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Lista de ventas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="mb-3 col-lg-2">
                    <label for="identificacion" class="form-label">Identificación:</label>
                    <input type="text" class="form-control" id="identificacion" placeholder="Número de identificación">
                </div>

                <div class="mb-3 col-lg-2">
                  <label for="fechaDesde" class="form-label">Fecha Desde:</label>
                  <input type="date" class="form-control" id="fechaDesde">
                </div>

                <div class="mb-3 col-lg-2">
                  <label for="fechaHasta" class="form-label">Fecha Hasta:</label>
                  <input type="date" class="form-control" id="fechaHasta">
                </div>

                <div class="mb-3 col-lg-2">
                  <label for="tipoComprobante" class="form-label">Tipo de Comprobante:</label>
                  <select class="form-select" id="tipoComprobante">
                    <option value="todos">Todos</option>
                    <option value="recibo">Boleta</option>
                    <option value="factura">Factura</option>
                    <option value="nota">Nota de Venta</option>

                  </select>
                </div>
                <div class="mb-3 col-lg-2">
                  <label for="product" class="form-label">Productos:</label>
                  <select class="form-select" id="product">
                  <option value="0">Todos</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->descripcion }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3 col-lg-2 text-center d-flex">
                    <button type="button" class="btn btn-primary" id="btnBuscarFacturas">Buscar</button>
                </div>
                
              </div>

            </form>
            <div class="col-12">

              <!-- centro -->
              <div class="table-responsive form-container">
                <!-- Agrega tu propio botón para generar PDF -->

                <table id="tbllistado" class="table text-nowrap table-bordered text-center">
                  <thead>
                    <th hidden>ID</th>
                    <th>Fecha Emisión</th>
                    <th>Cliente</th>
                    <th>Producto atendido</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Total</th>
                    <th>opciones</th>
                  </thead>
                  <tbody id="bills">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
        <!-- /Invoice Actions -->
        @include('admin.pos.modals')
        @include('admin.clients.modal-register')
        @include('admin.products.modal-register')
    </div>
</div>
@endsection
@section('scripts')
    @include('admin.clients.js-register')
    @include('admin.products.js-register')
    @include('admin.pos.js-home')
    @include('admin.arching_cashes.js-datatable')
    @include('admin.arching_cashes.js-store')
@endsection

<!-- <script>

    document.addEventListener('DOMContentLoaded', function() {
        window.usd = false;
        fecha = new Date();
        url = "https://apiperu.dev/api/tipo_de_cambio";
        data = {
            fecha: `${fecha.getFullYear()}-${(fecha.getMonth() + 1).toString().padStart(2, '0')}-${fecha.getDate().toString().padStart(2, '0')}`,
            moneda: "USD",
        };

        authorizationToken = "a3e20be04068cd29796811fcdc6a4e79c32124c84fbe072e54afcb4b1d28ea86"; // Replace with your actual token

        fetch(url, {
            method: "POST",
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
                Authorization: `Bearer ${authorizationToken}`,
            },
            body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);

            console.log("Cambio: " + data.data.purchase);
            window.cambio = data.data.purchase;
            inputCambio = document.getElementById('tipo_cambio');
            inputCambio.value = "S/ " + data.data.purchase;
        })
        .catch((error) => {
            window.cambio = 3600;
            inputCambio = document.getElementById('tipo_cambio');
            inputCambio.value = "S/ 3600";
            console.error(error);
        });

        // $.ajax({
        //     url: "https://v6.exchangerate-api.com/v6/f9cb370829872ab4c1e4c4aa/latest/USD", 
        //     method: "GET", 
        //     data: {

        //     },
        //     success: function(response) {
        //         //console.log(response);
        //         console.log("Cambio: " + response.conversion_rates.PEN);
        //         window.cambio = response.conversion_rates.PEN;
        //         inputCambio = document.getElementById('tipo_cambio');
        //         inputCambio.value = window.cambio;
        //     },
        //     error: function(error) {
        //         console.error(error);
        //     }
        // });

        // select = document.getElementById('s_tipo_precio');
        // select.addEventListener('change', function() {
        //     selectedOption = this.options[select.selectedIndex];
        //     value = selectedOption.value;
            
        //     if (value == 0) {
        //         elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

        //         elementosConItem.forEach((elemento) => {
        //             precio = parseFloat(elemento.getAttribute('data-precio'));
                    
        //             elemento.innerHTML = "S/" + decimales(precio);
        //         });
        //     }else if (value == 1) {
        //         elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

        //         elementosConItem.forEach((elemento) => {
        //             precio = parseFloat(elemento.getAttribute('data-precio2'));

        //             elemento.innerHTML = "S/" + decimales(precio);
        //         });
        //     } else {
        //         elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

        //         elementosConItem.forEach((elemento) => {
        //             precio = parseFloat(elemento.getAttribute('data-precio3'));

        //             elemento.innerHTML = "S/" + decimales(precio);
        //         });
        //     }
        // })

        $('body').on('click', '#btnBuscarFacturas', function() {
            event.preventDefault();
            //alert("En proceso...")
            //return;

            identificacion = $('#identificacion').val()
            fechaDesde = $('#fechaDesde').val()
            fechaHasta = $('#fechaHasta').val()
            tipoComprobante = $('#tipoComprobante').val()
            product = $('#product').val()
            //console.log("{{ csrf_token() }}");
            
            $.ajax({
                url: "{{ route('admin.userBillings') }}",
                method: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    identificacion: identificacion,
                    fechaDesde: fechaDesde,
                    fechaHasta: fechaHasta,
                    tipoComprobante: tipoComprobante,
                    product: product
                },
                success: function(r) {
                    //bills = JSON.parse(r.bills[0])
                    //console.log(r.bills[0]);
                    $('#bills').html(r.html_bills);
                },
                dataType: 'json'
            }).fail(function(error) {
                // Handle the error here
                console.error('Error:', error.responseText);
                // Perform error-specific actions
            });
            return;
        });
        
        $('body').on('click', '#btn_modalventas', function(e) {
            e.preventDefault();
            today = new Date().toISOString().slice(0, 10);
            
            $('#fechaDesde').val(today);

            today = new Date();
            today.setDate(today.getDate() + 1);
            tomorrow = today.toISOString().slice(0, 10);
            
            $('#tipoComprobante').val('todos');
            $('#product').val('0');
            $('#fechaHasta').val(tomorrow);

            //listarComprobante();
        });

       

        $('body').on('click', '#btn_tipo_precio', function(e) {
            e.preventDefault();

            Swal.fire({
                title:  'Tipo de precios',
                text:   'Elige el tipo de precio a aplicar',
                icon:   'info',
                showCancelButton: true,
                confirmButtonText:  'Precio publico',
                denyButtonText:     'Precio al por mayor',
                cancelButtonText:   'Precio distribuidor',
                customClass: {
                    confirmButton:  'btn btn-primary',
                    denyButton:     'btn btn-primary',
                    cancelButton:   'btn btn-primary',
                },
                buttonsStyling: false,
                backdrop: false,
            }).then((result) => {
                console.log(result);
                if (result.isConfirmed) {
                    window.tipoCobro = 1;
                    elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

                    elementosConItem.forEach((elemento) => {
                        window.precio = parseFloat(elemento.getAttribute('data-precio'));
                        
                        elemento.innerHTML = "S/ " + decimales(window.precio);
                    });

                    $("#kindPrice").html("Precio público");
                }else if (result.isDenied) {
                    window.tipoCobro = 2;
                    elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

                    elementosConItem.forEach((elemento) => {
                        window.precio = parseFloat(elemento.getAttribute('data-precio2'));

                        elemento.innerHTML = "S/ " + decimales(window.precio);
                    });

                    $("#kindPrice").html("Precio al por mayor");
                }else if (result.isDismissed) {
                    window.tipoCobro = 3;
                    elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

                    elementosConItem.forEach((elemento) => {
                        window.precio = parseFloat(elemento.getAttribute('data-precio3'));

                        elemento.innerHTML = "S/ " + decimales(window.precio);
                    });

                    $("#kindPrice").html("Precio distribuidor");
                }
            });
        });

        $('body').on('click', '#btn_cambioMoneda', function(e) {
            if (window.usd) {
                window.usd = false
                
                if (window.tipoCobro == 1) {
                    elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

                    elementosConItem.forEach((elemento) => {
                        window.precio = parseFloat(elemento.getAttribute('data-precio'));
                        
                        elemento.innerHTML = "S/ " + decimales(window.precio);
                    });
                }else if (window.tipoCobro == 2) {
                    elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

                    elementosConItem.forEach((elemento) => {
                        window.precio = parseFloat(elemento.getAttribute('data-precio2'));

                        elemento.innerHTML = "S/ " + decimales(window.precio);
                    });
                }else if (window.tipoCobro == 3) {
                    elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

                    elementosConItem.forEach((elemento) => {
                        window.precio = parseFloat(elemento.getAttribute('data-precio3'));

                        elemento.innerHTML = "S/ " + decimales(window.precio);
                    });
                }else{
                    elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

                    elementosConItem.forEach((elemento) => {
                        window.precio = parseFloat(elemento.getAttribute('data-precio'));
                        
                        elemento.innerHTML = "S/ " + decimales(window.precio);
                    });
                }
                
                $("input[name='precio']").each(function() {
                    precioSoles = $(this).data('precio');
                    precioSoles = parseFloat(precioSoles);

                    if (!isNaN(precioSoles)) {
                        $(this).val(precioSoles.toFixed(2));
                    } else{
                        alert("Error al realizar el cambio de moneda.")
                    }
                });

                $("span.total").each(function() {
                    precioSoles = parseFloat($(this).data('total'));
                    if (!isNaN(precioSoles)) {
                        $(this).html(precioSoles.toFixed(2)); 
                    } else {
                        alert("Error al realizar el cambio de moneda.")
                    }
                });

                $("span.gravadas").each(function() {
                    precioSoles = parseFloat($(this).data('valor'));
                    if (!isNaN(precioSoles)) {
                        $(this).html(precioSoles.toFixed(2)); 
                    } else {
                        alert("Error al realizar el cambio de moneda.")
                    }
                });

                $("span.igv").each(function() {
                    precioSoles = parseFloat($(this).data('valor'));
                    if (!isNaN(precioSoles)) {
                        $(this).html(precioSoles.toFixed(2)); 
                    } else {
                        alert("Error al realizar el cambio de moneda.")
                    }
                });

                $("span.total2").each(function() {
                    precioSoles = parseFloat($(this).data('valor'));
                    if (!isNaN(precioSoles)) {
                        $(this).html(precioSoles.toFixed(2)); 
                    } else {
                        alert("Error al realizar el cambio de moneda.")
                    }
                });

                $("span[name='moneda']").each(function() {
                    $(this).html("S/ ");
                });

                $("#btn_cambioMoneda").html("<i class=\"fa-solid fa-dollar-sign fa-2x\"></i>");
                $("#btn_cambioMoneda").removeClass("btn-warning");
                $("#btn_cambioMoneda").removeClass("btn-success");
                $("#btn_cambioMoneda").addClass("btn-success");
                
            } else {

                window.usd = true;
                
                if (window.tipoCobro == 1) {
                    elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

                    elementosConItem.forEach((elemento) => {
                        window.precio = parseFloat(elemento.getAttribute('data-precio'));
                        
                        elemento.innerHTML = "$ " + decimales((window.precio / window.cambio));
                    });
                }else if (window.tipoCobro == 2) {
                    elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

                    elementosConItem.forEach((elemento) => {
                        window.precio = parseFloat(elemento.getAttribute('data-precio2'));

                        elemento.innerHTML = "$ " + decimales((window.precio / window.cambio));
                    });
                }else if (window.tipoCobro == 3) {
                    elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

                    elementosConItem.forEach((elemento) => {
                        window.precio = parseFloat(elemento.getAttribute('data-precio3'));

                        elemento.innerHTML = "$ " + decimales((window.precio / window.cambio));
                    });
                }else{
                    elementosConItem = document.querySelectorAll('[id^="itemPrice"]');

                    elementosConItem.forEach((elemento) => {
                        window.precio = parseFloat(elemento.getAttribute('data-precio'));
                        
                        elemento.innerHTML = "$ " + decimales((window.precio / window.cambio));
                    });
                }
                
                $("input[name='precio']").each(function() {
                    precioSoles = parseFloat($(this).data('precio'));

                    if (!isNaN(precioSoles)) {
                        precioUSD = (precioSoles / window.cambio);

                        $(this).val(precioUSD.toFixed(2));
                    } else {
                        alert("Error al realizar el cambio de moneda.")
                    }
                });

                $("span.total").each(function() {
                    precioSoles = parseFloat($(this).data('total'));

                    if (!isNaN(precioSoles)) {
                        precioUSD = precioSoles / window.cambio;

                        $(this).html(precioUSD.toFixed(2)); 
                    } else {
                        alert("Error al realizar el cambio de moneda.")
                    }
                });

                $("span.gravadas").each(function() {
                    precioSoles = parseFloat($(this).data('valor'));

                    if (!isNaN(precioSoles)) {
                        precioUSD = precioSoles / window.cambio;

                        $(this).html(precioUSD.toFixed(2)); 
                    } else {
                        alert("Error al realizar el cambio de moneda.")
                    }
                });

                $("span.igv").each(function() {
                    precioSoles = parseFloat($(this).data('valor'));

                    if (!isNaN(precioSoles)) {
                        precioUSD = precioSoles / window.cambio;

                        $(this).html(precioUSD.toFixed(2)); 
                    } else {
                        alert("Error al realizar el cambio de moneda.")
                    }
                });
                
                $("span.total2").each(function() {
                    precioSoles = parseFloat($(this).data('valor'));

                    if (!isNaN(precioSoles)) {
                        precioUSD = precioSoles / window.cambio;

                        $(this).html(precioUSD.toFixed(2)); 
                    } else {
                        alert("Error al realizar el cambio de moneda.")
                    }
                });

                $("span[name='moneda']").each(function() {
                    $(this).html("$ ");
                });

                $("#btn_cambioMoneda").html("<b  style=\"font-size: 24px;\">S/</b>");
                $("#btn_cambioMoneda").removeClass("btn-success");
                $("#btn_cambioMoneda").addClass("btn-warning");
            }
            
        });
    });

    function addProduct(id, precio, cliente, idCliente, dniCliente){
        console.log(idCliente);
        addOption(idCliente, dniCliente, cliente)

        $.ajax({
            url: "{{ route('admin.add_product_pos') }}",
            method: 'POST',
            data: {
                '_token': "{{ csrf_token() }}",
                id: id,
                cantidad: 1,
                precio: precio,
                option: 1
            },
            beforeSend: function() {
                block_content(`.card[id="${id}"]`);
            },
            success: function(r) {
                if (!r.status) {
                    close_block(`.card[id="${id}"]`);
                    toast_msg(r.msg, r.type);
                    return;

                }
                close_block(`.card[id="${id}"]`);
                toast_msg(r.msg, r.type);
                load_cart();
            },
            dataType: 'json'
        });
        return;
    }

    function addOption(idCliente, dniCliente, cliente) {
        select = document.getElementById('dni_ruc');
        newOption = document.createElement('option');

        newOption.text = dniCliente + ' - ' + cliente;
        newOption.value = idCliente;
        newOption.selected = true;

        options = select.options;
        // for (let i = 0; i < options.length; i++) {
        //     options[i].selected = false;
        //     if (options[i].selected) {
        //         console.log(options[i]);
        //     }
            
        // }

        select.add(newOption, select.firstChild);

        //userOption = document.getElementById('user');

        //if (condition) {
        // Modify option content
        //userOption.text = dniCliente + ' - ' + cliente; // Replace with your desired text
        //userOption.value = idCliente; // Replace with your desired value
        window.userBill = cliente;
        //} else {
        // Remove the option
        //userOption.parentNode.removeChild(userOption);
        //}
    }

    function decimales(n) {
        numeroFormateado = n.toFixed(2);
        partes = numeroFormateado.split('.');

        if (partes.length === 1) {
            return `${partes[0]}.00`;
        }

        const decimal = partes[1].padEnd(2, '0');
        return `${partes[0]}.${decimal}`;
    }

    
    
</script> -->