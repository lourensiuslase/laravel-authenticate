<table class="table datatables table-bordered table-hover table-data" id="table-role-access">
    <thead>
    <tr>
        <th class="w-5p">No</th>
        <th>Role Name</th>
        <th class="w-15p">Access Control</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $key => $item)
        <tr>
            <td class="w-5p">{{ $key + 1 }}</td>
            <td>{{ $item->role_name }}</td>
            <td class="w-15p">
                    <span onclick="openModal('role-access','access-control', {{ $item->id }}, '{{ $item->role_name }}')"
                          class="text-primary pointer"><i class="fe fe-settings fe-16 mr-1"></i> Setting</span>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
