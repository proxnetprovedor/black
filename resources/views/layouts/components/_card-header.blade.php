<div class="card-header card-header-primary card-header-icon">
    <div class="card-icon" style="" >
      <i class="material-icons" style="">{{$icon}}</i>
      {{-- <p style="text-align: center">{{$tittle}}</p> --}}
    </div>
    <h4 class="card-title">{{$tittle}}</h4>
@if ($button['active'] == true)
    <div class="card-title col-12 text-right" style="margin-top: -30px"><a href="{{$button['route']}}" class="btn btn-sm btn-primary">{{$button['tittle']}}</a></div>
@endif
    
</div>