<!-- Modal -->
<div class="modal fade" id="deleteModal{{{$item->id}}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Model</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                Tem certeza que deseja excluir {{$item->name}}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link btn-dark" data-dismiss="modal">Não</button>
                <form id="{{$item->id}}" action="{{route($route, $item)}}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link btn-danger">
                        Sim, Excluir    
                    </button>
                </form>
                
            </div>
        </div>
    </div>
</div>