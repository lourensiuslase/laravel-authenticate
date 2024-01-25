<table class="table datatables table-bordered table-hover table-data" id="table-user-management">
    <thead>
    <tr>
        <th class="w-5p">No</th>
        <th class="w-15p">Username</th>
        <th>Name</th>
        <th class="w-25p">Email</th>
        <th class="w-15p">Role</th>
        <th class="w-10p">Status</th>
        <th class="w-5p">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $item)
        <tr>
            <td class="w-3p">{{ $key + 1 }}</td>
            <td class="w-15p">{{ $item->username }}</td>
            <td>{{ $item->name }}</td>
            <td class="w-25p">{{ $item->email }}</td>
            <td class="w-15p">{{ $item->role_name }}</td>
            <td class="w-10p">
                @if ($item->is_active == 1)
                    <label for="" class="text-success">Active</label>
                @else
                    <label for="" class="text-danger">Not Active</label>
                @endif
            </td>
            <td class="w-5p">
                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <label class="dropdown-item pointer"
                           onclick="openModal('user-management','detail', {{ $item->id }})"><span
                            class="mr-2 fe fe-eye"></span>View</label>
                    <label class="dropdown-item pointer"
                           onclick="openModal('user-management','edit', {{ $item->id }})"><span
                            class="mr-2 fe fe-edit"></span>Edit</label>
                    <label class="dropdown-item pointer"
                           onclick="manageData('delete',{{ $item->id }}, '{{ $item->username }}')"><span
                            class="mr-2 fe fe-trash"></span>Delete</label>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
