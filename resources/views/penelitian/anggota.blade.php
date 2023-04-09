@extends('template.templadeDash')
@section('content')
<div class="content">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <button type="button" id="tambah">Submit form</button>

                <table id="anggota" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                        </tr>
                    </thead>

                    <tbody id="tabel_kota">
                        <tr>
                            <td>Garrett ds</td>
                            <td><input type="text" id="row-2-age" name="row-2-age" value="63"></td>
                            <td><input type="text" id="row-2-position" name="row-2-position" value="Accountant"></td>
                            <td><select size="1" id="row-2-office" name="row-2-office">
                                    <option value="Edinburgh">
                                        Edinburgh
                                    </option>
                                    <option value="London">
                                        London
                                    </option>
                                    <option value="New York">
                                        New York
                                    </option>
                                    <option value="San Francisco">
                                        San Francisco
                                    </option>
                                    <option value="Tokyo" selected="selected">
                                        Tokyo
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td><input type="text" id="row-2-age" name="row-2-age" value="dsd"></td>
                            <td><input type="text" id="row-2-position" name="row-2-position" value="Accountant"></td>
                            <td><select size="1" id="row-2-office" name="row-2-office">
                                    <option value="Edinburgh">
                                        Edinburgh
                                    </option>
                                    <option value="London">
                                        London
                                    </option>
                                    <option value="New York">
                                        New York
                                    </option>
                                    <option value="San Francisco">
                                        San Francisco
                                    </option>
                                    <option value="Tokyo" selected="selected">
                                        Tokyo
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td><input type="text" id="row-2-age" name="row-2-age" value="63"></td>
                            <td><input type="text" id="row-2-position" name="row-2-position" value="Accountant"></td>
                            <td><select size="1" id="row-2-office" name="row-2-office">
                                    <option value="Edinburgh">
                                        Edinburgh
                                    </option>
                                    <option value="London">
                                        London
                                    </option>
                                    <option value="New York">
                                        New York
                                    </option>
                                    <option value="San Francisco">
                                        San Francisco
                                    </option>
                                    <option value="Tokyo" selected="selected">
                                        Tokyo
                                    </option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var table = $('#anggota').DataTable({
        columnDefs: [{
            orderable: false
            , targets: [1, 2, 3]
        , }, ]
    , });

    $('button').click(function() {
        var data = table.$('input, select').serialize();
        console.log(data.substr(0, 120));
        alert(+'...');
        return false;
    });

</script>
@endsection
