<table class="table table-hover" id="dataTable">
    <thead>
    <tr>
        <th></th>
        <th>id</th>
        <th>Escuela</th>
        <th>Materia</th>
        <th>Clave</th>
        <th>Maestro</th>
        <th>Fecha de apertura</th>
        <th>Estatus</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($subjects as $subject)
        <tr>
            <td></td>
            <td>{{ $subject->id }}</td>
            <td>{{ $subject->school->school_name }}</td>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->code}}</td>
            <td>Irving Dalí Viveros Herrera</td>
            <td>{{ $subject->opening_date }}</td>
            <td>
                @if ($subject->status == 1)
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
                        <a href="#" class="dropdown-item item-edit" data-id="{{ $subject->id }}">
                            <i class="me-50" data-feather="edit-2"></i>
                            <span>Editar</span>
                        </a>

                        <a href="#" class="dropdown-item delete-record" data-id="{{ $subject->id }}">
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