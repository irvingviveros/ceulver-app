<table class="table table-hover" id="dataTable">
    <thead>
    <tr>
        <th></th>
        <th>id</th>
        <th>Nombre</th>
        <th>Retícula</th>
        <th>Descripción</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($cycles as $cycle)
        <tr>
            <td></td>
            <td>{{ $cycle->id }}</td>
            <td>{{ $cycle->name }}</td>
            <td>{{ $cycle->syllabus->name }}</td>
            <td>{{ $cycle->note }}</td>
            <td class="text-center">
                <div class="dropdown d-inline-flex">

                    <a href="#" class="dropdown-item item-cycle rounded bg-primary bg-opacity-10" data-id="{{ $cycle->id }}">
                        <i class="me-50" data-feather="clock"></i>
                        <span>Materias</span>
                    </a>

                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect text-primary" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="me-50" data-feather="more-vertical"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item item-edit" data-id="{{ $cycle->id }}" data-children="{{ $cycle->id }}">
                            <i class="me-50" data-feather="edit-2"></i>
                            <span>Editar</span>
                        </a>

                        <a href="#" class="dropdown-item delete-record" data-id="{{ $cycle->id }}">
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
