@extends('layout.app')

@section('content')


<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header">
                    <h6>Laravel file upload</h6>
                </div>
                <div class="card-body">
                    <input id="myfileId" type="file" class="form-control">
                    <button onclick="onUpload()" id="uploadBtnId" class="btn btn-block mt-3 btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        function onUpload(){
                let loading = "<div class='spinner-border ml-auto d-flex align-items-center' role='status' ></div>";
            $('#uploadBtnId').html(loading);           

            let myFile = document.getElementById('myfileId').files[0];
            let fileName = myFile.name;
            //let fileName = myFile.size;
            let fileextension = fileName.split('.').pop();

            let filedata = new FormData();
            filedata.append('filekey', myFile);

            let config = {headers: {'content-type': 'multipart/form-data'}}
            let url = '/fileUp';

            axios.post(url, filedata, config)
            .then(function(response){
                if(response.status==200){
                    $('#uploadBtnId').html('Upload Success!');
                    setTimeout(function(){
                        $('#uploadBtnId').html('uploded');
                    }, 5000);    
                }else{
                    $('#uploadBtnId').html('Upload failed!');
                }
            }).catch(function(error){
                $('#uploadBtnId').html('Upload failed!');
            })
        }
        

    </script>

@endsection