<!-- Modal -->
<div class="modal fade" id="modalFastEvent" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titleModal">Modal title</h5>
        </div>
        <div class="modal-body">

            <div class="mensagem"></div>

            <form id="formFastEvent">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title">
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="form-group">
                    <label for="start">Hora Inicial</label>
                    <input type="text" name="start" class="form-control time" id="start">
                </div>
                <div class="form-group">
                    <label for="end">Hora Final</label>
                    <input type="text" name="end" class="form-control time" id="end">
                </div>
                <div class="form-group">
                    <label for="color">Cor do Evento</label>
                    <input type="color" name="color" class="form-control" id="color">
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary closeFastModal">Fechar</button>
          <button type="button" class="btn btn-danger deleteFastEvent" id="deleteFastEvent">Excluir</button>
          <button type="button" class="btn btn-primary saveFastEvent" id="saveFastEvent">Salvar</button>
        </div>
      </div>
    </div>
</div>
