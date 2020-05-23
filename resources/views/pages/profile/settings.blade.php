@extends('layouts.admin')

@section('title','Configurações')

@section('content')

<div class="col-md-12">
    <div class="card ">
        <div class="card-header ">
        <h4 class="card-title">Navigation Pills -
            <small class="description">Horizontal Tabs</small>
        </h4>
        </div>
        <div class="card-body ">
        <ul class="nav nav-pills nav-pills-icons nav-pills-primary" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#empresa" role="tablist">
                    Empresa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#financeiro" role="tablist">
                    Financeiro
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                    SMS
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#link4" role="tablist">
                    Emails
                </a>
            </li>
        </ul>
        <div class="tab-content tab-space">
            <div class="tab-pane active" id="empresa">
                @include('pages.profile._form-empresa')
            </div>
            <div class="tab-pane" id="financeiro">
                @include('pages.profile._form-financeiro')
            </div>
            <div class="tab-pane" id="link3">
                @include('pages.profile._form-empresa')
            </div>
            <div class="tab-pane" id="link4">
                @include('pages.profile._form-empresa')
            </div>
        </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card ">
        <div class="card-header ">
        <h4 class="card-title">Navigation Pills Icons -
            <small class="description">Vertical Tabs</small>
        </h4>
        </div>
        <div class="card-body ">
        <div class="row">
            <div class="col-lg-2 col-md-2">
            <!--
                        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                    -->
            <ul class="nav nav-pills nav-pills-primary nav-pills-icons flex-column" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#link110" role="tablist">
                    <i class="material-icons">dashboard</i> Home
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#link111" role="tablist">
                    <i class="material-icons">schedule</i> Settings
                </a>
                </li>
            </ul>
            </div>
            <div class="col-md-8">
            <div class="tab-content">
                <div class="tab-pane active" id="link110">
                Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                <br>
                <br> Dramatically visualize customer directed convergence without revolutionary ROI. Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                <br />
                <br /> Dramatically visualize customer directed convergence without revolutionary ROI. Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                </div>
                <div class="tab-pane" id="link111">
                Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                <br>
                <br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
  <!-- end col-md-12 -->


@endsection


