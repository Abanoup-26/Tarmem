@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body" style="background-color: #a0ccc4;">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row ">
                            <div class="{{ $settings1['column_class'] }}">
                                <div class="card text-black bg-primary ">
                                    <div class="bg-primary p-2 text-bold  pb-0">
                                        <div class="text-value">{{ number_format($settings1['total_number']) }}</div>
                                        <div>{{ $settings1['chart_title'] }}</div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="{{ $settings2['column_class'] }}">
                                <div class="card text-black bg-info">
                                    <div class="bg-info p-2 text-bold  pb-0">
                                        <div class="text-value">{{ number_format($settings2['total_number']) }}</div>
                                        <div>{{ $settings2['chart_title'] }}</div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="{{ $settings3['column_class'] }}">
                                <div class="card text-black bg-success">
                                    <div class="bg-success p-2 text-bold  pb-0">
                                        <div class="text-value">{{ number_format($settings3['total_number']) }}</div>
                                        <div>{{ $settings3['chart_title'] }}</div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="{{ $settings5['column_class'] }}">
                                <div class="card text-black bg-warning">
                                    <div class="bg-warning p-2 text-bold  pb-0">
                                        <div class="text-value">{{ number_format($settings5['total_number']) }}</div>
                                        <div>{{ $settings5['chart_title'] }}</div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            {{-- Widget - latest entries --}}
                            <div class="{{ $settings4['column_class'] }}" style="overflow-x: auto;">
                                <h3>{{ $settings4['chart_title'] }}</h3>
                                <table class="table table-success table-bordered table-striped">
                                    <thead>
                                        <tr class="table-dark ">
                                            @foreach ($settings4['fields'] as $key => $value)
                                                <th>
                                                    {{ trans(sprintf('cruds.%s.fields.%s', $settings4['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($settings4['data'] as $entry)
                                            <tr>
                                                @foreach ($settings4['fields'] as $key => $value)
                                                    <td>
                                                        @if ($value === '')
                                                            {{ $entry->{$key} }}
                                                        @elseif(is_iterable($entry->{$key}))
                                                            @foreach ($entry->{$key} as $subEentry)
                                                                <span
                                                                    class="label label-info">{{ $subEentry->{$value} }}</span>
                                                            @endforeach
                                                        @else
                                                            {{ data_get($entry, $key . '.' . $value) }}
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="{{ count($settings4['fields']) }}">
                                                    {{ __('No entries found') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@endsection
