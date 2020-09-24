<div class="tab-content">

    {{-- Dados Pessoais --}}
    <div class="tab-pane active" id="personal">

        @include('tenant.costumers.partials._form_personal')

    </div>

    {{-- Endereço --}}
    <div class="tab-pane" id="address">
        @include('tenant.costumers.partials._form_address')
    </div>

    {{-- Circuito Primario --}}
    <div class="tab-pane" id="primary_circuit">

        @include('tenant.costumers.partials._form_primary_circuit')

    </div>

</div>
