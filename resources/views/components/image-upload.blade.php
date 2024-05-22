<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    <!-- Modal -->
    <div class="modal fade" id="user_profile_image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Your Photo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="
                    @role('Admin')
                        {{route('admin.profile.update',[$slot,'form'=>'imageUpload'])}}
                    @endrole
                    @role('Doctor')
                        {{route('doctor.profile.update',[$slot,'form'=>'imageUpload'])}}
                    @endrole
                    @role('Counselor')
                        {{route('counselor.profile.update',[$slot,'form'=>'imageUpload'])}}
                    @endrole
                    @role('Patient')
                        {{route('patient.profile.update',[$slot,'form'=>'imageUpload'])}}
                    @endrole
                    "  id="frm_profile_picture" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="formFile" class="form-label">choose photo</label>
                            <input class="form-control" name="profile_picture" type="file" accept=".gif,.jpg,.jpeg,.png" id="formFile">
                        </div>
                        <div class="mb-3">

                            <input class="btn btn-primary" value="Upload" name="btn_profile_picture" type="submit">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


</div>


