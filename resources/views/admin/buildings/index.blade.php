@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.building.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Building">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.building.fields.building_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.management_statuses') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.rejected_reson') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.stages') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.research_vist_result') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.engineering_vist_result') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.buildings.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },

                    {
                        data: 'building_type',
                        name: 'building_type'
                    },

                    {
                        data: 'management_statuses',
                        name: 'management_statuses'
                    },
                    {
                        data: 'rejected_reson',
                        name: 'rejected_reson'
                    },
                    {
                        data: 'stages',
                        name: 'stages'
                    },

                    {
                        data: 'research_vist_result',
                        name: 'research_vist_result',
                        sortable: false,
                        searchable: false
                    },

                    {
                        data: 'engineering_vist_result',
                        name: 'engineering_vist_result',
                        sortable: false,
                        searchable: false
                    },
                    {
                        data: 'actions',
                        name: '{{ trans('global.actions') }}'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            };
            let table = $('.datatable-Building').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
