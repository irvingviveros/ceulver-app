<table class="table table-hover" id="dataTable">
    <thead>
    <tr>
        <th></th>
        <th>id</th>
        <th>Retícula</th>
        <th>Carrera</th>
        <th>Escuela</th>
        <th>Plantel</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($syllabi as $syllabus)
        <tr>
            <td></td>
            <td>{{ $syllabus->id }}</td>
            <td>{{ $syllabus->name }}</td>
            <td>{{ $syllabus->career->name }}</td>
            <td>{{ $syllabus->school->school_name }}</td>
            <td>{{ $syllabus->school->educationalSystem->name}}</td>
            <td align="center">
                <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="me-50" data-feather="more-vertical"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item item-edit" data-id="{{ $syllabus->id }}">
                            <i class="me-50" data-feather="edit-2"></i>
                            <span>Editar</span>
                        </a>

                        <a href="#" class="dropdown-item delete-record" data-id="{{ $syllabus->id }}">
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
