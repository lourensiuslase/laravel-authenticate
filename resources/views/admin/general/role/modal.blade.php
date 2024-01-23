<div class="modal fade text-left" id="modal-role-access" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fe fe-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-role-access" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Role Name: </label>
                    <div class="form-group">
                        <input type="text" id="role_name" name="role_name"
                               class="form-control form-control-sm bg-transparent">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-role-access" class="btn btn-sm btn-success text-white mr-1"
                            onclick="manageData('save')"><i class="fe fe-check fe-16"></i> Submit</button>
                    <button type="submit" id="edit-role-access" class="btn btn-sm btn-warning text-white mr-1"
                            onclick="manageData('update')"><i class="fe fe-edit fe-16"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="modal-detail-role-access" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fe fe-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <label>Role Name: </label>
                <div class="form-group">
                    <input type="text" id="detail-role-access_name" readonly
                           class="form-control form-control-sm bg-transparent">
                </div>
            </div>
        </div>
    </div>
</div>
