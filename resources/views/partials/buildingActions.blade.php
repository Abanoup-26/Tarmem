@can($viewGate)
    <a class="btn btn-xs btn-primary" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
        {{ trans('global.view') }}
    </a>
@endcan
<a class="btn btn-xs btn-danger" href="{{ route('admin.' . $crudRoutePart . '.visits', $row->id) }}">
    تحديد الزائرين
</a>
