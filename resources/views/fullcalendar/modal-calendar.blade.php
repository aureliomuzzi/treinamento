<!-- Modal -->
<div class="modal fade" id="modalCalendar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titleModal">Modal title</h5>
        </div>
        <div class="modal-body">
            <form id="formEvent">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title">
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="form-group">
                    <label for="start">Data/Hora Inicial</label>
                    <input type="text" name="start" class="form-control date-time" id="start">
                </div>
                <div class="form-group">
                    <label for="end">Data/Hora Final</label>
                    <input type="text" name="end" class="form-control date-time" id="end">
                </div>
                <div class="form-group">
                    <label for="color">Cor do Evento</label>
                    <input type="color" name="color" class="form-control" id="color">
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" class="form-control" cols="40" rows="4" id="description"></textarea>
                </div>

              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-danger deleteEvent">Excluir</button>
          <button type="button" class="btn btn-primary saveEvent">Salvar</button>
        </div>
      </div>
    </div>
</div>
