<table class="table table-hover" id="dataTable">
    <thead>
    <tr>
        <th></th>
        <th>id</th>
        <th>Matrícula</th>
        <th>Nombre</th>
        <th>CURP</th>
        <th>Convenio</th>
        <th>Escuela</th>
        <th>Nota</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
        <tr>
            <td></td>
            <td>{{ $student->id }}</td>
            <td>{{ $student->enrollment }}</td>
            <td>{{ "{$student->paternal_surname} {$student->maternal_surname} {$student->middle_name} {$student->first_name}"}}</td>
            <td>{{ $student->national_id }}</td>
            <td>{{ $student->agreement_id }}</td>
            <td>{{ $student->school->school_name }}</td>
            <td>{{ $student->other_info }}</td>

            <td align="center">
                <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="me-50" data-feather="more-vertical"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">
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
