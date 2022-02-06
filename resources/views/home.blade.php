@extends('layouts.admin')
@section('title','Panel administrador')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }

</style>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
     <div class="page-header">
        <h3 class="page-title">
            Panel administrador
        </h3>
    </div>  

    @foreach ($totales as $total)
     
     
    

    <div class="row">
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-0">Compras</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-inline-block pt-3">
                            <div class="d-md-flex">
                                <h2 class="mb-0">S/. {{$total->totalcompra}}</h2>
                                <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                    <i class="far fa-clock text-muted"></i>
                                    <small class=" ml-1 mb-0">Mes actual</small>
                                </div>
                            </div>
                            <small class="text-gray">Compras del sistema POS.</small>
                        </div>
                        <div class="d-inline-block">
                            <i class="fas fa-chart-pie text-info icon-lg"></i>                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-0">Ventas</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-inline-block pt-3">
                            <div class="d-md-flex">
                                <h2 class="mb-0">S/. {{$total->totalventa}}</h2>
                                <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                    <i class="far fa-clock text-muted"></i>
                                    <small class="ml-1 mb-0">Mes actual</small>
                                </div>
                            </div>
                            <small class="text-gray">Ventas del sistema POS.</small>
                        </div>
                        <div class="d-inline-block">
                            <i class="fas fa-shopping-cart text-danger icon-lg"></i>                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div class="statistics-item">
                  <p>
                    <i class="icon-sm fa fa-user mr-2"></i>
                    New users
                  </p>
                  <h2>5</h2>
                  <label class="badge badge-outline-success badge-pill">2.7% increase</label>
                </div>
                <div class="statistics-item">
                  <p>
                    <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                    Avg Time
                  </p>
                  <h2>1.2</h2>
                  <label class="badge badge-outline-danger badge-pill">30% decrease</label>
                </div>
                <div class="statistics-item">
                  <p>
                    <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                    Downloads
                  </p>
                  <h2>3</h2>
                  <label class="badge badge-outline-success badge-pill">12% increase</label>
                </div>
                <div class="statistics-item">
                  <p>
                    <i class="icon-sm fas fa-check-circle mr-2"></i>
                    Update
                  </p>
                  <h2>7</h2>
                  <label class="badge badge-outline-success badge-pill">57% increase</label>
                </div>
                <div class="statistics-item">
                  <p>
                    <i class="icon-sm fas fa-chart-line mr-2"></i>
                    Sales
                  </p>
                  <h2>9</h2>
                  <label class="badge badge-outline-success badge-pill">10% increase</label>
                </div>
                <div class="statistics-item">
                  <p>
                    <i class="icon-sm fas fa-circle-notch mr-2"></i>
                    Pending
                  </p>
                  <h2>7</h2>
                  <label class="badge badge-outline-danger badge-pill">16% decrease</label>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body d-flex flex-column">
              <h4 class="card-title">
                <i class="fas fa-chart-pie"></i>
                Estado de pedidos
              </h4>
              <div class="flex-grow-1 d-flex flex-column justify-content-between">
                <canvas id="sales-status-chart" class="mt-3"></canvas>
                <div class="pt-4">
                  <div id="sales-status-chart-legend" class="sales-status-chart-legend"></div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">
                      <i class="fas fa-chart-bar"></i>

                      Productos más pedidos
                  </h4>
                  <canvas id="productos_pedidos"></canvas>
              </div>
          </div>
      </div>

  </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-line"></i>
                        Ventas diarias
                    </h4>
                    <canvas id="ventas_diarias" height="100"></canvas>
                    <div id="orders-chart-legend" class="orders-chart-legend"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Predicción de ventas diario</h4>
          <div id="c3-proyeccion"></div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-area"></i>
                        Compras - Meses
                    </h4>
                    <canvas id="compras"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-area"></i>
                        Ventas - Meses
                    </h4>
                    <canvas id="ventas"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                <i class="fas fa-table"></i>
                Pedidos del día
              </h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Cliente</th>
                      <th>Fecha</th>
                      <th>Monto</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($orders_of_the_day as $order_of_the_day)
                      <tr>
                        <td class="font-weight-bold">
                          {{$order_of_the_day->user->name}}
                        </td>
                        <td class="text-muted">
                            {{$order_of_the_day->order_date->diffForHumans()}}
                        </td>
                        <td>
                            {{$order_of_the_day->total()}}
                        </td>
                        <td>
                          <label class="badge badge-{{$order_of_the_day->status()['color']}} badge-pill">{{$order_of_the_day->status()['text']}}</label>
                        </td>
                      </tr>
                      @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body d-flex flex-column">
                <h4 class="card-title">
                  <i class="fas fa-tachometer-alt"></i>
                  Estado de pedios
                </h4>
                <p class="card-description">Estado de pedidos del día</p>
                <div class="flex-grow-1 d-flex flex-column justify-content-between">
                  <canvas id="daily-sales-chart" class="mt-3 mb-3 mb-md-0"></canvas>
                  <div id="daily-sales-chart-legend" class="daily-sales-chart-legend pt-4 border-top"></div>
                </div>
              </div>
            </div>
        </div>

      </div>


    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-table"></i>
                        Productos más vendidos (POS)
                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th>Nombre</th>
                                    <th>Código</th>
                                    <th>Stock</th>
                                    <th>Cantidad vendida</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productosvendidos as $productosvendido)
                                <tr>
                                    <td>{{$productosvendido->id}}</td>
                                    <td>{{$productosvendido->name}}</td>
                                    <td>{{$productosvendido->code}}</td>
                                    <td><strong>{{$productosvendido->stock}}</strong> Unidades</td>
                                    <td><strong>{{$productosvendido->quantity}}</strong> Unidades</td>
                                  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
{{--
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      Dashboard
    </h3>
  </div>
  <div class="row grid-margin">
    <div class="col-12">
      <div class="card card-statistics">
        <div class="card-body">
          <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
              <div class="statistics-item">
                <p>
                  <i class="icon-sm fa fa-user mr-2"></i>
                  New users
                </p>
                <h2>54000</h2>
                <label class="badge badge-outline-success badge-pill">2.7% increase</label>
              </div>
              <div class="statistics-item">
                <p>
                  <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                  Avg Time
                </p>
                <h2>123.50</h2>
                <label class="badge badge-outline-danger badge-pill">30% decrease</label>
              </div>
              <div class="statistics-item">
                <p>
                  <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                  Downloads
                </p>
                <h2>3500</h2>
                <label class="badge badge-outline-success badge-pill">12% increase</label>
              </div>
              <div class="statistics-item">
                <p>
                  <i class="icon-sm fas fa-check-circle mr-2"></i>
                  Update
                </p>
                <h2>7500</h2>
                <label class="badge badge-outline-success badge-pill">57% increase</label>
              </div>
              <div class="statistics-item">
                <p>
                  <i class="icon-sm fas fa-chart-line mr-2"></i>
                  Sales
                </p>
                <h2>9000</h2>
                <label class="badge badge-outline-success badge-pill">10% increase</label>
              </div>
              <div class="statistics-item">
                <p>
                  <i class="icon-sm fas fa-circle-notch mr-2"></i>
                  Pending
                </p>
                <h2>7500</h2>
                <label class="badge badge-outline-danger badge-pill">16% decrease</label>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">
            <i class="fas fa-gift"></i>
            Orders
          </h4>
          <canvas id="orders-chart"></canvas>
          <div id="orders-chart-legend" class="orders-chart-legend"></div>                  
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">
            <i class="fas fa-chart-line"></i>
            Sales
          </h4>
          <h2 class="mb-5">56000 <span class="text-muted h4 font-weight-normal">Sales</span></h2>
          <canvas id="sales-chart"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body d-flex flex-column">
          <h4 class="card-title">
            <i class="fas fa-chart-pie"></i>
            Sales status
          </h4>
          <div class="flex-grow-1 d-flex flex-column justify-content-between">
            <canvas id="sales-status-chart" class="mt-3"></canvas>
            <div class="pt-4">
              <div id="sales-status-chart-legend" class="sales-status-chart-legend"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">
            <i class="far fa-futbol"></i>
            Activity
          </h4>
          <ul class="solid-bullet-list">
            <li>
              <h5>4 people shared a post
                <span class="float-right text-muted font-weight-normal small">8:30 AM</span>
              </h5>
              <p class="text-muted">It was an awesome work!</p>
              <div class="image-layers">
                <div class="img-sm profile-image-text bg-warning rounded-circle image-layer-item">M</div>
                <img class="img-sm rounded-circle image-layer-item" src="images/faces/face3.jpg" alt="profile"/>
                <img class="img-sm rounded-circle image-layer-item" src="images/faces/face5.jpg" alt="profile"/>
                <img class="img-sm rounded-circle image-layer-item" src="images/faces/face8.jpg" alt="profile"/>
              </div>
            </li>
            <li>
              <h5>Stella posted in a group
                <span class="float-right text-muted font-weight-normal small">11:40 AM</span>
              </h5>
              <p class="text-muted">The team has done a great job</p>
            </li>
            <li>
              <h5>Dobrick posted in material
                <span class="float-right text-muted font-weight-normal small">4:30 PM</span>
              </h5>
              <p class="text-muted">Great work. Keep it up!</p>
            </li>
          </ul>
          <div class="border-top pt-3">
            <div class="d-flex justify-content-between">
              <button class="btn btn-outline-dark">More</button>
              <button class="btn btn-primary btn-icon-text">
                Add new task
                <i class="btn-icon-append fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body d-flex flex-column">
          <h4 class="card-title">
            <i class="fas fa-tachometer-alt"></i>
            Daily Sales
          </h4>
          <p class="card-description">Daily sales for the past one month</p>
          <div class="flex-grow-1 d-flex flex-column justify-content-between">
            <canvas id="daily-sales-chart" class="mt-3 mb-3 mb-md-0"></canvas>
            <div id="daily-sales-chart-legend" class="daily-sales-chart-legend pt-4 border-top"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">
            <i class="fas fa-envelope"></i>
            Inbox(31)
          </h4>
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td class="py-1">
                    <img src="images/faces/face13.jpg" alt="profile" class="img-sm rounded-circle"/>
                  </td>
                  <td class="font-weight-bold">
                    Andrew Bowen
                  </td>
                  <td>
                    <label class="badge badge-light badge-pill">Development</label>
                  </td>
                  <td>
                    The required fields are added in the database
                  </td>
                  <td>
                    <i class="fas fa-ellipsis-v"></i>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td class="py-1">
                    <img src="images/faces/face2.jpg" alt="profile" class="img-sm rounded-circle"/>
                  </td>
                  <td class="font-weight-bold">
                    Mae Saunders
                  </td>
                  <td>
                    <label class="badge badge-light badge-pill">Development</label>
                  </td>
                  <td>
                    The application will be completed by tomorrow
                  </td>
                  <td>
                    <i class="fas fa-ellipsis-v"></i>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td class="py-1">
                    <div class="img-sm rounded-circle bg-warning profile-image-text">M</div>
                  </td>
                  <td class="font-weight-bold">
                    Manuel Yates
                  </td>
                  <td>
                    <label class="badge badge-light badge-pill">Design</label>
                  </td>
                  <td>
                    The new design is uploaded in zeplin
                  </td>
                  <td>
                    <i class="fas fa-ellipsis-v"></i>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td class="py-1">
                    <img src="images/faces/face11.html" alt="profile" class="img-sm rounded-circle"/>
                  </td>
                  <td class="font-weight-bold">
                    Marguerite Phillips
                  </td>
                  <td>
                    <label class="badge badge-light badge-pill">Development</label>
                  </td>
                  <td>
                    Please send me the latest requirements
                  </td>
                  <td>
                    <i class="fas fa-ellipsis-v"></i>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                      </label>
                    </div>
                  </td>
                  <td class="py-1">
                    <div class="img-sm rounded-circle bg-info profile-image-text">C</div>
                  </td>
                  <td class="font-weight-bold">
                    Clifford Wilson
                  </td>
                  <td>
                    <label class="badge badge-light badge-pill">Testing</label>
                  </td>
                  <td>
                    The issues are documented in the shared sheet
                  </td>
                  <td>
                    <i class="fas fa-ellipsis-v"></i>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">
            <i class="fas fa-table"></i>
            Sales Data
          </h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Customer</th>
                  <th>Item code</th>
                  <th>Orders</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="font-weight-bold">
                    Clifford Wilson
                  </td>
                  <td class="text-muted">
                    PT613
                  </td>
                  <td>
                    350
                  </td>
                  <td>
                    <label class="badge badge-success badge-pill">Dispatched</label>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">
                    Mary Payne
                  </td>
                  <td class="text-muted">
                    ST456
                  </td>
                  <td>
                    520
                  </td>
                  <td>
                    <label class="badge badge-warning badge-pill">Processing</label>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">
                    Adelaide Blake
                  </td>
                  <td class="text-muted">
                    CS789
                  </td>
                  <td>
                    830
                  </td>
                  <td>
                    <label class="badge badge-danger badge-pill">Failed</label>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">
                    Adeline King
                  </td>
                  <td class="text-muted">
                    LP908
                  </td>
                  <td>
                    579
                  </td>
                  <td>
                    <label class="badge badge-primary badge-pill">Delivered</label>
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold">
                    Bertie Robbins
                  </td>
                  <td class="text-muted">
                    HF675
                  </td>
                  <td>
                    790
                  </td>
                  <td>
                    <label class="badge badge-info badge-pill">On Hold</label>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">
            <i class="fas fa-calendar-alt"></i>
            Calendar
          </h4>
          <div id="inline-datepicker-example" class="datepicker"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">
            <i class="fas fa-thumbtack"></i>
            Todo
          </h4>
          <div class="add-items d-flex">
            <input type="text" class="form-control todo-list-input"  placeholder="What do you need to do today?">
            <button class="add btn btn-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
          </div>
          <div class="list-wrapper">
            <ul class="d-flex flex-column-reverse todo-list">
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Meeting with Alisa
                  </label>
                </div>
                <i class="remove fa fa-times-circle"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Call John
                  </label>
                </div>
                <i class="remove fa fa-times-circle"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Create invoice
                  </label>
                </div>
                <i class="remove fa fa-times-circle"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Print Statements
                  </label>
                </div>
                <i class="remove fa fa-times-circle"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Prepare for presentation
                  </label>
                </div>
                <i class="remove fa fa-times-circle"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Pick up kids from school
                  </label>
                </div>
                <i class="remove fa fa-times-circle"></i>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">
            <i class="fas fa-rocket"></i>
            Projects
          </h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>
                    Assigned to
                  </th>
                  <th>
                    Project name
                  </th>
                  <th>
                    Priority
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="py-1">
                    <img src="images/faces/face1.jpg" alt="profile" class="img-sm rounded-circle"/>
                  </td>
                  <td>
                    South Shyanne
                  </td>
                  <td>
                    <label class="badge badge-warning badge-pill">Medium</label>
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="images/faces/face2.jpg" alt="profile" class="img-sm rounded-circle"/>
                  </td>
                  <td>
                    New Trystan
                  </td>
                  <td>
                    <label class="badge badge-danger badge-pill">High</label>
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="images/faces/face3.jpg" alt="profile" class="img-sm rounded-circle"/>
                  </td>
                  <td>
                    East Helga
                  </td>
                  <td>
                    <label class="badge badge-success badge-pill">Low</label>
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="images/faces/face4.jpg" alt="profile" class="img-sm rounded-circle"/>
                  </td>
                  <td>
                    Omerbury
                  </td>
                  <td>
                    <label class="badge badge-warning badge-pill">Medium</label>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-md-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center mb-3 mb-md-0">
              <button class="btn btn-social-icon btn-facebook btn-rounded">
                <i class="fab fa-facebook-f"></i>
              </button>
              <div class="ml-4">
                <h5 class="mb-0">Facebook</h5>
                <p class="mb-0">813 friends</p>
              </div>
            </div>
            <div class="d-flex align-items-center mb-3 mb-md-0">
              <button class="btn btn-social-icon btn-twitter btn-rounded">
                <i class="fab fa-twitter"></i>
              </button>
              <div class="ml-4">
                <h5 class="mb-0">Twitter</h5>
                <p class="mb-0">9000 followers</p>
              </div>
            </div>
            <div class="d-flex align-items-center mb-3 mb-md-0">
              <button class="btn btn-social-icon btn-google btn-rounded">
                <i class="fab fa-google-plus-g"></i>
              </button>
              <div class="ml-4">
                <h5 class="mb-0">Google plus</h5>
                <p class="mb-0">780 friends</p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <button class="btn btn-social-icon btn-linkedin btn-rounded">
                <i class="fab fa-linkedin-in"></i>
              </button>
              <div class="ml-4">
                <h5 class="mb-0">Linkedin</h5>
                <p class="mb-0">1090 connections</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
--}}
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/chart.js') !!}


<script>

    

    if ($("#daily-sales-chart").length) {
        var dailySalesChartData = {
          datasets: [{
            data: [<?php foreach ($orders_of_the_day_status as $order_of_the_day_status)
                  {echo ''. $order_of_the_day_status->count.',';} ?>],
            backgroundColor: [
              '#392c70',
              '#04b76b',
              '#e9e8ef',
              '#ff5e6d'
            ],
            borderWidth: 0
          }],
      
          // These labels appear in the legend and in the tooltips when hovering different arcs
          labels: [
            'Pendiente',
            'Aprobado',
            'Cancelado',
            'Entregado'
          ]
        };
        var dailySalesChartOptions = {
          responsive: true,
          maintainAspectRatio: true,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false
          },
          legendCallback: function(chart) { 
            var text = [];
            text.push('<ul class="legend'+ chart.id +'">');
            for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
              text.push('<li><span class="legend-label" style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '"></span>');
              if (chart.data.labels[i]) {
                text.push(chart.data.labels[i]);
              }
              text.push('</li>');
            }
            text.push('</ul>');
            return text.join("");
          },
          cutoutPercentage: 70     
        };
        var dailySalesChartCanvas = $("#daily-sales-chart").get(0).getContext("2d");
        var dailySalesChart = new Chart(dailySalesChartCanvas, {
          type: 'doughnut',
          data: dailySalesChartData,
          options: dailySalesChartOptions
        });
        document.getElementById('daily-sales-chart-legend').innerHTML = dailySalesChart.generateLegend();
      }
</script>


<script>
    $(function(){
        if ($("#sales-status-chart").length) {
            var pieChartCanvas = $("#sales-status-chart").get(0).getContext("2d");
            var pieChart = new Chart(pieChartCanvas, {
              type: 'pie',
              data: {
                datasets: [{
                  data: [<?php foreach ($order_mes as $order)
                  {echo ''. $order->count.',';} ?>],
                  backgroundColor: [
                    '#392c70',
                    '#04b76b',
                    '#ff5e6d',
                    '#eeeeee'
                  ],
                  borderColor: [
                    '#392c70',
                    '#04b76b',
                    '#ff5e6d',
                    '#eeeeee'
                  ],
                }],
                labels: [
                    'Pendiente',
                    'Aprobado',
                    'Cancelado',
                    'Entregado',
                ]
              },
              options: {
                responsive: true,
                animation: {
                  animateScale: true,
                  animateRotate: true
                },
                legend: {
                  display: false
                },
                legendCallback: function(chart) { 
                  var text = [];
                  text.push('<ul class="legend'+ chart.id +'">');
                  for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                    text.push('<li><span class="legend-label" style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '"></span>');
                    if (chart.data.labels[i]) {
                      text.push(chart.data.labels[i]);
                    }
                    text.push('<label class="badge badge-light badge-pill legend-percentage ml-auto">'+ chart.data.datasets[0].data[i] + ' Pedidos</label>');
                    text.push('</li>');
                  }
                  text.push('</ul>');
                  return text.join("");
                }
              }
            });
            document.getElementById('sales-status-chart-legend').innerHTML = pieChart.generateLegend();
          }
    });
</script>

<script>
    $(function(){
        var productos_pedidos = document.getElementById('productos_pedidos').getContext('2d');
        var charCompra = new Chart(productos_pedidos, {
            type: 'bar',
            data: {
                labels: [<?php foreach ($most_ordered_products as $most_ordered_product)
                    { 
                        echo '"'. $most_ordered_product->product->name.'",';
                    } ?>],

                datasets: [{
                    label: 'Compras',
                    data:   [<?php 
                                foreach ($most_ordered_products as $most_ordered_product)
                                    {echo ''. $most_ordered_product->total.',';}
                            ?>],
                            backgroundColor: [
                                '#5E50F9',
                                '#6610f2',
                                '#6a008a',
                                '#E91E63',
                                '#f96868',
                                '#f2a654',
                                '#f6e84e',
                                '#46c35f',
                                '#58d8a3',
                                '#57c7d4',
                                '#E91E63',
                                '#f96868'
                              ],
                              borderColor: [
                                '#5E50F9',
                                '#6610f2',
                                '#6a008a',
                                '#E91E63',
                                '#f96868',
                                '#f2a654',
                                '#f6e84e',
                                '#46c35f',
                                '#58d8a3',
                                '#57c7d4',
                                '#E91E63',
                                '#f96868'
                              ],
                    borderWidth:1
                }]
            },
            
            options: {
                scales: {
                  yAxes: [{
                    ticks: {
                    
                        beginAtZero:true
                    }
                  }]
                },
                legend: {
                  display: false
                },
                elements: {
                  point: {
                    radius: 5
                  }
                }
            }
        });
    });
    
</script>


<script>
    $(function(){
        var varCompra=document.getElementById('compras').getContext('2d');
    
            var charCompra = new Chart(varCompra, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($comprasmes as $reg)
                        { 
                    
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                    $mes_traducido=strftime('%B',strtotime($reg->mes));
            
                    echo '"'. $mes_traducido.'",';} ?>],
                    datasets: [{
                        label: 'Compras',
                        data: [<?php foreach ($comprasmes as $reg)
                            {echo ''. $reg->totalmes.',';} ?>],

                        backgroundColor: '#E91E63',
                        borderColor: '#E91E63',

                        borderWidth:3
                    }]
                },
                
                options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                            
                            beginAtZero:true
                        }
                      }]
                    },
                    legend: {
                      display: false
                    },
                    elements: {
                      point: {
                        radius: 5
                      }
                    }
                }
            });
            var varVenta=document.getElementById('ventas').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($ventasmes as $reg)
                {
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                    $mes_traducido=strftime('%B',strtotime($reg->mes));
                    
                    echo '"'. $mes_traducido.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasmes as $reg)
                        {echo ''. $reg->totalmes.',';} ?>],
                        backgroundColor: '#f96868',
                        borderColor: '#f96868',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                            
                            beginAtZero:true
                        }
                      }]
                    },
                    legend: {
                      display: false
                    },
                    elements: {
                      point: {
                        radius: 5
                      }
                    }
                }
            });
            
            var varVenta=document.getElementById('ventas_diarias').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($ventasdia as $ventadia)
                    {
                    $dia = $ventadia->date;


                    echo '"'. $dia.'",';} ?>],
                    datasets: [
                      {
                        label: 'Ventas',
                        data: [<?php foreach ($ventasdia as $reg)
                        {echo ''. $reg->count.',';} ?>],
                        backgroundColor: '#5E50F9',
                        borderColor: '#3a3f51',
                        borderWidth: 1
                    }
                  ]
                },
                options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                            stepSize: 1,
                            beginAtZero:true
                        }
                      }]
                    },
                    legend: {
                      display: false
                    },
                    elements: {
                      point: {
                        radius: 5
                      }
                    }
                }
            });

            var chart = c3.generate({
            bindto: '#c3-proyeccion',
            data: {
                columns: [
                  ['Predicción', <?php for($i=0; $i<$ventasdia->count()+7; $i++)
                      {echo ''. $prediccion[$i].',';} ?>],
                  ['Ventas', <?php foreach ($ventasdia as $reg)
                        {echo ''. $reg->count.',';} ?>]
                ],
                type: 'spline'
            },
            axis: {
                x: {
                    type: 'category',
                    categories: [<?php foreach ($ventasdia as $ventadia)
                    {$dia = $ventadia->date;
                    echo '"'. $dia.'",';} ?> '5th February 2022', '6th February 2022', '7th February 2022','8th February 2022', '9th February 2022', '10th February 2022', '11th February 2022']
                }

            },
            
      });
    });
</script>

@endsection
