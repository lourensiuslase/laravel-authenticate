@if (count($roles) > 0)
    @php
        $no = 1;
    @endphp
    @foreach ($roles as $data)
        <tr id="row-role-{{ $data->id }}">
            <td>{{ $no }}</td>
            <td>{{ $data->role_code }}</td>
            <td>{{ $data->role_name }}</td>
            <td>{{ $data->role_description }}</td>
            <td>{{ $data->role_level }}</td>
            <td>
                <button type="button" onclick="openModal('role','edit', {{ $data->id }})"
                        class="btn mx-1 btn-sm btn-outline-warning"><span class="fe fe-edit"></span></button>
                <button type="button" onclick="manageData('delete', {{ $data->id }})"
                        class="btn mx-1 btn-sm btn-outline-danger"><span class="fe fe-trash-2"></span></button>
            </td>
        </tr>
        @php
            $no++;
        @endphp
    @endforeach
@else
    <tr>
        <td colspan="6" class="text-center">
            Tidak Terdapat Data Peran
        </td>
    </tr>
@endif
