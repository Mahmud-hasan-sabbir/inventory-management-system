<x-app-layout>
    <div class="row mt-5">
        <div class="col-8" style="margin: auto">
            <div class="card">
                <div class="card-header" style="background-color: rgb(102, 106, 124)">
                    <h6 class="card-title text-white">Products Import</h6>
                    <a href="{{route('product.excel')}}" class="btn btn-sm btn-primary mr-1">
                        <i class="fa fa-download"></i><span class="btn-icon-add"></span>Download Excel File
                    </a>


                </div>
                <div class="card-body">
                    <form class="form-valide" action="{{ route('product_import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body py-2 px-4">
                            <div class="row mt-2">
                                 {{-- <label class="col-md-5 col-form-label">Upload Excel File : </label> --}}
                                 <label class="col-md-5 col-form-label"><h6>Upload Excel File :</h6> </label>
                                <div class="col-md-7">
                                     <input type="file" required  name="import_file" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="height:50px">
                            <button type="submit" class="btn btn-sm btn-primary">Upload File</button>
                        </div>
                    </form>
                    <div class="mt-3">
                        <strong class="text-danger">Please download the Xlsx file and clear it | now you write your all products by listing and import It again | thank you</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>








