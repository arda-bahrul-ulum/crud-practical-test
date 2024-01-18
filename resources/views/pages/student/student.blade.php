@extends('layouts.main')

@section('title')
<h2 class="h4 mb-4 text-gray-800">Student Data</h2>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-header">
                Student Data List
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" class="class btn btn-primary mb-4" id="tambahStudent"><i class="fas fa-fw fa-plus"></i> Add</a>
                <table class="table table-hover" id="tableStudent">
                    <thead>
                      <tr>
                        <th scope="col" width="10">No.</th>
                        <th scope="col" width="70">Action</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Mobile Phone</th>
                        <th scope="col">Address</th>
                      </tr>
                    </thead>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal-content')
  <!-- Modal -->
  <div class="modal fade" id="modalStudent" tabindex="-1" aria-labelledby="modalHeading" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalHeading"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3 my-2">
            <form id="formStudent">
                {{ csrf_field() }}
                <input type="hidden" name="id_student" id="id_student">
                <div class="form-row">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Ex: Halland">
                </div>
                <div class="form-row mt-3">
                    <label for="date_of_birth">Date Of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
                </div>
                <div class="form-row mt-3">
                    <label for="gender">Gender</label>
                    <select class="custom-select" name="gender" id="gender">
                        <option value="" selected>- Choose -</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-row mt-3">
                    <label for="mobile_phone">Mobile Phone</label>
                    <input type="text" class="form-control" name="mobile_phone" id="mobile_phone" placeholder="Ex: Halland">
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" style="min-height: 100px" rows="5" type="text" class="form-control"></textarea>
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <button type="button" class="btn btn-secondary mx-1" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btnSimpan"><i class="fas fa-fw fa-check"></i> Simpan</button>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>
@endsection

@push('js')
    <script>
        var routeIndex = '<?php echo route('student.index') ?>';
        var routeSimpan = '<?php echo route('student.store') ?>';
    </script>

    <script src="{{ asset('js/student.js') }}"></script>
@endpush
