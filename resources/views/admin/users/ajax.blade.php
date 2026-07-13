{{-- Add Button And Search Fields --}}
<div class="add-search">
    <div class="rows">
        <div class="c-3">
            <button class="open-modal" data-modal-id="addModal" id="add"><i class="fa-solid fa-plus"></i> Add {{ $name }} </button>
        </div>
        <div class="c-6">

        </div>
        <div class="c-3" style="padding: 0;">
            <input type="text" id="globalSearch" placeholder="Search..." />
        </div>
    </div>
</div>

{{-- Datatable Part --}}
<div class="load-data">
    <table class="data-table" id="data-table">
        <caption>{{ $name }} Details</caption>
        <thead></thead>
        <tbody></tbody>
        <tfoot></tfoot>
    </table>

    <div id="paginate"></div>
</div>


@include('admin.users.add')

@include('admin.users.edit')

@include('admin.delete')


<!-- ajax part start from here -->
<script src="{{ asset('js/ajax/admin/users.js') }}"></script>