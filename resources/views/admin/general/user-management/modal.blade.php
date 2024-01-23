<div class="modal fade text-left" id="modal-user-management" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fe fe-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-user-management" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Username: </label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm bg-transparent" id="username"
                               name="username">
                    </div>
                    <label>Email: </label>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-sm bg-transparent" id="email"
                               name="email">
                    </div>
                    <label>Name: </label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm bg-transparent" id="name"
                               name="name">
                    </div>
                    <label>Phone: </label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm bg-transparent" id="phone"
                               name="phone">
                    </div>
                    <label>Role: </label>
                    <div class="form-group">
                        <select name="id_role" id="id_role" class="form-control form-control-sm bg-transparent">
                            <option value="">--Choose Role--</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Status User : </label>
                    <div class="form-group">
                        <select name="is_active" id="is_active" class="form-control px-0">
                            <option value="" disabled>--Pilih User Tersedia--</option>
                            <option value="1">Active</option>
                            <option value="0">Non Active</option>
                        </select>
                    </div>
                    <hr class="mb-2">
                    <div class="row" id="password-field">
                        <div class="col-md-12">
                            <button class="btn btn-sm btn-primary" type="button" onclick="generatePassword()">Generate
                                Password</button>
                            <div class="input-group imput-group-sm mt-2">
                                <input type="text" id="password" name="password"
                                       class="form-control form-control-sm" placeholder="Click Generate Password">
                                <div class="input-group-append pointer" onclick="copyPassword()">
                                    <span class="input-group-text"><i class="fe fe-copy"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-user-management" class="btn btn-sm btn-success text-white mr-1"
                            onclick="manageData('save')"><i class="fe fe-check fe-16"></i> Submit</button>
                    <button type="submit" id="edit-user-management" class="btn btn-sm btn-warning text-white mr-1"
                            onclick="manageData('update')"><i class="fe fe-edit fe-16"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade text-left" id="modal-detail-user-management" tabindex="-1" role="dialog"
     aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fe fe-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id" name="id" value="">
                <label>Username: </label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm bg-transparent" readonly
                           id="detail-username">
                </div>
                <label>Email: </label>
                <div class="form-group">
                    <input type="email" class="form-control form-control-sm bg-transparent" readonly
                           id="detail-email">
                </div>
                <label>Name: </label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm bg-transparent" readonly
                           id="detail-name">
                </div>
                <label>Phone: </label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm bg-transparent" readonly
                           id="detail-phone">
                </div>
                <label>Role: </label>
                <div class="form-group">
                    <select name="id_role" disabled id="detail-id_role"
                            class="form-control form-control-sm bg-transparent">
                        <option value="">--Choose Role--</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                        @endforeach
                    </select>
                </div>
                <label>Status User : </label>
                <div class="form-group">
                    <select name="detail-is_active" disabled id="detail-is_active"
                            class="form-control form-control-sm bg-transparent">
                        <option value="" disabled>--Pilih User Tersedia--</option>
                        <option value="1">Active</option>
                        <option value="0">Non Active</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
