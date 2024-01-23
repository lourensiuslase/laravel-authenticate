<style>
    #form-access-control {
        color: black;
    }

    #form-access-control label {
        font-size: 14px;
    }
</style>
<form id="form-access-control">
    <div class="form-row">
        <div class="form-group col-md-12 mb-0">
            <label class="mb-0">Role Name</label>
            <input type="text" readonly
                   class="form-control form-control-sm bg-transparent border-0 pl-0 font-weight-bold" id="role-name"
                   value="{{ $data->role_name }}">
            <input type="hidden" id="id_role" value="{{ $data->id }}" name="id_role">
        </div>
    </div>
    <hr class="my-2">
    <label for="" class="font-weight-bold">Access Control</label>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-data">
            <thead>
            <tr>
                <th>Module</th>
                <th class="w-5p text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $arr_menu = [];
                foreach ($access_menu as $am) {
                    array_push($arr_menu, $am->id_menu);
                }
            @endphp
            @foreach ($main_menu as $mm)
                @if ($mm->main_menu_name !== 'Main')
                    <tr>
                        <td colspan="2" style="background: #001A4E" class="text-white">
                            {{ $mm->main_menu_name }}
                        </td>
                    </tr>
                @endif

                @foreach ($menu as $m)
                    @if ($mm->id == $m->id_main_menu)
                        <tr id="access-data-{{ $m->id }}">
                            <td>{{ $m->menu_name }}</td>
                            <td class="text-center">
                                <div class="custom-control custom-checkbox">
                                    <input @if (in_array($m->id, $arr_menu)) checked @endif type="checkbox"
                                           onchange="selectMenu({{ $m->id }})" class="custom-control-input"
                                           id="customCheck{{ $m->id }}">
                                    <label class="custom-control-label"
                                           for="customCheck{{ $m->id }}"></label>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</form>
