<div class="modal fade text-left" id="modal-profile" tabindex="-1" profile="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" profile="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fe fe-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-profile" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <label>Username: </label>
                    <div class="form-group">
                        <input type="text" id="username" name="username"
                               class="form-control form-control-sm bg-transparent">
                    </div>
                    <label>Email: </label>
                    <div class="form-group">
                        <input type="text" id="email" name="email"
                               class="form-control form-control-sm bg-transparent">
                    </div>
                    <label>Role: </label>
                    <div class="form-group">
                        <input type="hidden" id="id_role" name="id_role">
                        <select type="text" id="id_role" disabled
                                class="form-control form-control-sm bg-transparent" onChange="changeRole()">
                            <option value="">Select Role</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-profile" class="btn btn-sm btn-success text-white mr-1"
                            onclick="manageData('save')"><i class="fe fe-check fe-16"></i> Submit
                    </button>
                    <button type="submit" id="edit-profile" class="btn btn-sm btn-warning text-white mr-1"
                            onclick="manageData('update')"><i class="fe fe-edit fe-16"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
