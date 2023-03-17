<div id="user-request-div" class="card-body" style="display: none;">
    <div class="card-header bg-warning">
        <h3 class="card-title"><b>Solicitudes de nuevos usuarios</b></h3>

        <div class="card-tools">
            <button type="button" class="btn bg-warning btn-sm" onClick="closeDatatable()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="card-body datatable">
        <table id="user-request-table" class="table text-nowrap cell-border hover" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Rol de usuario</th>
                    <th>Correo</th>
                    <th>Fecha solicitud</th>
                    <th>Responder</th>
                </tr>
            </thead>
        </table>
    </div>
</div>