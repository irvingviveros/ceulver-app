<table class="table table-hover" id="dataTable">
    <thead>
    <tr>
        <th></th>
        <th>id</th>
        <th>Escuela</th>
        <th>Clave</th>
        <th>Fecha inicio</th>
        <th>Fecha fin</th>
        <th>En curso?</th>
        <th>Nota</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($academicYears as $academicYear)
        <tr>
            <td></td>
            <td>{{ $academicYear->id }}</td>
            <td>{{ $academicYear->school->school_name }}</td>
            <td>{{ $academicYear->session_code }}</td>
            <td>{{ $academicYear->start_date }}</td>
            <td>{{ $academicYear->end_date }}</td>
            <td>
                @if ($academicYear->is_running == 1)
                    <span class="badge badge-pill badge-light-success">
                            En curso
                        </span>
                @else
                    <span class="badge badge-pill badge-light-warning">
                            Inactiva
                        </span>
                @endif
            </td>
            <td>{{ $academicYear->note }}</td>

            <td align="center">
                <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="me-50" data-feather="more-vertical"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item item-edit" data-id="{{ $academicYear->id }}">
                            <i class="me-50" data-feather="edit-2"></i>
                            <span>Editar</span>
                        </a>

                        <a href="#" class="dropdown-item delete-record" data-id="{{ $academicYear->id }}">
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