@can($viewGate)
    <a class="btn btn-xs btn-primary" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
        {{ trans('global.view') }}
    </a>
@endcan
<a class="btn btn-xs btn-danger" href="{{ route('admin.' . $crudRoutePart . '.visits', $row->id) }}">
    {{ trans('global.identifying visitors') }}
</a>
<a class="btn btn-xs btn-info" href="{{ route('admin.' . $crudRoutePart . '.showPriceForm', $row->id) }}">
    {{ trans('global.identifying prices') }}
</a>
