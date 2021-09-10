@extends('layout.app')

@section('content')


<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="text-center card">
                <div class="card-header">
                    <h6>Laravel file upload</h6>
                </div>
                <div class="card-body">
                    <input id="myfileId" type="file" class="form-control">
                    <button onclick="onUpload()" id="uploadBtnId" class="mt-3 btn btn-block btn-primary">Upload</button>
                    <h2 id="uploadPercentId"></h2>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        function onUpload(){         

            let myFile = document.getElementById('myfileId').files[0];
            let fileName = myFile.name;
            //let fileName = myFile.size;
            let fileextension = fileName.split('.').pop();

            let filedata = new FormData();
            filedata.append('filekey', myFile);

            let config = {
                headers: {'content-type': 'multipart/form-data'},
                    onUploadProgress: function(progressEvent){
                        var percentComplite = Math.round((progressEvent.loaded*100)/progressEvent.total);
                        let uploadMb = (progressEvent.loaded)/(1028*1028);
                        let totalMb = (progressEvent.total)/(1028*1028);
                        let DueMb = totalMb-uploadMb;
                        $('#uploadPercentId').html("Uploaded :"+uploadMb.toFixed(2)+" Due :"+DueMb.toFixed(2)+" Total :"+totalMb.toFixed(2));
                        // $('#uploadPercentId').html(percentComplite+"%");
                    }
            }

            let url = '/fileUpaxios';

            axios.post(url, filedata, config)
            .then(function(response){
                if(response.status==200){
                    $('#uploadPercentId').html("Upload Success");
                    setTimeout(() => {
                        $('#uploadPercentId').html(" ");  
                    }, 2000);
                }else{
                    $('#uploadPercentId').html("Upload Success");
                    setTimeout(() => {
                        $('#uploadPercentId').html(" ");  
                    }, 2000); 
                }
                
            }).catch(function(error){
                $('#uploadPercentId').html("Upload Success");
                    setTimeout(() => {
                        $('#uploadPercentId').html(" ");  
                    }, 2000);
            })
        }
        

    </script>


@endsection