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
                            {{ trans('cruds.building.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.building_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.building_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.management_statuses') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.stages') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.organization') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.project_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.price_items') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.buidling_age') }}
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
                        data: 'id',
                        name: 'id'
                    },

                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'building_number',
                        name: 'building_number'
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
                        data: 'stages',
                        name: 'stages'
                    },
                    {
                        data: 'organization_name',
                        name: 'organization.name'
                    },
                    {
                        data: 'project_name',
                        name: 'project_name'
                    },
                    {
                        data: 'price_items',
                        name: 'price_items',
                    },
                    {
                        data: 'buidling_age',
                        name: 'buidling_age'
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
