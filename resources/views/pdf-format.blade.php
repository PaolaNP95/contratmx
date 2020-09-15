<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{ title }</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>
<body>
    <div class="container m-5">
        <div class="row">
            <img src="{{ url('/img/logo-completo.jpeg') }}"  class="w-25" alt="" loading="lazy">
        </div>
        <div class="row float-right">
            <address>
                Aguascalientes, Ags. {date} <br>
                <Strong>Oficio: </Strong> {oficio} <br>
                <strong>Asunto: </strong> Cotización <br>
            </address>
        </div>
    </div>
    <br><br><br>
    <div class="container">
        <strong>CONTRATMX INSTALACIONES PROFESIONALES</strong><br>
        <strong>OLGA RODRIGUEZ</strong> <br><br><br>
        <strong>P R E S E N T E</strong> <br><br><br>
        <p class="text-justify" style="text-indent: 30px">
              Por medio de la presente, distraigo sus finas atenciones y aprovecho la oportunidad 
            para darle a conocer la cotización que con anterioridad solicitó con respecto a los siguientes servicios {services},
            junto con los siguientes detalles: {details}, 
        </p> <br>
        <p>
            A continuación se presentan los respectivos productos/servicios necesarios:
        </p>
    </div>
    <div class="card m-5">
        <div class="card-header bg-dark text-white text-center"><h4 class="">COTIZACIÓN Nº {folio}</h4></div>
        <div class="card-body">
            <div class="row">   
                <div class="col">
                    <table class="table table-hover table-sm text-center">
                        <thead class="thead-dark">
                            <tr class="">
                            <th scope="col">#</th>
                            <th scope="col">Concepto</th>
                            <th scope="col">Unidad</th>
                            <th scope="col">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">{product->id}</th>
                            <td><p >{product->item->name} </p></td>
                            <td><p >{product->unit}} </p></td>
                            <td><p >{product->price}} </p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <strong>Subtotal: </strong>{subtotal}<br>
                    <strong>IVA: </strong>{iva}<br>
                    <strong>Total: </strong>{total}<br>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <strong>CONDICIONES:</strong>
        <ul>
            <li>Vigencia de 15 días naturales a partir de la fecha de expedición.</li>
        </ul>
        <p class="text-center mt-5">Sin más por el momento me despido quedando a la orden para cualquier duda y/o aclaración, su servidor.</p>
        <p class="text-center font-weight-bold">A T E N T A M E N T E</p>
    </div>
</body>
</html>