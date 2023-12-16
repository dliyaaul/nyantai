@extends('layouts.master')

@push('css')
<link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="main-content">
    <div class="title">
        Konfigurasi
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Roles</h4>
                    </div>
                    <div class="card-body">
                        @if(request()->user()->can('create konfigurasi/roles'))
                        <button type="button" class="btn btn-success mb-3 btn-add">Create <i class="ti-plus"></i></button>
                        @endif
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAction" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('') }}vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('') }}vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('') }}vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('') }}vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('') }}assets/js/pages/datatables.min.js"></script>
<script src="{{ asset('') }}vendor/sweetalert2/sweetalert2.all.min.js"></script>
{{ $dataTable->scripts() }}

<script>
    const modal = new bootstrap.Modal($('#modalAction'))

    $('.btn-add').on('click', function() {
        $.ajax({
            method: 'get',
            url: `{{ url('konfigurasi/roles/create') }}`,
            success: function(res) {
                $('#modalAction').find('.modal-dialog').html(res)
                modal.show()
                store()
            }
        })
    })

    function store() {
        $('#formAction').on('submit', function(e) {
            e.preventDefault()
            const _form = this
            const formData = new FormData(_form)

            const url = this.getAttribute('action')

            $.ajax({
                method: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    window.LaravelDataTables["role-table"].ajax.reload()
                    modal.hide()
                },
                error: function(res) {
                    let errors = res.responseJSON?.errors
                    $(_form).find('.text-danger.text-small').remove()
                    if (errors) {
                        for (const [key, value] of Object.entries(errors)) {
                            $(`[name='${key}']`).parent().append(`<span class="text-danger text-small">${value}</span>`)
                        }
                    }
                    console.log(errors);
                }
            })
        })
    }

    $('#role-table').on('click', '.action', function() {
        let data = $(this).data()
        let id = data.id
        let jenis = data.jenis

        if (jenis == 'delete') {
            Swal.fire({
                title: "Are you sure?",
                text: "you will delete this data!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: `{{ url('konfigurasi/roles/') }}/${id}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            window.LaravelDataTables["role-table"].ajax.reload()
                            Swal.fire(
                                "Deleted!",
                                res.message,
                                res.status
                            )
                        }
                    })
                }
            })
            return;
        }

        $.ajax({
            method: 'get',
            url: `{{ url('konfigurasi/roles/') }}/${id}/edit`,
            success: function(res) {
                $('#modalAction').find('.modal-dialog').html(res)
                modal.show()
                store()
            }
        })
    })
</script>
@endpush