<div class="card">
    <div class="card-header">
        {{ trans('cruds.beneficiaryNeed.title_singular') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table
                class=" table table-bordered table-striped table-hover datatable datatable-beneficiarybeneficiaryNeeds">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.unit') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.trmem_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.photos_before') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryNeed.fields.photos_after') }}
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiaryNeeds as $key => $beneficiaryNeed)
                        <tr data-entry-id="{{ $beneficiaryNeed->id }}">
                            <td>
                                {{ $beneficiaryNeed->unit->name ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryNeed->description ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryNeed->trmem_type ?? '' }}
                            </td>
                            <td>
                                @foreach ($beneficiaryNeed->photos_before as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($beneficiaryNeed->photos_after as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-beneficiaryBeneficiaryNeeds:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .rows.adjust();
            });

        })
    </script>
@endsection
