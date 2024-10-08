@extends('layouts.back')

@section('styles')
<style>

</style>
@endsection

@section('content')
<div class="card">
	<div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <h2 class="main-title text-uppercase">{{ $title }}</h2>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                <i class="fas fa-plus"></i> Tambah
            </button>
        </div>
        <div class="dropdown-divider"></div>
        <div class="table-responsive">
            <table class="display table table-striped table-hover" cellspacing="0" width="100%" id="dataTable">
              <thead>
                <tr>
                    <th> Nama </th>
                    <th> Email </th>
                    <th> Role </th>
                    <th width="100px"> Aksi </th>
                </tr>
              </thead>
            </table>
        </div>
	</div>
</div>

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalCreateLongTitle">Tambah</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <form id="formCreate">
			    <div class="modal-body">
                    <?php
                        $wajibIsi = '<span class="text-danger">*</span>';
                    ?>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Nama {!! $wajibIsi !!}</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Contoh: Jhon">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email {!! $wajibIsi !!}</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Contoh: Jhon@gmail.com">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-label">Username {!! $wajibIsi !!}</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Contoh: jhon">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="password" class="form-label">Password {!! $wajibIsi !!}</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirm Password {!! $wajibIsi !!}</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Masukkan Confirm Password">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="role" class="form-label">Role {!! $wajibIsi !!}</label>
                                <select class="form-control" name="role" aria-label="" style="width: 100%;">
                                    <option selected disabled>Pilih Role</option>
                                    <option value="admin">Admin</option>
                                  </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdateTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalUpdateLongTitle">Update</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <form id="formUpdate">
			    <div class="modal-body">
                    <?php
                        $wajibIsi = '<span class="text-danger">*</span>';
                    ?>
                     <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Nama {!! $wajibIsi !!}</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Contoh: Jhon">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email {!! $wajibIsi !!}</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Contoh: Jhon@gmail.com">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-label">Username {!! $wajibIsi !!}</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Contoh: jhon">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="password" class="form-label">Password (diisi jika ingin mengganti)</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirm Password (diisi jika ingin mengganti)</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Masukkan Confirm Password">
                                <span class="invalid-feedback"></span>
                            </div>
                            <div class="form-group">
                                <label for="role" class="form-label">Role {!! $wajibIsi !!}</label>
                                <select class="form-control" name="role" aria-label="" style="width: 100%;">
                                    <option selected disabled>Pilih Role</option>
                                    <option value="admin">Admin</option>
                                  </select>
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>

@endsection

@section('scripts')
    <script>
         $(document).ready(function() {

            const $modalCreate = $('#modalCreate');
            const $modalUpdate = $('#modalUpdate');
            const $formCreate = $('#formCreate');
            const $formUpdate = $('#formUpdate');
            const $formCreateSubmitBtn = $formCreate.find(`[type="submit"]`).ladda();
            const $formUpdateSubmitBtn = $formUpdate.find(`[type="submit"]`).ladda();

            $modalCreate.on('shown.bs.modal', function() {
                $modalCreate.find(`[name="name"]`).focus();
                $modalCreate.find(`[name="role"]`).select2({
                    dropdownParent: $modalCreate,
                    placeholder: 'Pilih Role',
                });
            })

            $modalUpdate.on('shown.bs.modal', function() {
                $modalUpdate.find(`[name="name"]`).focus();
                $modalUpdate.find(`[name="role"]`).select2({
                    dropdownParent: $modalUpdate,
                    placeholder: 'Pilih Role',
                });
            })


            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: "{{ route('admin.user') }}"
                },
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all",
                }],
                columns: [{
                        data: "name",
                        name: "name",
                    },
                    {
                        data: "email",
                        name: "email",
                    },
                    {
                        data: "role",
                        name: "role",
                    },
                    {
                        data: "action",
                        name: "action",
                        orderable: false,
                        searchable: false,
                    },
                ],
                drawCallback: settings => {
                    renderedEvent();
                }


            })
            const reloadDT = () => {
                $('#dataTable').DataTable().ajax.reload();
            }

            const renderedEvent = () => {
                $.each($('.delete'), (i, deleteBtn) => {
                        $(deleteBtn).off('click')
                        $(deleteBtn).on('click', function() {
                            let {
                                deleteMessage,
                                deleteHref
                            } = $(this).data();
                            notificationSwal(function() {
                                ajaxSetup()
                                        $.ajax({
                                            url: deleteHref,
                                            method: 'delete',
                                            dataType: 'json'
                                        })
                                        .done(response => {
                                            let {
                                                message,
                                                type,
                                                icon,
                                                title
                                            } = response
                                            notify(title, message, type, icon);
                                            reloadDT();
                                        })
                                        .fail(error => {
                                            ajaxErrorHandling(error);
                                        })
                            })
                        })
                    })

                    $.each($('.edit'), (i, editBtn) => {
                        $(editBtn).off('click')
                        $(editBtn).on('click', function() {
                            let {
                                editHref,
                                getHref
                            } = $(this).data();
                            $.get({
                                    url: getHref,
                                    dataType: 'json'
                                })
                                .done(response => {
                                    let {
                                        user
                                    } = response;
                                    clearInvalid();
                                    $modalUpdate.modal('show')
                                    $formUpdate.attr('action', editHref)
                                    $formUpdate.find(`[name="name"]`).val(user.name);
                                    $formUpdate.find(`[name="username"]`).val(user.username);
                                    $formUpdate.find(`[name="email"]`).val(user.email);
                                    $formUpdate.find(`[name="role"]`).val(user.role);

                                    formSubmit(
                                        $modalUpdate,
                                        $formUpdate,
                                        $formUpdateSubmitBtn,
                                        editHref,
                                        'put'
                                    );
                                })
                                .fail(error => {
                                    ajaxErrorHandling(error, $modalUpdate);
                                })
                            })
                    })

            }

            const clearFormCreate = () => {
                $formCreate[0].reset();
            }

            const formSubmit = ($modal, $form, $submit, $href, $method, $addedAction = null) => {
                    $form.off('submit')
                    $form.on('submit', function(e) {
                        e.preventDefault();
                        clearInvalid();

                        let formData = $(this).serialize();
                        $submit.ladda('start');

                        ajaxSetup();
                        $.ajax({
                            url: $href,
                            method: $method,
                            data: formData,
                            dataType: 'json',
                        }).done(response => {
                            let {
                                message,
                                type,
                                icon,
                                title
                            } = response;
                            notify(title, message, type, icon);
                            reloadDT();
                            clearFormCreate();
                            $submit.ladda('stop');
                            $modal.modal('hide');

                            if(addedAction) {
                                addedAction();
                            }
                        }).fail(error => {
                            $submit.ladda('stop');
                            ajaxErrorHandling(error, $modal);
                        })
                    })
                }

                formSubmit(
                    $modalCreate,
                    $formCreate,
                    $formCreateSubmitBtn,
                    `{{ route('admin.user.store') }}`,
                    'post',
                    () => {
                        clearFormCreate()
                    }
                )
        })
    </script>
@endsection
