<div id="requests-datatable" class="card-body" style="display: none;">
    <div class="card-header bg-warning">
        <h3 class="card-title"><b>Crear un nuevo usuario</b></h3>

        <div class="card-tools">
            <button type="button" class="btn bg-warning btn-sm" onClick="closeDatatable()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="card-body datatable">
        <button onClick="userRequest(true, 'approve')" class="btn bg-navy">Agregar usuario <i class="fa-duotone fa-circle-plus"></i></button>

        <table id="user-requests" class="table text-nowrap cell-border hover" width="100%">
            <thead>
                <tr>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Tipo de usuario</th>
                <th>Correo</th>
                <th>Respaldo</th>
                <th>Área</th>
                <th>Editar</th>
                </tr>
            </thead>
        </table>
    </div>
</div>