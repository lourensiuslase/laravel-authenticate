<div class="modal fade text-left" id="modal-role" tabindex="-1" role="dialog" aria-labelledby="modal-title"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Form Peran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fe fe-x"></i>
                </button>
            </div>
            <form action="javascript:void(0)" id="form-role" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Kode Peran: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Silahkan masukan kode Peran" id="role_code"
                                       name="role_code" class="form-control" readonly value="">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <label>Level Peran: </label>
                            <div class="form-group">
                                <select name="role_level" id="role_level" class="form-control">
                                    <option value="">--Silahkan pilih Level--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label>Nama Peran: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Silahkan masukan nama Peran" id="role_name" name="role_name"
                               class="form-control">
                    </div>
                    <label>Uraian Peran: </label>
                    <div class="form-group">
                        <textarea type="text" rows="4" placeholder="Silahkan masukan uraian Peran" id="role_description"
                                  name="role_description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-role" class="btn btn-success text-white mr-1"
                            onclick="manageData('save')"><i class="fe fe-check fe-16"></i> Submit</button>
                    <button type="submit" id="edit-role" class="btn btn-warning text-white mr-1"
                            onclick="manageData('update')"><i class="fe fe-edit fe-16"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
