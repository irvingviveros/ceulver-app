<table class="table table-hover" id="careerTable">
    <thead>
    <tr>
        <th></th>
        <th>id</th>
        <th>Nombre</th>
        <th>Matrícula</th>
        <th>Fecha de apertura</th>
        <th>Estatus</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($careers as $career)
        <tr>
            <td></td>
            <td>{{ $career->id }}</td>
            <td>{{ $career->name }}</td>
            <td>{{ $career->enrollment }}</td>
            <td>{{ $career->opening_date }}</td>
            <td>
                @if ($career->status == 1)
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
                        <a href="#" class="dropdown-item item-edit" data-id="{{ $career->id }}">
                            <i class="me-50" data-feather="edit-2"></i>
                            <span>Editar</span>
                        </a>

                        <a href="#" class="dropdown-item delete-record" data-id="{{ $career->id }}">
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