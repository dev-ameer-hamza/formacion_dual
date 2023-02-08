@extends('layouts.app')

@section("content")

    <h2 class="mb-4">@lang("common.misSeguimientos")</h2>
    <div class="card-body">
        {!! $dataTable->table() !!}
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    {!! $dataTable->scripts() !!}
    {{--<script src="{{ asset('js/common/delete.js') }}"></script>--}}
@endpush