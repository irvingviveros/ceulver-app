<table class="table table-hover" id="dataTable">
    <thead>
    <tr>
        <th></th>
        <th>id</th>
        <th>Escuela</th>
        <th>Nombre</th>
        <th>Responsabilidad</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Fecha de ingreso</th>
        <th>Estatus</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($teachers as $teacher)
        <tr>
            <td></td>
            <td>{{ $teacher->id }}</td>
            @foreach($teacher->schools as $school)
                <td>{{ $school -> school_name }}</td>
            @endforeach
            @foreach($teacher->subjects as $subject)
                <id>{{ $subject -> name }}</id>
            @endforeach
            <td>{{ $teacher->phone }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->joining_date }}</td>
            <td>
                @if ($academicYear->is_running == 1)
                    <span class="badge badge-pill badge-light-success">
                            Activo
                        </span>
                @else
                    <span class="badge badge-pill badge-light-warning">
                            Inactivo
                        </span>
                @endif
            </td>

            <td align="center">
                <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="me-50" data-feather="more-vertical"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item item-edit" data-id="{{ $teacher->id }}">
                            <i class="me-50" data-feather="edit-2"></i>
                            <span>Editar</span>
                        </a>

                        <a href="#" class="dropdown-item delete-record" data-id="{{ $teacher->id }}">
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