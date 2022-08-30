<table class="table table-hover" id="dataTable">
    <thead>
    <tr>
        <th></th>
        <th>id</th>
        <th>Nombre</th>
        <th>Escuela</th>
        <th>Plantel</th>
        <th>Descripción</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($groups as $group)
        <tr>
            <td></td>
            <td>{{ $group->id }}</td>
            <td>{{ $group->name }}</td>
            <td>{{ $group->school->school_name }}</td>
            <td>{{ $group->school->educationalSystem->name}}</td>
            <td>{{ $group->note }}</td>
            <td align="center">
                <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="me-50" data-feather="more-vertical"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item item-edit" data-id="{{ $group->id }}">
                            <i class="me-50" data-feather="edit-2"></i>
                            <span>Editar</span>
                        </a>

                        <a href="#" class="dropdown-item delete-record" data-id="{{ $group->id }}">
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
