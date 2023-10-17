@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.beneficiary.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Beneficiary">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.qualifications') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.job_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.marital_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiary.fields.building') }}
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
                ajax: "{{ route('admin.beneficiaries.index') }}",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },

                    {
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'qualifications',
                        name: 'qualifications'
                    },
                    {
                        data: 'job_status',
                        name: 'job_status'
                    },

                    {
                        data: 'marital_status',
                        name: 'marital_status'
                    },
                    {
                        data: 'building',
                        name: 'building.name'
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
            let table = $('.datatable-Beneficiary').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
