<div class="row col-md-12">

  <div class="col-md-6 col-sm-4 text-center">
    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
      <div class="fileinput-new thumbnail img-raised">
        @if(isset( $costumer->img))
        <img src="{{ isset($costumer) && $costumer->img && !old('img') ? url('storage/'.$costumer->img) : ''}} "
          rel="nofollow" alt="Imagem do Cliente">
        @else
        <img src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" rel="nofollow"
          alt="Imagem do Cliente" height="200" style="width: 200px;">
        @endif
      </div>
      <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
      <div>
        <span class="btn btn-raised btn-round btn-default btn-file">
          <span class="fileinput-new">Selecionar Foto</span>
          <span class="fileinput-exists">Mudar</span>
          <input type="file" name="img" value="" />
        </span>
        <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
            class="fa fa-times"></i> Remover</a>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="col-md-12">
      <div class="form-group">
        <select class="form-control selectpicker mt-3 selec-pessoa" data-style="btn btn-link" name="type_person"
          id="type_person">
          @if( isset($costumer) && strlen($costumer->person->cpf_cnpj) > 11 )
          <option value="pj" selected> Pessoa Jurídica </option>
          <option value="pf"> Pessoa Física </option>
          @else
          <option value="pf" selected> Pessoa Física </option>
          <option value="pj"> Pessoa Jurídica </option>
          @endif
        </select>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label for="cpf_cnpj" class="bmd-label-floating">
          CPF | CNPJ
          <span class="text-danger">*</span>
        </label>
        {!! Form::text('cpf_cnpj', isset($costumer) && $costumer->person->cpf_cnpj && !old('cpf_cnpj') != null ?
        $costumer->person->cpf_cnpj : old('cpf_cnpj') , ['class'=>'form-control mt-4 cpf_cnpj-mask', 'required',
        'id'=>'cpf_cnpj'])
        !!}
      </div>
    </div>

    <div class="col-md-12 dados-pf">
      <div class="form-group">
        <label for="documento" class="bmd-label-floating">
          RG
        </label>
        {!! Form::text('documento', isset($costumer) && $costumer->person->documento && !old('documento') != null ?
        $costumer->person->documento : old('documento') , ['class'=>'form-control mt-4', 'id'=>'documento'])
        !!}
      </div>
    </div>
  </div>


  <div class="col-md-8">
    <div class="form-group">
      <label for="name" class="bmd-label-floating">
        Nome
        <span class="text-danger">*</span>
      </label>
      {!! Form::text('name', isset($costumer) && $costumer->name && !old('name') != null ? $costumer->name : old('name')
      , ['class'=>'form-control mt-4', 'id'=>'name']) !!}
    </div>
  </div>


  <div class="col-md-4 dados-pf">
    <div class="form-group">
      <label class="label-control">Data de Nascimento</label>
      <input type="text" class="form-control datetimepicker mt-4"
        value="{{ isset($costumer) && $costumer->birth && !old('birth') != null ? date('d/m/Y', strtotime($costumer->birth)) : old('birth') }}"
        name="birth" id="birth" />
    </div>
  </div>


  <div class="col-md-6 dados-pf">
    <div class="form-group">
      <select class="form-control selectpicker text-uppercase mt-3" data-style="btn btn-link" name="civil_state"
        id="civil_state">
        @if(isset($costumer) && $costumer->civil_state && !old('civil_state') != null)
        <option value="casado" selected>{{ $costumer->civil_state }}</option>
        @else
        <option disabled selected>Estado Civil</option>
        @endif
        <option value="casado">Casado(a)</option>
        <option value="solteiro">Solteiro(a)</option>
        <option value="viuvo">Viuvo(a)</option>
        <option value="união estavel">União Estável</option>
        <option value="divorciado">Divorciado</option>
      </select>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="email" class="bmd-label-floating">
        E-mail
        <span class="text-danger">*</span>
      </label>
      {!! Form::email('email', isset($costumer) && $costumer->email && !old('email') != null ? $costumer->email :
      old('email') , ['class'=>'form-control mt-4', 'id'=>'email']) !!}
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="phone" class="bmd-label-floating">
        Telefone
        <span class="text-danger">*</span>
      </label>
      {!! Form::text('phone', isset($costumer) && $costumer->phone && !old('phone') != null ? $costumer->phone :
      old('phone') , ['class'=>'form-control mt-4 phone-mask']) !!}
    </div>
  </div>


  <div class="col-md-3 dados-pj">
    <div class="form-group">
      <label for="insc_estadual" class="bmd-label-floating">
        Inscrição Estadual
        <span class="text-danger">*</span>
      </label>
      {!! Form::text('insc_estadual', isset($costumer) && $costumer->person->insc_estadual && !old('insc_estadual') !=
      null ? $costumer->person->insc_estadual :
      old('insc_estadual') , ['class'=>'form-control mt-4', 'id'=>'insc_estadual', 'required']) !!}
    </div>
  </div>

  <div class="col-md-3 dados-pj">
    <div class="form-group">
      <label for="insc_municipal" class="bmd-label-floating">
        Inscrição Municipal
        <span class="text-danger">*</span>
      </label>
      {!! Form::text('insc_municipal', isset($costumer) && $costumer->person->insc_municipal && !old('insc_municipal')
      != null ? $costumer->person->insc_municipal :
      old('insc_municipal') , ['class'=>'form-control mt-4', 'id'=>'insc_municipal', 'required']) !!}
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="pay_day" class="bmd-label-floating">
        Dia para Pagamento
        <span class="text-danger">*</span>
      </label>
      {!! Form::number('pay_day', isset($costumer) && $costumer->pay_day && !old('pay_day') !=
      null ? $costumer->pay_day :old('pay_day') , ['class'=>'form-control mt-4', 'id'=>'pay_day', 'required']) !!}
    </div>
  </div>

  <div class="col-md-8">
    <div class="form-group">
      {!! Form::label('description', 'Descrição', ['class'=> 'bmd-label-floating']) !!}
      {!! Form::text('description', isset($costumer) && $costumer->description && !old('description') != null ?
      $costumer->description :
      old('description') , ['class'=>'form-control mt-4', 'id'=>'description']) !!}
    </div>
  </div>

</div>
@section('scripts_after_body') --}}
<script>
  $(document).ready(function(){
        $('.dados-pj').hide();
        $('.selec-pessoa').change(function(){
          if($('button[data-id="type_person"]')[0].title == 'Pessoa Física') {
              $('.dados-pf').show();
              $('.dados-pj').hide();
          } else {
              $('.dados-pj').show();
              $('.dados-pf').hide();
          }
        });
    });

    window.onload = function (){
      let cpf_cnpj = $('#cpf_cnpj').val().split('').length;
      if(cpf_cnpj > 14){
        $('.dados-pj').show();
        $('.dados-pf').hide();
      }
      if(cpf_cnpj < 14 ){
        $('.dados-pf').show();
        $('.dados-pj').hide();
      }
    }
</script>
@endsection