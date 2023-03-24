@props(['userAccount'])
<div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
    <div class="card">
        <div class="card-header">
            <h5>Account Details</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="form-group col-md-12 mt-3">
                        <input type="file" class="" name="profile_image"
                               id="profile_image"
                               value="{{$userAccount->profile->profile_image}}">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" id="profile_image" height="60" width="60"
                             src="{{(!empty($userAccount->profile->profile_image)) ? url
                                                         ('uploads/users/images/profile/'
                            .$userAccount->profile->profile_image) : url('uploads/users/images/default/default-avatar
                            .jpeg')
                            }}" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Username <span class="required">*</span></label>
                        <input required class="form-control" name="username" type="text"  readonly
                               value="{{$userAccount->username}}"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Name <span class="required">*</span></label>
                        <input required class="form-control" name="name" type="text" value="{{$userAccount->name}}" />
                    </div>

                    <div class="form-group col-md-12">
                        <label>Phone Number <span class="required">*</span></label>
                        <input required class="form-control" name="phone_number" type="number"
                               value="{{$userAccount->profile->phone_number}}" />
                    </div>

                    <div class="form-group col-md-12">
                        <label>Email Address <span class="required">*</span></label>
                        <input required class="form-control" name="email" type="email"
                               value="{{$userAccount->email}}" />
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" value="Submit">Save Change</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script
    src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
    integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo="
    crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#headshot').change(function(e){
            const image_reader = new FileReader();
            image_reader.onload = function (e){
                $('#add_headshot').attr('src', e.target.result);
            }
            image_reader.readAsDataURL(e.target.files['0']);
        });
    })
</script>
