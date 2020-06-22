<!-- Modal -->
<div class="modal fade" id="deleteCtoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir CTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                Tem certeza que deseja excluir?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link btn-danger" data-dismiss="modal">Não</button>
                <button type="button" class="btn btn-link btn-danger" onclick="deleteCto('{{ $cto->id }}')">
                    Sim, Excluir    
                </button>
            </div>
        </div>
    </div>
</div>