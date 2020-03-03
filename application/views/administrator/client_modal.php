<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih jemaat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="clientModalSearchInput" placeholder="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" id="clientModalSearchBtn" type="button">Search</button>
                    </div>
                </div>
                <table id="clientModalTable" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Paket</th>
                            <th>Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>User ID</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Paket</th>
                            <th>Pekerjaan</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$('#clientModal').on('shown.bs.modal', function (e) {
    getData()
})
$('#clientModalSearchBtn').click(function(){
    var sData = $('#clientModalSearchInput').val()
    
    if(sData.length > 0){
        getData(sData)
    }
})
function getData(search = null){
    var params = '';
    if(search){
        params = '?name='+search
    }
    $.ajax(`<?php echo site_url();?>administrator/client/get_data${params}`)
    .then(function(data){      
        rePopulateTable(data)
    })
}

function rePopulateTable(data){
    $('#clientModalTable').find('tbody').empty()
    for (const item of data) {
        $('#clientModalTable').find('tbody').append(buildRow(item))
    }
}
function buildRow(item){
    var row = $('<tr/>',{
        css:{
            'cursor':'pointer'
        }
    })
    row.append(buildCol(item.user_id,'user_id'))
    row.append(buildCol(item.nama,'nama'))
    row.append(buildCol(item.nik,'nik'))
    row.append(buildCol(item.alamat,'alamat'))
    row.append(buildCol(item.paket,'paket'))
    row.append(buildCol(item.pekerjaan,'pekerjaan'))
    row.click(function(){
        $('input[data-modal=clientModal]').val(item.user_id)
        $('#clientModal').modal('hide')
    })
    return row;
}

function buildCol(data,key){
    return col = $('<td/>',{text:data,attr:{'data-col':key}});
}

</script>