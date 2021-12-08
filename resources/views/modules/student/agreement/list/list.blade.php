<table class="table table-hover" id="careerTable">
    <thead>
    <tr>
        <th></th>
        <th>id</th>
        <th>Convenio</th>
        <th>Descripción</th>
        <th>Descuento - Precio</th>
        <th>Descuento - Porcentaje</th>
        <th>Escuela</th>
        <th>Estatus</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($agreements as $agreement)
        @foreach ($agreement->schools as $school)
        <tr>
            <td></td>
            <td>{{ $agreement->id }}</td>
            <td>{{ $agreement->name}}</td>
            <td>{{ $agreement->note}}</td>
            <td>{{ $school->pivot->discount_price}}</td>
            <td>{{ $school->pivot->discount_percentage}}%</td>
            <td>{{ $school->school_name}}</td>
            <td>
                @if ($agreement->status == 1)
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
                        <a href="#" class="dropdown-item item-edit" data-id="{{ $agreement->id }}">
                            <i class="me-50" data-feather="edit-2"></i>
                            <span>Editar</span>
                        </a>

                        <a href="#" class="dropdown-item delete-record" data-id="{{ $agreement->id }}">
                            <i class="me-50" data-feather="trash"></i>
                            <span>Eliminar</span>
                        </a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    @endforeach
    </tbody>
</table>