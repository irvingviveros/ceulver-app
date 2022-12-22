<table class="table table-hover" id="dataTable">
    <thead>
    <tr>
        <th class="noVis"></th>
        <th>ID</th>
        <th>Nivel educativo</th>
        <th>Matrícula</th>
        <th>Apellido paterno</th>
        <th>Apellido materno</th>
        <th>Nombre</th>
        <th>CURP</th>
        <th>Estado civil</th>
        <th>Domicilio</th>
        <th>Correo personal</th>
        <th>Teléfono</th>
        <th class="noVis">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
        <tr>
            <td></td>
            <td>{{ $student->id }}</td>
            <td>{{ $student->school->educationalSystem->name }}</td>
            <td>{{ $student->enrollment }}</td>
            <td>{{ $student->paternal_surname }}</td>
            <td>{{ $student->maternal_surname }}</td>
            <td>{{ $student->first_name }}</td>
            <td>{{ $student->national_id }}</td>
            <td>{{ $student->marital_status }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->personal_email }}</td>
            <td>{{ $student->personal_phone }}</td>
            <td align="center">
                <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="me-50" data-feather="more-vertical"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item item-show" data-id="{{ $student->id }}">
                            <i class="me-50" data-feather="file-text"></i>
                            <span>Detalles</span>
                        </a>
                        <a href="#" class="dropdown-item item-edit" data-id="{{ $student->id }}">
                            <i class="me-50" data-feather="edit-2"></i>
                            <span>Editar</span>
                        </a>
                        <a href="#" class="dropdown-item delete-record" data-id="{{ $student->id }}">
                            <i class="me-50" data-feather="trash"></i>
                            <span>Eliminar</span>
                        </a>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
