<table class="table dt-column-search" id="dataTable">
    <thead>
    <tr>
        <th class="noVis"></th>
        <th>#Folio</th>
        <th>Referencia</th>
        <th>Nombre completo</th>
        <th>Método de pago</th>
        <th>Concepto de pago</th>
        <th>Cantidad</th>
        <th>Fecha de pago</th>
        @if($educationalSystemName === 'Universidad')
            <th>Matrícula</th>
        @endif
        <th>Estatus</th>
        <th class="noVis">Acciones</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <th></th>
        <th>
            <label>
                <input type="text" class="form-control filter-input"
                       placeholder="Folio" data-column="1">
            </label>
        </th>
        <th>
            <label>
                <input type="text" class="form-control filter-input"
                       placeholder="Referencia" data-column="2">
            </label>
        </th>
        <th>
            <label>
                <input type="text" class="form-control filter-input"
                       placeholder="Nombre" data-column="3">
            </label>
        </th>
        <th>
            <label>
                <input type="text" class="form-control filter-input"
                       placeholder="Método" data-column="4">
            </label>
        </th>
        <th>
            <label>
                <input type="text" class="form-control filter-input"
                       placeholder="Concepto de pago" data-column="5">
            </label>
        </th>
        <th>
            <label>
                <input type="text" class="form-control filter-input"
                       placeholder="Cantidad" data-column="6">
            </label>
        </th>
        <th>
            <label>
                <input type="text" class="form-control filter-input"
                       placeholder="Fecha pago" data-column="7">
            </label>
        </th>
        @if($educationalSystemName === 'Universidad')
            <th>
                <label>
                    <input type="text" class="form-control filter-input"
                           placeholder="Matrícula" data-column="8">
                </label>
            </th>
        @endif
        <th>
            <label>
                <input type="text" class="form-control filter-input"
                       placeholder="Estatus" data-column="9">
            </label>
        </th>
        <th></th>
    </tr>
    </tfoot>
</table>
