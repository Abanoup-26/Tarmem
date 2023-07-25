<!DOCTYPE html>
<html @if (app()->getLocale() == 'ar') dir="rtl" @endif>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/coreui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_offline/css/perfect-scrollbar.min.css') }}">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body class="c-app">
    @include('partials.menu')
    <div class="c-wrapper">
        <header class="c-header c-header-fixed px-3">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
                data-class="c-sidebar-show">
                <i class="fas fa-fw fa-bars"></i>
            </button>

            <a class="c-header-brand d-lg-none" href="#">{{ trans('panel.site_title') }}</a>

            <button class="c-header-toggler mfs-3 d-md-down-none" type="button" responsive="true">
                <i class="fas fa-fw fa-bars"></i>
            </button>

            <ul class="c-header-nav @if (app()->getLocale() == 'ar') mr-auto @else ml-auto @endif">
                @if (count(config('panel.available_languages', [])) > 1)
                    <li class="c-header-nav-item dropdown d-md-down-none">
                        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @foreach (config('panel.available_languages') as $langLocale => $langName)
                                <a class="dropdown-item"
                                    href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                                    ({{ $langName }})</a>
                            @endforeach
                        </div>
                    </li>
                @endif

                <ul class="c-header-nav ml-auto">
                    <li class="c-header-nav-item dropdown notifications-menu">
                        <a href="#" class="c-header-nav-link" data-toggle="dropdown">
                            <i class="far fa-bell"></i>
                            @php($alertsCount = \Auth::user()->userUserAlerts()->where('read', false)->count())
                            @if ($alertsCount > 0)
                                <span class="badge badge-warning navbar-badge">
                                    {{ $alertsCount }}
                                </span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            @if (count($alerts = \Auth::user()->userUserAlerts()->withPivot('read')->limit(10)->orderBy('created_at', 'ASC')->get()->reverse()) > 0)
                                @foreach ($alerts as $alert)
                                    <div class="dropdown-item">
                                        <a href="{{ $alert->alert_link ? $alert->alert_link : ' #' }}" target="_blank"
                                            rel="noopener noreferrer">
                                            @if ($alert->pivot->read === 0)
                                                <strong>
                                            @endif
                                            {{ $alert->alert_text }}
                                            @if ($alert->pivot->read === 0)
                                                </strong>
                                            @endif
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center">
                                    {{ trans('global.no_alerts') }}
                                </div>
                            @endif
                        </div>
                    </li>
                </ul>

            </ul>
        </header>

        <div class="c-body">
            <main class="c-main">


                <div class="container-fluid">
                    @if (session('message'))
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                            </div>
                        </div>
                    @endif
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')

                </div>


            </main>
            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="{{ asset('dashboard_offline/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/coreui.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/dataTables.select.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('dashboard_offline/js/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('dashboard_offline/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $(function() {
            let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
            let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
            let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
            let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
            let printButtonTrans = '{{ trans('global.datatables.print') }}'
            let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
            let selectAllButtonTrans = '{{ trans('global.select_all') }}'
            let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

            let languages = {
                'ar': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json',
                'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
            };

            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
                className: 'btn'
            })
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                    style: 'multi+shift',
                    selector: 'td:first-child'
                },
                order: [],
                scrollX: true,
                pageLength: 100,
                dom: 'lBfrtip<"actions">',
                buttons: [{
                        extend: 'selectAll',
                        className: 'btn-primary',
                        text: selectAllButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        },
                        action: function(e, dt) {
                            e.preventDefault()
                            dt.rows().deselect();
                            dt.rows({
                                search: 'applied'
                            }).select();
                        }
                    },
                    {
                        extend: 'selectNone',
                        className: 'btn-primary',
                        text: selectNoneButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        className: 'btn-default',
                        text: copyButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-default',
                        text: csvButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn-default',
                        text: excelButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-default',
                        text: pdfButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn-default',
                        text: printButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        className: 'btn-default',
                        text: colvisButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
            });

            $.fn.dataTable.ext.classes.sPageButton = '';
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".notifications-menu").on('click', function() {
                if (!$(this).hasClass('open')) {
                    $('.notifications-menu .label-warning').hide();
                    $.get('/admin/user-alerts/read');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.searchable-field').select2({
                minimumInputLength: 3,
                ajax: {
                    url: '{{ route('admin.globalSearch') }}',
                    dataType: 'json',
                    type: 'GET',
                    delay: 200,
                    data: function(term) {
                        return {
                            search: term
                        };
                    },
                    results: function(data) {
                        return {
                            data
                        };
                    }
                },
                escapeMarkup: function(markup) {
                    return markup;
                },
                templateResult: formatItem,
                templateSelection: formatItemSelection,
                placeholder: '{{ trans('global.search') }}...',
                language: {
                    inputTooShort: function(args) {
                        var remainingChars = args.minimum - args.input.length;
                        var translation = '{{ trans('global.search_input_too_short') }}';

                        return translation.replace(':count', remainingChars);
                    },
                    errorLoading: function() {
                        return '{{ trans('global.results_could_not_be_loaded') }}';
                    },
                    searching: function() {
                        return '{{ trans('global.searching') }}';
                    },
                    noResults: function() {
                        return '{{ trans('global.no_results') }}';
                    },
                }

            });

            function formatItem(item) {
                if (item.loading) {
                    return '{{ trans('global.searching') }}...';
                }
                var markup = "<div class='searchable-link' href='" + item.url + "'>";
                markup += "<div class='searchable-title'>" + item.model + "</div>";
                $.each(item.fields, function(key, field) {
                    markup += "<div class='searchable-fields'>" + item.fields_formated[field] + " : " +
                        item[field] + "</div>";
                });
                markup += "</div>";

                return markup;
            }

            function formatItemSelection(item) {
                if (!item.model) {
                    return '{{ trans('global.search') }}...';
                }
                return item.model;
            }
            $(document).delegate('.searchable-link', 'click', function() {
                var url = $(this).attr('href');
                window.location = url;
            });
        });
    </script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script>
        function showAlert(type, title, message) {
            swal({
                title: title,
                text: message,
                type: type,
                showConfirmButton: 'Okay',
                timer: 3000
            });
        }

        function showToast(type, title) {
            swal({
                toast: true,
                title: title,
                type: type,
                position: 'center-center',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
        }
    </script>
    {{-- update status   --}}
    <script>
        function update_statuses(el, column_name) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.users.update_statuses') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                approved: status,
                column_name: column_name
            }, function(data) {
                if (data == 1) {
                    showAlert('success', 'Success', '');
                } else {
                    showAlert('danger', 'Something went wrong', '');
                }
            });
        }
    </script>
    @yield('scripts')
</body>

</html>
